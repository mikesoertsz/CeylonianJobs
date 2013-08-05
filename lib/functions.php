<?php
global $con;
$con = mysqli_connect("localhost","root","","mikesoer_ceylonianjobs");

function headerTop($case){ ?>
	<div id="header">
		<a href="index.php" id="main_logo"></a>
		<div id="loader"></div>
		<div id="user_login_holder">
			<div id="user_profilepic"><img src="img/img_profilepic.png" alt="img_profilepic" width="34"/></div>
			<div id="user_profilename">
				<h4 style="margin:15px 0 0 0px;">Mike Soertsz</h4>
				<h5>Entrepreneur</h5>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<ul id="top_nav">
			<li><a href="" class="search"><span class="icontop search"></span>Search</a></li>
			<li><a href=""><span class="icontop messages"></span>Messages</a></li>
		</ul>
		<div class="clear"></div>
	</div>
	<?php
	
	switch ($case){
		case "candidate":
			?>
			<div id="header_sub">
				<ul id="subnav">
					<li><a href="" class=""><span class="iconsub home"></span>Home</a></li>
					<li><a href="" class=""><span class="iconsub resume"></span>My Resumes</a></li>
					<li><a href="" class=""><span class="iconsub favs"></span>My Saved Jobs</a></li>
					<li style="float:right;"><a href="1_about.php" class=""><span class="iconsub about"></span>About Us</a></li>
					<div class="clear"></div>
				</ul>
				<div class="clear"></div>
			</div>
			<?php
			break;
		case "employer":
			?>
			<div id="header_sub">
				<ul id="subnav">
					<li><a href="" class=""><span class="iconsub home"></span>Home</a></li>
					<li><a href="" class=""><span class="iconsub jobs"></span>My Jobs</a></li>
					<li><a href="" class=""><span class="iconsub candidates"></span>Shortlisted Candidates</a></li>
					<li style="float:right;"><a href="1_about.php" class=""><span class="iconsub about"></span>About Us</a></li>
					<div class="clear"></div>
				</ul>
				<div class="clear"></div>
			</div>
			<?php
			break;
		case "basic":
			?>
			<div id="header_sub">
				<ul id="subnav">
					<li><a href="" class=""><span class="iconsub home"></span>Home</a></li>
					<li style="float:right;"><a href="1_about.php" class=""><span class="iconsub about"></span>About Us</a></li>
					<div class="clear"></div>
				</ul>
				<div class="clear"></div>
			</div>
			<?php
			break;
		default:
			break;
	}
	
	?>
	
<?php
 //wtf
}


function mainNav(){
	echo "<a href='1_employer.php' id='left_nav'>For Employers</a>"; 
	$q = "SELECT job_category_id, job_category_name FROM job_categories ORDER BY job_category_name ASC";
	$con = mysqli_connect("localhost","root","","mikesoer_ceylonianjobs");
	$query = mysqli_query($con, $q);
	echo '<ul id="main_nav">';
	echo '<li><a href="index.php" id="job_category_alljobs">All Jobs</a></li>';
	while ($row = mysqli_fetch_array($query)){
		echo "<li><a href='' class='cat_".$row['job_category_id']."'>".$row['job_category_name']."</a><div class='mainnav_expanded cat_".$row['job_category_id']."'>hello<br>hello<br>hello<br>hello<br></div></li>";
	}
	echo "</ul>";
}

function jobList($count){
	for ($i=0; $i<$count; $i++){ ?>
		<ul id="joblist">
			<a href="1_jobFull.php"><li>
				<div class="joblist_name"><h3>Job Title</h3>One-line description</div>
				<div class="joblist_location"><h3>District</h3>City</div>
				<div class="joblist_companyname"><h3>Company Name</h3>1-10 Employees</div>
				<div class="joblist_logo"><div class="joblist_logo_1"></div></div>
				<div class="joblist_fav">Fav</div>
				<div class="clear"></div>
			</li></a>
		</ul>	
	<?php
	}
}

?>

