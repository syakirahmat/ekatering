<?php include_once "header.php" ?>
<?php
    $res_id = NULL;
    $menu_res_id = NULL;
    $MenuReservation = NULL;
    $ReservationModel = new DB("reservation");
    $MenuReservationModel = new DB("menu_res");
    
    if($res_id = $_SESSION["reservation"]["id"]){
        $Reservation = $ReservationModel->findOne($res_id);
        
        if(isset($_POST["add"])){//insert
            $_POST['menu_res']['res_id'] = $Reservation->id;
            $MenuReservationModel->insert($_POST['menu_res']);
            echo "Menu telah ditambah...";
        }

        if(isset($_POST["update"])){//update
            $menu_res_id = $_GET['menu_reservation_id'];
            $MenuReservation = $MenuReservationModel->findOne($menu_res_id);
            $_POST['menu_res']['id'] = $menu_res_id;
            $MenuReservation = $MenuReservationModel->assign($_POST['menu_res']);
            $MenuReservationModel->update($MenuReservation);
        }

        if(isset($_GET["action"]) && $_GET["action"]=='delete'){//delete
            $menu_res_id = $_GET['menu_reservation_id'];
            $MenuReservation = $MenuReservationModel->findOne($menu_res_id);
            $MenuReservationModel->delete($MenuReservation);
            
            header("Location: ". basename(__FILE__));
        }
    }


    if(!isset($_GET['action']))
        $_GET['action']='add';
?>
<h1 style="padding: 10px">No. Tempahan Anda: <u><?=$Reservation->res_no?></u></h1>
<div style="margin: 60px auto 0px;width:300px;">

    
	   <h2>Pilih Menu</h2>
			<form action="" method="post">
				Pilih Kategori 1: <br>
				<select name="menu_res[cat1]" style="margin-bottom: 13px; width: 298px;">
					<option>&nbsp;</option>
					<?php
					include('connect.php');
					$result = $db->prepare("SELECT * FROM maincategory");
					$result->bindParam(':id', $res);
					$result->execute();
					for ($i = 0; $row = $result->fetch(); $i++) {
						?>
						<option><?php echo $row['name']; ?></option>
						<?php
					}
					?>
				</select><br><br>
                <form>
				Pilih Kategori 2: <br>
				<select name="menu_res[cat2]" style="margin-bottom: 13px; width: 298px;">
					<option>&nbsp;</option>
					<?php
					include('connect.php');
					$result = $db->prepare("SELECT * FROM subcategory");
					$result->bindParam(':id', $res);
					$result->execute();
					for ($i = 0; $row = $result->fetch(); $i++) {
						?>
						<option><?php echo $row['name']; ?></option>
						<?php
					}
					?>
				</select><br><br>
                    <form>
				Pilih Menu: <br>
				<select name="menu_res[menu]" style="margin-bottom: 13px; width: 298px;">
					<option>&nbsp;</option>
					<?php
					include('connect.php');
					$result = $db->prepare("SELECT * FROM menu");
					$result->bindParam(':id', $res);
					$result->execute();
					for ($i = 0; $row = $result->fetch(); $i++) {
						?>
						<option><?php echo $row['name']; ?></option>
						<?php
					}
					?>
                    
				</select><br><br>
                <input type="submit" name="<?=isset($_GET['action'])? $_GET['action']:'Add' ?>" value="<?=ucfirst($_GET['action'])?>" style="margin-bottom: 13px; width: 298px;"/>
                        <table border="1" style="background-color: white;">
						<caption><h2><a href="selectmenu.php"> Paparan Tempahan</a></h2></caption>
						<tr>
							<td>ID</td>
							<td>Kategori 1</td>
							<td>Kategori 2</td>
							<td>Menu</td>
							<td>Action</td>
						</tr>
						
						<?php
                            if($res_id){
                                $MenuReservations = $MenuReservationModel->findAll("res_id=$res_id");
				                foreach($MenuReservations as $MenuReservation){
							
						?>
						<tr>
							<td><?=$MenuReservation->id?></td>
							<td><?=$MenuReservation->cat1?></td>
							<td><?=$MenuReservation->cat2?></td>
							<td><?=$MenuReservation->menu?></td>
							<td>
								<a href="?menu_reservation_id=<?=$MenuReservation->id?>&action=update">Update</a>
								<a href="?menu_reservation_id=<?=$MenuReservation->id?>&action=delete">Delete</a>
							</td>
						</tr>
							<?php } } ?>
					</table>
                    </br>
                    </br>
                    <div><center><input type="button" value="Selesai" onclick="window.location.href='index.php'" </center></div>
                    
			</form>

			

                
<div id="footer">&copy; Copyright e-katering UTHM 2017</div>