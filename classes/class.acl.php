<?
	
	class ACL {
		var $perms = array();		//Array : Stores the permissions for the user
		var $userID = 0;			//Integer : Stores the ID of the current user
		var $userRoles = array();	//Array : Stores the roles of the current user
		
		public $con = "";
		//$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs");
		
		function __constructor($userID = '') {
			if ($userID != '')
			{
				$this->userID = floatval($userID);
			} else {
				$this->userID = floatval($_SESSION['userID']);
			}
			$this->userRoles = $this->getUserRoles('ids');
			$this->buildACL();
		}
		
		function ACL($userID = '') {
			$this->__constructor($userID);
			//crutch for PHP4 setups
		}
		
		function buildACL() {
			//first, get the rules for the user's role
			if (count($this->userRoles) > 0)
			{
				$this->perms = array_merge($this->perms,$this->getRolePerms($this->userRoles));
			}
			//then, get the individual user permissions
			$this->perms = array_merge($this->perms,$this->getUserPerms($this->userID));
		}
		
		function getPermKeyFromID($permID) {
			$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs"); 
			$strSQL = "SELECT `permission_key` FROM `permissions` WHERE `permission_id` = " . floatval($permID) . " LIMIT 1";
			$data = mysqli_query($con,$strSQL);
			$row = mysqli_fetch_array($data);
			return $row[0];
		}
		
		function getPermNameFromID($permID) {
			$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs"); 
			$strSQL = "SELECT `permission_name` FROM `permissions` WHERE `permission_id` = " . floatval($permID) . " LIMIT 1";
			$data = mysqli_query($con,$strSQL);
			$row = mysqli_fetch_array($data);
			return $row[0];
		}
		
		function getRoleNameFromID($roleID) {
			$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs"); 
			$strSQL = "SELECT `role_name` FROM `roles` WHERE `role_id` = " . floatval($roleID) . " LIMIT 1";
			$data = mysqli_query($con,$strSQL);
			$row = mysqli_fetch_array($data);
			return $row[0];
		}
		
		function getUserRoles() {
			$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs"); 
			$strSQL = "SELECT * FROM `user_roles` WHERE `user_id` = " . floatval($this->userID) . " ORDER BY `addDate` ASC";
			$data = mysqli_query($con, $strSQL);
			$resp = array();
			while($row = mysqli_fetch_array($data))
			{
				$resp[] = $row['role_id'];
			}
			return $resp;
		}
		
		function getAllRoles($format='ids') {
			$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs"); 
			$format = strtolower($format);
			$strSQL = "SELECT * FROM `roles` ORDER BY `role_name` ASC";
			$data = mysqli_query($con,$strSQL);
			$resp = array();
			while($row = mysqli_fetch_array($data))
			{
				if ($format == 'full')
				{
					$resp[] = array("ID" => $row['role_id'],"Name" => $row['role_name']);
				} else {
					$resp[] = $row['role_id'];
				}
			}
			return $resp;
		}
		
		function getAllPerms($format='ids') {
			$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs"); 
			$format = strtolower($format);
			$strSQL = "SELECT * FROM `permissions` ORDER BY `permission_name` ASC";
			$data = mysqli_query($con,$strSQL);
			$resp = array();
			while($row = mysqli_fetch_assoc($data))
			{
				if ($format == 'full')
				{
					$resp[$row['permission_key']] = array('ID' => $row['permission_id'], 'Name' => $row['permission_name'], 'Key' => $row['permission_key']);
				} else {
					$resp[] = $row['permission_id'];
				}
			}
			return $resp;
		}

		function getRolePerms($role) {
			$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs"); 
			if (is_array($role))
			{
				$roleSQL = "SELECT * FROM `role_perms` WHERE `role_id` IN (" . implode(",",$role) . ") ORDER BY `role_perm_id` ASC";
			} else {
				$roleSQL = "SELECT * FROM `role_perms` WHERE `role_id` = " . floatval($role) . " ORDER BY `role_perm_id` ASC";
			}
			$data = mysqli_query($con,$roleSQL);
			$perms = array();
			while($row = mysqli_fetch_assoc($data))
			{
				$pK = strtolower($this->getPermKeyFromID($row['permission_id']));
				if ($pK == '') { continue; }
				if ($row['role_perm_value'] === '1') {
					$hP = true;
				} else {
					$hP = false;
				}
				$perms[$pK] = array('perm' => $pK,'inheritted' => true,'value' => $hP,'Name' => $this->getPermNameFromID($row['permission_id']),'ID' => $row['permission_id']);
			}
			return $perms;
		}
		
		function getUserPerms($userID) {
			$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs"); 
			$strSQL = "SELECT * FROM `user_perms` WHERE `user_id` = " . floatval($userID) . " ORDER BY `addDate` ASC";
			$data = mysqli_query($con,$strSQL);
			$perms = array();
			while($row = mysqli_fetch_assoc($data))
			{
				$pK = strtolower($this->getPermKeyFromID($row['permission_id']));
				if ($pK == '') { continue; }
				if ($row['value'] == '1') {
					$hP = true;
				} else {
					$hP = false;
				}
				$perms[$pK] = array('perm' => $pK,'inheritted' => false,'value' => $hP,'Name' => $this->getPermNameFromID($row['permission_id']),'ID' => $row['permission_id']);
			}
			return $perms;
		}
		
		function userHasRole($roleID) {
			$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs"); 
			foreach($this->userRoles as $k => $v)
			{
				if (floatval($v) === floatval($roleID))
				{
					return true;
				}
			}
			return false;
		}
		
		function hasPermission($permKey) {
			$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs"); 
			$permKey = strtolower($permKey);
			if (array_key_exists($permKey,$this->perms))
			{
				if ($this->perms[$permKey]['value'] === '1' || $this->perms[$permKey]['value'] === true)
				{
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
		
		function getUsername($userID) {
			$con=mysqli_connect("localhost","root","","mikesoer_ceylonianjobs"); 
			$strSQL = "SELECT `user_username` FROM `users` WHERE `user_id` = " . floatval($userID) . " LIMIT 1";
			$data = mysqli_query($con,$strSQL);
			$row = mysqli_fetch_array($data);
			return $row[0];
		}
	}

?>