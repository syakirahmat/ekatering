<?php include_once "header.php" ?>

<div class="container  clearfix">
	<div class="one-third1 column">
		<ul>
			<li class="active"><a href="index.php"><img alt="" src="img/home.png"><span>Utama</span></a></li>
			<li><a href="menuorders.php"><img alt="" src="img/page.png"><span>Tempahan</span></a></li>
            <li><a href="menu.php"><img alt="" src="img/page.png"><span>Menu</span></a></li>
			<li><a href="profile.php"><img alt="" src="img/user-128.png"><span> Profil</span></a></li>
			<li><a href="../index.php"><img alt="" src="img/logout.png"><span>Log Keluar</span></a></li>
		</ul>
	</div>
    <div>

        <form action="" method="get">
            <select name="reservation_id">
                <option value="" disabled="disabled" selected="selected">ID     Tempahan</option>
                <?php
                    $ReservationModel = new DB("reservation");
                    $Reservations  = $ReservationModel->findAll("caterer_id=" . $_SESSION["user"]->id);
                    foreach($Reservations as $Reservation){
                        ?>
                <option value="<?=$Reservation->id?>"><?=$Reservation->res_no?></option>
                        <?php
                    }
                ?>
            </select>
            
            <button type="submit" name="submit">Lihat Menu</button>
        </form>
    
    </div>
	<div class="two-thirds1 column">
		<div class="thewraper">
            
                

			<table id="resultTable" data-responsive="table">
				<thead>
				<tr>
					<th width="20%"> ID Tempahan</th>
					<th width="60%"> Kategori 1</th>
                    <th width="60%"> Kategori 2</th>
                    <th width="60%"> Nama Menu</th>
					<th width="20%"> Tindakan</th>
				</tr>
				</thead>
				<tbody>
				<?php
				include('../connect.php');
                if(isset($_GET['reservation_id'])){
                    $reservation_id = $_GET['reservation_id'];
                    $MenuReservationModel = new DB("menu_res");
                    $MenusReservation = $MenuReservationModel->findAll("res_id = " . $reservation_id);
                    foreach($MenusReservation as $MenuReservation){
                        ?>
                    <tr class="record">
						<td><?=$MenuReservation->res_id ?></td>
						<td><?=$MenuReservation->cat1 ?></td>
						<td><?=$MenuReservation->cat2 ?></td>
                        <td><?=$MenuReservation->menu ?></td>
						<td><a href="#" id="<?$MenuReservation->id ?>" class="delbutton"
						       title="Click To Delete">Delete</a></td>
					</tr>
                    <?php
                    }
                } ?>
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
	$(function () {


		$(".delbutton").click(function () {

//Save the link in a variable called element
			var element = $(this);

//Find the id of the link that was clicked
			var del_id = element.attr("id");

//Built a url to send
			var info = 'id=' + del_id;
			if (confirm("Sure you want to delete this update? There is NO undo!")) {

				$.ajax({
					type: "GET",
					url: "deleteorder.php",
					data: info,
					success: function () {

					}
				});
				$(this).parents(".record").animate({backgroundColor: "#fbc7c7"}, "fast")
					.animate({opacity: "hide"}, "slow");

			}

			return false;

		});

	});
</script>
</body>
</html>