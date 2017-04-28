<?php include_once "header.php" ?>

<div class="container clearfix">
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
					<th width="3%"> Tarikh Tempahan </th>
					<th width="21%"> ID Tempahan</th>
					<th width="11%"> Nama</th>
					<th width="11%"> No.Telefon</th>
					<th width="11%"> Alamat</th>
					<th width="5%"> Pax</th>
					<th width="11%"> Status</th>
                    <th width="11%"> Tindakan</th>
				</tr>
				</thead>
				<tbody>

				<?php
				include('../connect.php');
                $caterer_id = $_SESSION['user']->id;
				$result = $db->prepare("SELECT * FROM reservation WHERE caterer_id=$caterer_id ORDER BY caterer_id DESC");
				$result->execute();
				for ($i = 0; $row = $result->fetch(); $i++) {
					?>
					<tr class="record">
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['res_no']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['contact']; ?></td>
						<td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['pax']; ?></td>
						<td><?php echo $row['status']; ?></td>
                        <td><a rel="facebox" href="editstatus.php?id=<?php echo $row['id']; ?>"> Status </a></td>
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
