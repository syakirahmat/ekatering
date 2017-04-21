<html>
<head>
	<link href="css/style1.css" media="screen" rel="stylesheet" type="text/css"/><!--sa poip up-->
	<link href="admin/src/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
	<script src="admin/lib/jquery.js" type="text/javascript"></script>
	<script src="admin/src/facebox.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$('a[rel*=facebox]').facebox({
				loadingImage: 'admin/src/loading.gif',
				closeImage: 'admin/src/closelabel.png'
			})
		})
	</script>

	<script language="javascript">
		function Clickheretoprint() {
			var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
			disp_setting += "scrollbars=yes,width=700, height=400, left=100, top=25";
			var content_vlue = document.getElementById("content").innerHTML;

			var docprint = window.open("", "", disp_setting);
			docprint.document.open();
			docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');
			docprint.document.write(content_vlue);
			docprint.document.close();
			docprint.focus();
		}
	</script>
</head>
<body style="background-image:url(images/bg1.png);">
<div class="row-top" style="margin-bottom: 20px;">
	<div class="main">
		<div class="wrapper">
			<h1><a href="">E-KATERING<br><span style="font-family: arial; font-size: 15px;">UTHM</span></a></h1>
		</div>
	</div>
</div>
<?php
function formatMoney($number, $fractional = false) {
	if ($fractional) {
		$number = sprintf('%.2f', $number);
	}
	while (true) {
		$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
		if ($replaced != $number) {
			$number = $replaced;
		} else {
			break;
		}
	}
	return $number;
}

?>

