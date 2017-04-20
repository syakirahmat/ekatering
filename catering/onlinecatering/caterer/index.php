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
<!--sa poip up-->
<script src="dng_comedor.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
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
			<img src="../images/logo.png"> <span style="float:right; color:#FFFFFF; font-weight:bold; display: inline-block; padding: 20px 0 0 20px;">Hello <?php echo $_SESSION['USERNAME'] ?></span>
		</div>
	</div>
	<div class="container  clearfix">
		<div class="one-third1 column">
			<ul>
				<li class="active"><a href="index.php"><img alt="" src="img/home.png"><span>Tempahan</span></a></li>
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
						<th width="3%"> Tarikh </th>
						<th width="3%"> Tarikh Tempahan </th>
						<th width="21%"> ID Tempahan </th>
						<th width="11%"> Nama </th>
						<th width="11%"> No.Telefon </th>
						<th width="11%"> Alamat </th>
						<th width="5%"> Pax </th>
						<th width="11%"> Catering Pilihan </th>
						<th width="11%"> Status </th>
						<th width="12%"> Action </th>
					</tr>
				</thead>
				<tbody>
					
						<?php
							include('../connect.php');
							$result = $db->prepare("SELECT * FROM reservation ORDER BY id DESC");
							$result->execute();
							for($i=0; $row = $result->fetch(); $i++){
						?>
						<tr class="record">
						<td><?php echo $row['resdate']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['res_id']; ?></td>
						<td><?php echo $row['firstname']; ?>&nbsp;<?php echo $row['lastname']; ?></td>
						<td><?php echo $row['contact']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['pax']; ?></td>
						<td><?php echo $row['team']; ?></td>
						<td><?php echo $row['status']; ?></td>
						<td><a rel="facebox" href="details.php?res=<?php echo $row['res_id']; ?>">Details</a><br><a rel="facebox" href="eteam.php?res=<?php echo $row['res_id']; ?>">Status</a><br><a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete">Delete</a></td>
						</tr>
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
	<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this menu? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletereservation.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
</html>