<?php
function formatMoney($number, $fractional=false) {
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
<html>
<head>
<title>E-KATERING UTHM</title>
<link rel="icon" type="image/png" href="images/favicon.png" />
<link href="css/style1.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<link href="admin/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="admin/lib/jquery.js" type="text/javascript"></script>
<script src="admin/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'admin/src/loading.gif',
      closeImage   : 'admin/src/closelabel.png'
    })
  })
</script>
</head>
<body>
	<div class="row-top">
		<div class="main">
			<div class="wrapper">
				<h1><a href="">E-KATERING<br><span style="font-family: arial; font-size: 15px;">UTHM</span></a></h1>
				<nav>
				  <ul class="menu">
					<ul class="menu">
					<li><a href="index.php">Utama</a></li>
					<li><a class="active" href="menu.php">Menu</a></li>
					<li><a href="reservation.php">Tempah</a></li>
					<li><a href="checkavailability.php">Cari Katerer</a></li>
					<li><a href="contact.php">Hubungi Kami</a></li>
					<li><a href="loginform.php">log Masuk</a></li>
				  </ul>
				  </ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="row-bot">
		<div class="row-bot-bg">
			<div class="maincon">
				<div class="slider-wrapper">
					<div class="slider">
						<div id="slidercon">
							<div id="title" style="text-align:center;font-size: 18px;">
								Senarai Menu
							</div>
							<div id="about" style="overflow: scroll; height: 390px;">
								
								<ul class="price-list p2">
									<strong style="font-size: 18px;">Sarapan</strong>
									<?php
										include('connect.php');
										$id='specialty';
										$result = $db->prepare("SELECT * FROM menu WHERE mcat= :mmm");
										$result->bindParam(':mmm', $id);
										$result->execute();
										for($i=0; $row = $result->fetch(); $i++){
									?>
									<li><span>Rm <?php $dsds=$row['price'];
									echo formatMoney($dsds, true);
									?></span><a rel="facebox" href="menudetails.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
									<?php
										}
									?>
								</ul>
								<ul class="price-list p2">
									<strong style="font-size: 18px;">Makan Tengahari/Malam</strong>
									<?php
										$id='lunch_and_dinner';
										$result = $db->prepare("SELECT * FROM menu WHERE mcat= :mmm");
										$result->bindParam(':mmm', $id);
										$result->execute();
										for($i=0; $row = $result->fetch(); $i++){
									?>
									<li><span><?php echo $row['price']; ?></span><a rel="facebox" href="menudetails.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
									<?php
										}
									?>
								</ul>
								<ul class="price-list p2">
									<strong style="font-size: 18px;">Minum Petang</strong>
									<br><strong style="font-size: 12px; font-style:italic;">( Combo 285 - 2 pasta/2 meat/3 bread/2 dessert/softdrinks )</strong>
									<?php
										$id='merienda';
										$result = $db->prepare("SELECT * FROM menu WHERE mcat= :mmm");
										$result->bindParam(':mmm', $id);
										$result->execute();
										for($i=0; $row = $result->fetch(); $i++){
									?>
									<li><span><?php echo $row['price']; ?></span><a rel="facebox" href="menudetails.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
									<?php
										}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">&copy; Copyright e-katering UTHM 2017 </div>
</body>
</php>