<?php
include_once "../DB.php";
?>

<html>
<head>
	<title>
		E-KATERING UTHM
	</title>
	<!-- CSS Style -->
	<link rel="stylesheet" href="admin.css">
	<!--sa poip up-->
	<script src="dng_comedor.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
	<script src="lib/jquery.js" type="text/javascript"></script>
	<script src="src/facebox.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$('a[rel*=facebox]').facebox({
				loadingImage: 'src/loading.gif',
				closeImage: 'src/closelabel.png'
			})
		})
	</script>
</head>
<body>
<div id="top">
	<div class="logo">
		<img src="../images/logo.png"> <span
			style="float:right; color:#FFFFFF; font-weight:bold; display: inline-block; padding: 20px 0 0 20px;">Hello <?php echo $_SESSION['USERNAME'] ?></span>
	</div>
</div>
