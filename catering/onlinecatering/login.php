<?php
include_once "DB.php";

$login = filter_var($_POST['uname'], FILTER_SANITIZE_STRING);;
$password = filter_var($_POST['pword'], FILTER_SANITIZE_STRING);;

$UserModel = new DB('user');
$User = $UserModel->find("username='$login' AND password='$password'");
if ($User) {
	//Login Successful
	session_regenerate_id();
	$_SESSION['SESS_MEMBER_ID'] = $User->id;
	$_SESSION['USERNAME'] = $User->username;
	$_SESSION['POWER'] = $User->power;
	$_SESSION['user'] = $User;
	session_write_close();

	if ($_SESSION['user']->power == 'ADMIN') {
		header("location: admin/index.php");
	} else {
		echo "<script>alert('Selamat Datang ' + {$_SESSION['user']->username})</script>";
		echo "<script>window.location.href='caterer/index.php'</script>";
		//header("location: caterer/index.php");
	}
	exit();
} else {
	//Login failed
	$endTime = date('H:i:s');
	$FailedModel = new DB('failed');
	$Failed = $FailedModel->find();
	$Failed->attempt = intval($Failed->attempt) + 1;
	$Failed->time = $endTime;
	$FailedModel->update($Failed);
	header("location: loginform.php");

	exit();
}
/*//Start session
session_start();

//Connect to mysql server
$link = mysql_connect('localhost', 'root', "");
if (!$link) {
	die('Failed to connect to server: ' . mysql_error());
}

//Select database
$db = mysql_select_db("dng_comedor", $link);
if (!$db) {
	die("Unable to select database");
}

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
	$str = @trim($str);
	if (get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
}

//Sanitize the POST values
$login = clean($_POST['uname']);
$password = clean($_POST['pword']);

//Create query
$qry = "SELECT * FROM user WHERE username='$login' AND password='$password'";
$result = mysql_query($qry);
//while($row = mysql_fetch_array($result))
//  {
//  $level=$row['position'];
//  }
//Check whether the query was successful or not
if ($result) {
	if (mysql_num_rows($result) > 0) {
		//Login Successful
		session_regenerate_id();
		$member = mysql_fetch_assoc($result);
		$_SESSION['SESS_MEMBER_ID'] = $member['id'];
		$_SESSION['USERNAME'] = $member['username'];
		$_SESSION['POWER'] = $member['power'];
		session_write_close();
		//if ($level="caterer"){
		header("location: caterer/index.php");
		exit();
	} else {
		//Login failed
		$endTime = date('H:i:s');
		mysql_query("UPDATE falied SET attempt=attempt+1, time='$endTime'");
		header("location: loginform.php");

		exit();
	}
} else {
	die("Query failed");
}*/
?>