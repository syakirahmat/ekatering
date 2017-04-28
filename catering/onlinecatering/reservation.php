<?php include_once "header.php" ?>

<?php
        if(isset($_POST["submit"])){
            $_SESSION["reservation"] = NULL;
            $_SESSION["reservation"] = $_POST["reservation"];
            header("Location: part2.php");
        }
?>

<div class="row-bot">
	<div class="row-bot-bg">
		<div class="maincon">
			<div class="slider-wrapper">
				<div class="slider">
					<div id="slidercon">
						<div id="title">
							Borang Tempahan
						</div>
						  <form action="" method="post">
							<dl style="margin-left: 10px;">
								<dd>
									<span>Nama:</span>
									<input type="text" name="reservation[name]" required="required" maxlength="50"/>
								</dd>
								<dd>
									<span>Alamat:</span>
									<input type="text" name="reservation[address]" required="required" maxlength="100"/>
								</dd>
								<dd>
									<span>No.Telefon:</span>
									<input type="text" name="reservation[contact]" onKeyPress="return isNumberKey(event)"
									       required="required" maxlength="11"/>
								</dd>
								<dd>
									<span>Tarikh:</span>
									<input type="date" name="reservation[date]" required>
								</dd>
								<dd>
									<span>Jenis Majlis:</span>
									<input type="text" name="reservation[type_events]" required="required" maxlength="30"/>
								</dd>
								<dd>
									<span>Jenis Tempahan:</span>
									<select name="reservation[type_res]">
										<option value="buffet">Hidang/Buffet</option>
										<option value="packing">Bungkus</option>
									</select>
								</dd>
								<dd>
									<span>&nbsp;</span>
									<input type="submit" name="submit" value="Seterusnya"/>
								</dd>
							</dl>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="footer">&copy; Copyright e-katering UTHM 2017</div>
</body>
</html>