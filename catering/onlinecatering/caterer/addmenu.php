<form action="add.php" method="POST" enctype="multipart/form-data">
	Kategori<br>
	<select name="mcat">
		<?php
		include('../connect.php');
		$result = $db->prepare("SELECT * FROM maincategory");
		$result->bindParam(':userid', $res);
		$result->execute();
		for ($i = 0; $row = $result->fetch(); $i++) {
			?>
			<option><?php echo $row['name']; ?></option>
			<?php
		}
		?>
	</select>
	<br>
	Kategori Menu<br>
	<select name="scat">
		<?php
		$result = $db->prepare("SELECT * FROM subcategory");
		$result->bindParam(':userid', $res);
		$result->execute();
		for ($i = 0; $row = $result->fetch(); $i++) {
			?>
			<option><?php echo $row['name']; ?></option>
			<?php
		}
		?>
	</select><br>
	Nama<br>
	<input type="text" name="name" value=""/><br>
	Huraian<br>
	<textarea name="description"></textarea><br>
	Harga<br>
	<input type="text" name="price" value=""/><br>
	Gambar Menu: <br/>
	<input type="file" name="image" class="ed"><br/>
	<input type="submit" value="Simpan"/>
</form>