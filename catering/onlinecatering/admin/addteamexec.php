<?php
session_start();
include('../connect.php');
$mm = $_POST['username'];
$ss = $_POST['password'];
$KATERER = $_POST['power'];
// query
$sql = "INSERT INTO user(username,password,power) VALUES (:a,:b,:KATERER)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$mm,':b'=>$ss,':KATERER'=>$KATERER));
header("location: team.php");


?>