<div class="content" id="content"
     style="width: 700px; font-size:11px; font-family:arial; font-weight:normal; margin:0 auto;">
	<div style="text-align:center; font-size:14px;">
		<strong style="font-size:18px;">E-KATERING</strong><br>
		<strong style="font-size:14px;">UTHM</strong>

		Tel. No.0<br/>
		<div style="text-align:center; color:#FFFF00; font-style:italic;">(Your Reservation is pending, you may check
			your reservation status after 24hrs. The management will call you or you may keep a copy of your reservation
			Id for verification.)
		</div>
	</div>
	<br><br>
	<?php
	include('connect.php');
	$res = $_GET['res'];
	$cat = $_GET['mcat'];
	$result = $db->prepare("SELECT * FROM reservation WHERE res_id= :userid");
	$result->bindParam(':userid', $res);
	$result->execute();
	for ($i = 0; $row = $result->fetch(); $i++) {
		?>
		<div style="float:left; width:50%;line-height:20px;font-size:14px;">
			ID Tempahan:<strong><?php echo $row['res_id']; ?></strong><br>
			Nama:<strong><?php echo $row['firstname']; ?></strong><br>
			Nama Akhir:<strong><?php echo $row['lastname']; ?></strong><br>
			Alamat:<strong><?php echo $row['address']; ?></strong><br>
			No.Telefon:<strong><?php echo $row['contact']; ?></strong><br>
			Tarikh:<strong><?php echo $row['date']; ?></strong><br>
			Masa:<strong><?php echo $row['time']; ?></strong><br>
			Agenda:<strong><?php echo $row['motif']; ?></strong><br>
		</div>
		<div style="float: right; width: 50%; text-align: right; line-height: 20px; height: 162px;font-size:14px;">
			Jenis Majlis:<strong><?php echo $row['type_events']; ?></strong><br>
			Jenis Tempahan:<strong><?php
				echo $row['type_res'];
				$dsdssd = $row['type_res'];
				?></strong><br>
			Katering Pilihan:<strong><?php echo $row['cat']; ?></strong><br>
			Bil. kepala:<strong><?php echo $row['pax']; ?></strong><br>
			Tempat:<strong><?php echo $row['venueaddress']; ?></strong><br>

			Combo: <strong><?php
				$id = $row['combo'];
				if ($id != '0') {
					$result = $db->prepare("SELECT * FROM combo WHERE id= :asas");
					$result->bindParam(':asas', $id);
					$result->execute();
					for ($i = 0; $rows = $result->fetch(); $i++) {
						echo $rows['comboname'] . '-' . $rows['combolist'];
						$sdsds = $rows['comboname'];
					}
				}
				if ($id == '0') {
					$sdsds = 0;
					if ($cat != 'specialty') {
						?>
						<a rel="facebox" style="font-size:14px;"
						   href="combo.php?id=<?php echo $cat ?>&res=<?php echo $res ?>&addddd=<?php echo $_GET['additional'] ?>">Select
							Combo</a>
						<?php
					}
					if ($cat == 'specialty') {
						echo 'Not Available';
					}
				}
				?></strong><br>
			Payable Amount:&nbsp;
			<strong>RM<?php
				if ($cat != 'specialty') {
					$sdrwer = $row['res_id'];
					$p = $row['pax'];
					$pr = $sdsds;
					$total = $p * $pr;
					$dfdfdfdfdfddffdfd = $_GET['additional'];

					$sdsdsdsd = $total * $dfdfdfdfdfddffdfd;
					$WATAMOVE = $total + $sdsdsdsd;
					if ($dsdssd != 'functionroom') {
						$dsd = $WATAMOVE;
						echo formatMoney($dsd, true);

						$sql = "UPDATE reservation 
        SET amount=?
		WHERE res_id=?";
						$q = $db->prepare($sql);
						$q->execute([$dsd, $sdrwer]);

					}
					if ($dsdssd == 'functionroom') {
						$bbbb = $total + 3000;
						echo formatMoney($bbbb, true);

						$sql = "UPDATE reservation 
        SET amount=?
		WHERE res_id=?";
						$q = $db->prepare($sql);
						$q->execute([$bbbb, $sdrwer]);
					}
				}
				if ($cat == 'specialty') {

					$arara = $row['res_id'];
					$resultas = $db->prepare("SELECT sum(price) FROM menu_res WHERE res_id= :a");
					$resultas->bindParam(':a', $arara);
					$resultas->execute();
					for ($i = 0; $rowas = $resultas->fetch(); $i++) {
						$fgfg = $rowas['sum(price)'];
						if ($dsdssd != 'functionroom') {
							$asasdd = $fgfg;
							echo formatMoney($asasdd, true);

							$sql = "UPDATE reservation 
				SET amount=?
				WHERE res_id=?";
							$q = $db->prepare($sql);
							$q->execute([$asasdd, $arara]);

						}
						if ($dsdssd == 'functionroom') {
							$asasdd = $fgfg + 3000;
							echo formatMoney($asasdd, true);

							$sql = "UPDATE reservation 
				SET amount=?
				WHERE res_id=?";
							$q = $db->prepare($sql);
							$q->execute([$asasdd, $arara]);

						}
					}
				}
				?>
			</strong>
			<br><br>
			<br><br>
		</div>
		<?php
		$resulta = $db->prepare("SELECT * FROM menu_res WHERE res_id= :asas");
		$resulta->bindParam(':asas', $res);
		$resulta->execute();
		$rowa = $resulta->fetch(PDO::FETCH_NUM);
		if ($rowa == 0) {
			?>

			<a rel="facebox" style="font-size:14px;"
			   href="menuboard.php?id=<?php echo $cat ?>&res=<?php echo $res ?>&gfgfgfgfgfgf=<?php echo $_GET['additional'] ?>">pls
				select menu</a>
			<?php
		}
		?>

		<?php
	}
	?>

	<table id="resultTable" width="100%" style="font-size:14px; font-family:arial; font-weight:normal;">
		<thead>
		<tr>
			<th style="text-align:left;"> Jenis Menu</th>
			<th style="text-align:left;"> Menu</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$result = $db->prepare("SELECT * FROM menu_res WHERE res_id= :asas");
		$result->bindParam(':asas', $res);
		$result->execute();
		for ($i = 0; $rowas = $result->fetch(); $i++) {
			$menu = $rowas['menu'];
			$results = $db->prepare("SELECT * FROM menu WHERE id= :ll");
			$results->bindParam(':ll', $menu);
			$results->execute();
			for ($i = 0; $rowass = $results->fetch(); $i++) {
				?>
				<tr class="record">
					<td><?php echo $rowass['scat']; ?></td>
					<td><?php echo $rowass['name']; ?></td>
				</tr>
				<?php
			}
		}
		?>
		</tbody>
	</table>
</div>
<div style="text-align:center; margin-top:100px;">
	<?php
	if ($rowa != 0) {
		?>
		<a href="javascript:Clickheretoprint()"
		   style="font-size:20px; text-decoration:none; color:#FFFFFF; padding: 10px; border:1px solid grey; margin-right: 10px; background-color:#333333; margin-top:40px;"
		   ;>Print</a><a href="index.php"
		                 style="font-size:20px; text-decoration:none; color:#FFFFFF; padding: 10px; border:1px solid grey; background-color:#333333; margin-top:40px;">Finish</a>
	<?php }
	?>
</div>
</body>
</html>