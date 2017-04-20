<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM user WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="editteamexec.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
Nama Pengguna<br>
<input type="text" name="username" value="<?php echo $row['username']; ?>" /><br>
Kata Laluan<br>
<input type="text" name="password" value="<?php echo $row['password']; ?>" /><br>
<input type="submit" value="Simpan" />
</form>
<?php
	}
?>