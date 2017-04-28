<?php include_once "header.php" ?>

<?php
        if(isset($_POST["submit"])){
            $_SESSION["reservation"] = array_merge($_SESSION["reservation"], $_POST["reservation"]);
            $ReservationModel = new DB("reservation");
            
            // insert reservation
            $ReservationModel->insert($_SESSION["reservation"]);
            $reservation_id = $ReservationModel->getLastInsertId();
            
            //update reservation ID
            $Reservation = $ReservationModel->findOne($reservation_id);
            $Reservation->res_no = generateReservationID();
            $ReservationModel->update($Reservation);
            
            $_SESSION["reservation"]["id"] = $reservation_id;
            header("Location: selectmenu.php?reservation_id=" . $reservation_id);
        }
?>

<div style="margin: 60px auto 0px;width:300px;">
    <form action="" method="post">
	<h2>Pilih..</h2>
				Masa: <br/><input type="text" name="reservation[time]" required="required" maxlength="5"/> <select name="dws">
					<option>AM</option>
					<option>PM</option>
				</select>
				Lokasi: <br>
				<select name="reservation[location]">
					<option value=".10">Dalam UTHM</option>
					<option value=".00">Luar UTHM</option>
				</select>
				<br>
				Tempat: <br><input type="text" name="reservation[venueaddress]" style="margin-bottom: 13px; width: 298px;" required="required"
				                   maxlength="100"/><br>
				Bil. Pax: <br><input type="text" name="reservation[pax]" style="margin-bottom: 13px; width: 298px;"
				                     onKeyPress="return isNumberKey(event)" required="required" maxlength="5"/><br>
				Pilih Katerer: <br>
				<select name="reservation[caterer_id]" style="margin-bottom: 13px; width: 298px;">
					<option>&nbsp;</option>
					<?php
					include('connect.php');
					$result = $db->prepare("SELECT * FROM user");
					$result->bindParam(':id', $res);
					$result->execute();
					for ($i = 0; $row = $result->fetch(); $i++) {
						?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['com_name']; ?></option>
						<?php
					}
					?>
				</select><br><br>
				<input type="submit" name="submit" value="Seterusnya" style="margin-bottom: 13px; width: 298px;"/>
			</form>


</div>
<div id="footer">&copy; Copyright e-katering UTHM 2017</div>
</body>
</html>