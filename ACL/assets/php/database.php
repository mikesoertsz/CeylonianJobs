<?php
session_start();
ob_start();
/*
$hasDB = false;
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'mikesoer_acl_test';
$link = mysql_connect($server,$user,$pass);
if (!is_resource($link)) {   
	$hasDB = false;
	die("Could not connect to the MySQL server at localhost.");
} else {   
	$hasDB = true;
	mysql_select_db($db);
}
*/

global $con;
$con = mysqli_connect("localhost","root","","mikesoer_acl_test"); 

?>