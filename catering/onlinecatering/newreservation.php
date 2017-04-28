<?php include_once "header.php" ?>


<?php
	$user_id = $_SESSION["user"]->id;
	$Reservation = null;
	
	$ReservationModel = new DB("reservation");
	//INSERT
	if(isset($_POST["reservation"]) && !isset($_GET['action'])){//when form submitted, insert
		$_POST["reservation"]["user_id"] = $_SESSION["user"]->id;
		$ReservationModel->insert($_POST["reservation"]);
	}
	
	//ACTION
	if(isset($_GET['action'])){
		$Reservation = $ReservationModel->findOne($_GET['id']); // cari by id
		//UPDATE
		if($_GET['action'] == 'update' && isset($_POST["reservation"])){
			$_POST["reservation"]['id'] = $_GET['id'];
			//assign semua sekali
			//$Menu = $ReservationModel->assign($_POST["reservation"]);
			//assign satu2
			$Reservation->res_id = $_POST["reservation"]["res_id"];
			$Reservation->name = $_POST["reservation"]["name"];
			$Reservation->address = $_POST["reservation"]["address"];
			$Reservation->contact = $_POST["reservation"]["contact"];
			$Reservation->date = $_POST["reservation"]["date"];
			$Reservation->type_events = $_POST["reservation"]["type_events"];
			$Reservation->type_res = $_POST["reservation"]["type_res"];
			
			//update
			$ReservationModel->update($Reservation);
			header("Location: " . basename(__FILE__));
		}
		//DELETE
		if($_GET['action'] == 'delete'){
			$ReservationModel->delete($Reservation);
			$Menu = null;
			header("Location: " . basename(__FILE__));
		}
	}
?>

<div class="row-bot">
	<div class="row-bot-bg">
		<div class="maincon">
			<div class="slider-wrapper">
				<div class="slider">
					<form action="" method="post" enctype='multipart/form-data'>
						<fieldset>
							<legend>Borang Tempahan</legend>
							<dd>
							<span>Nama:</span>
							<input value="<?=isset($Reservation)? $Reservation->name:'' ?>" type="text" name="reservation[name]" />
							</dd>
							<dd>
							<span>Alamat:</span>
							<input value="<?=isset($Reservation)? $Reservation->address:'' ?>" type="text" name="reservation[address]" />
							</dd>
							<dd>
							<span>No.Telefon: </span>
							<input value="<?=isset($Reservation)? $Reservation->contact:'' ?>" type="text" name="reservation[contact]" />
							</dd>
							<dd>
							<span>Tarikh:</span>
							<input value="<?=isset($Reservation)? $Reservation->date:'' ?>" type="date" name="reservation[date]" />
							</dd>
							<dd>
							<span>Jenis Majlis:</span>
							<input value="<?=isset($Reservation)? $Reservation->type_events:'' ?>" type="text" name="reservation[type_events]" />
							</dd>
							<dd>
							
							
							<input type="submit" name="submit" value="Tempah" />
						</fieldset>
					</form>
					<table border="1" style="background-color: white;">
						<caption><h2><a href="newreservation.php">Paparan</a></h2></caption>
						<tr>
							<td>ID</td>
							<td>Nama</td>
							<td>Alamat</td>
							<td>No.Telefon</td>
							<td>Tarikh</td>
							<td>Jenis Majlis</td>
							<td>Tindakan</td>
						</tr>
						
						<?php
							$ReservationModel = new DB("reservation");
							$Reservations = $ReservationModel->findAll("user_id=$user_id");
							foreach($Reservations as $Reservation){
						?>
						<tr>
							<td><?=$Reservation->id?></td>
							<td><?=$Reservation->name?></td>
							<td><?=$Reservation->address?></td>
							<td><?=$Reservation->contact?></td>
							<td><?=$Reservation->date?></td>
							<td><?=$Reservation->type_events?></td>
							<td><?=$Reservation->type_res?></td>
							<td>
								<a href="?id=<?=$Menu->id?>&action=update">Update</a>
								<a href="?id=<?=$Menu->id?>&action=delete">Delete</a>
							</td>
						</tr>
							<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once "footer.php" ?>
