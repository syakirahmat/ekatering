<?php
include('../connect.php');
$id = $_GET['id'];
$result = $db->prepare("SELECT * FROM menu WHERE id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
	?>
	<form action="editprofileexec.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>
		Nama Pengguna<br>
		<input type="text" name="username" value="<?php echo $row['username']; ?>"/><br>
		Kata Laluan<br>
		<input type="text" name="password" value="<?php echo $row['password']; ?>"/><br>
		Nama Katering<br>
		<input type="text" name="com_name" value="<?php echo $row['com_name']; ?>"/><br>
		No.Telefon<br>
		<input type="text" name="contact" value="<?php echo $row['contact']; ?>"/><br>
		Alamat<br>
		<input type="text" name="address" value="<?php echo $row['address']; ?>"/><br>
		<input type="submit" value="Simpan"/>
	</form>
	<?php
}
?>