<html>
<head>
<title>E-KATERING UTHM</title>
<link rel="icon" type="image/png" href="" />
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
					<li><a class="active" href="index.php">Utama</a></li>
					<li><a href="menu.php">Menu</a></li>
					<li><a href="reservation.php">Tempah</a></li>
					<li><a href="checkavailability.php">Cari Katerer</a></li>
					<li><a href="contact.php">Hubungi Kami</a></li>
					<li><a href="loginform.php">Log Masuk</a></li>
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
							<div id="title">
								Ruang Lazat</br></br>
							</div>
							<?php
								include('connect.php');
								$result = $db->prepare("SELECT * FROM menu ORDER BY rand() LIMIT 4");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
							?>
							<div id="imgcon"><a rel="facebox" href="details.php?id=<?php echo $row['id']; ?>"><img src="menu/<?php echo $row['image']; ?>" width="150" height="150"></a></div>
							<?php
								}
							?>
					
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">&copy; Copyright e-katering UTHM 2017</div>
</body>
</php>