<?php include_once "header.php" ?>

<div class="row-bot">
	<div class="row-bot-bg">
		<div class="maincon">
			<div class="slider-wrapper">
				<div class="slider">
					<div id="slidercon" style="height: 200px; margin-top: 110px;">
						<div id="title">
							Cari Katerer
						</div>
						<?php
						include('connect.php');
						$result = $db->prepare("SELECT * FROM falied");
						$result->execute();
						for ($i = 0; $row = $result->fetch(); $i++) {
							$gcvgvc = $row['attempt'];
							$tttt = $row['time'];
						}
						$kjkjk = date('H:i:s');
						$time1 = strtotime($kjkjk);
						$time2 = strtotime($tttt);
						$diff = $time1 - $time2;
						if ($diff > 59) {
							$mm = 0;
							$sql = "UPDATE falied 
        SET attempt=?";
							$q = $db->prepare($sql);
							$q->execute([$mm]);

						}
						if ($gcvgvc <= 2) {
							?>
							<form action="chechavaibilitycondition.php" method="post">
								<?php
								?>
								<dl style="margin-left: 10px;">
									<dd>
										<span>Tarikh Mula:</span>
										<input type="date" name="startdate" required>
									</dd>
									<dd>
										<span>Tarikh Tamat:</span>
										<input type="date" name="enddate" required>
									</dd>
									<dd>
										<span>&nbsp;</span>
										<input type="submit" value="Cari"/>
									</dd>
								</dl>
							</form>
							<?php
						}
						if ($gcvgvc >= 3) {
							echo '<span style="color: #ffffff; font-weight: bold; padding-left: 20px;width: 287px;display: inline-block;">You Have Reach The Maximum Login Attempts, Pls. Try after 30mins, <a href="loginform.php">Refresh</a> the page to try again.<span>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once "footer.php" ?>
