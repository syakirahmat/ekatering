<?php
	require_once('auth.php');
?>
<html>
<head>
<title>
	E-KATERING UTHM
</title>
<!-- CSS Style -->
<link rel="stylesheet" href="admin.css">
<script src="dng_comedor.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
<body>
	<div id="top">
		<div class="logo">
			<img src=""> <span style="float:right; color:#FFFFFF; font-weight:bold; display: inline-block; padding: 20px 0 0 20px;">Hello <?php echo $_SESSION['USERNAME'] ?></span>
		</div>
	</div>
	<div class="container  clearfix">
		<div class="one-third1 column">
			<ul>
				<li><a href="index.php"><img alt="" src="img/home.png"><span>Laporan Tempahan</span></a></li>
				<li class="active"><a  href="menu.php"><img alt="" src="img/page.png"><span> Senarai Menu</span></a></li>
				<li><a href="team.php"><img alt="" src="img/team.png"><span>Katerer</span></a></li>
				<?php 
				$jhjh=$_SESSION['POWER'];
				if($jhjh==1){
				?>
				
				<?php
				}
				?>
				<li><a href="../index.php"><img alt="" src="img/logout.png"><span>Log Keluar</span></a></li>
			</ul>
		</div>
		<div class="two-thirds1 column">
			<div class="thewraper">
			
			<table id="resultTable" data-responsive="table">
				<thead>
					<tr>
						<th> Katerer </th>
						<th> Sub Menu </th>
						<th> Nama </th>
						<th> Huraian </th>
						<th> Harga </th>
					</tr>
				</thead>
				<tbody>
					<?php
						include('../connect.php');
						$result = $db->prepare("SELECT * FROM menu ORDER BY id DESC");
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){
					?>
					<tr class="record">
						<td><?php echo $row['mcat']; ?></td>
						<td><?php echo $row['scat']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['description']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td>
					<?php
						}
					?>

				</tbody>
			</table>
			</div>
		</div>
	</div>
	<div id="footer">
		<div class="copyrights">&copy; Copyright e-katering UTHM 2017</div>
	</div>
	
</body>
</html>