<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['id'];
$mm = $_POST['username'];
$ss = $_POST['password'];
// query
$sql = "UPDATE user 
        SET username=?, password=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($mm,$ss,$id));
header("location: team.php");

?>