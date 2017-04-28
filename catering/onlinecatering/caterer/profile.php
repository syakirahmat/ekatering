<?php include_once "header.php" ?>

	<div class="container  clearfix">
		<div class="one-third1 column">
			<ul>
				<li class="active"><a href="index.php"><img alt="" src="img/home.png"><span>Utama</span></a></li>
			<li><a href="menuorders.php"><img alt="" src="img/page.png"><span>Tempahan </span></a></li>
            <li><a href="menu.php"><img alt="" src="img/page.png"><span>Menu</span></a></li>
			<li><a href="profile.php"><img alt="" src="img/user-128.png"><span> Profil</span></a></li>
			<li><a href="../index.php"><img alt="" src="img/logout.png"><span>Log Keluar</span></a></li>
			</ul>
		</div>
		<div class="two-thirds1 column">
			<div class="thewraper">

				<table id="resultTable" data-responsive="table">
					<thead>
						<tr>
							<th> Nama Pengguna</th>
							<th> Kata Laluan</th>
							<th> Nama Katering</th>
							<th> No.Telefon</th>
							<th> Alamat</th>
							<th> Tindakan</th>
						</tr>
					</thead>
					<tbody>

						<?php
						include('../connect.php');
						$user_id = $_SESSION['user']->id;
						$result = $db->prepare("SELECT * FROM user WHERE id=$user_id ORDER BY id DESC");
						$result->execute();
						for ($i = 0; $row = $result->fetch(); $i++) {
							?>
							<tr class="record">
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['password']; ?></td>
								<td><?php echo $row['com_name']; ?></td>
								<td><?php echo $row['contact']; ?></td>
								<td><?php echo $row['address']; ?></td>
								<td><a rel="facebox" href="editprofile.php?id=<?php echo $row['id']; ?>"> Ubah </a></td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php include_once "footer.php" ?>
	
</body>
</html>