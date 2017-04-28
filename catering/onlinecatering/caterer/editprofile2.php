<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$com_name = $_POST['com_name'];
$contact = $_POST['contact'];
$address = $_POST['address'];
// query
$sql = "UPDATE user 
        SET username=?, password=?, com_name=?, contact=?, address=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute([$username, $password, $com_name, $contact, $address, $id]);
header("location: profile.php");

?>