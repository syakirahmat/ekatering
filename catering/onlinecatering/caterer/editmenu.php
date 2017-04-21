<?php
include('../connect.php');
$id = $_GET['id'];
$result = $db->prepare("SELECT * FROM menu WHERE id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
	?>
	<form action="edit.php" method="POST">
		Kategori<br>
		<select name="mcat">
			<option value="<?php echo $row['mcat']; ?>"><?php echo $row['mcat']; ?></option>
			<option value="breakfast">Sarapan</option>
			<option value="teatime">Minum Petang</option>
			<option value="lunch_and_dinner">Makan Tengahari/Malam</option>
		</select>
		<br>
		Kategori Menu<br>
		<select name="scat">
			<option value="<?php echo $row['scat']; ?>"><?php echo $row['scat']; ?></option>
			<option value="sup">sup</option>
			<option value="kari">kari</option>
			<option value="ayam">ayam</option>
			<option value="ikan">ikan</option>
			<option value="daging lembu">daging lembu</option>
			<option value="daging kambing">daging kambing</option>
			<option value="udang">udang</option>
			<option value="sotong">sotong</option>
			<option value="mee">mee</option>
			<option value="bihun">bihun</option>
			<option value="kuey teow">kuey teow</option>
			<option value="minuman">minuman</option>
			<option value="nasi">nasi</option>
			<option value="roti">roti</option>
		</select><br>
		<input type="hidden" name="memids" value="<?php echo $id; ?>"/>
		Nama<br>
		<input type="text" name="name" value="<?php echo $row['name']; ?>"/><br>
		Butiran<br>
		<textarea name="description"><?php echo $row['description']; ?></textarea><br>
		Harga<br>
		<input type="text" name="price" value="<?php echo $row['price']; ?>"/><br>
		<input type="submit" value="Simpan"/>
	</form>
	<?php
}
?>