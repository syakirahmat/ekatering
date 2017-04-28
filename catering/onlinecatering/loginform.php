<?php include_once "header.php" ?>

<div class="row-bot">
	<div class="row-bot-bg">
		<div class="maincon">
			<div class="slider-wrapper">
				<div class="slider">
					<div id="slidercon" style="height: 200px; margin-top: 110px;">
						<div id="title">
							Log Masuk
						</div>
						<?php
						include('connect.php');
						$result = $db->prepare("SELECT * FROM failed");
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
							$sql = "UPDATE failed 
        SET attempt=?";
							$q = $db->prepare($sql);
							$q->execute([$mm]);
						}
						if ($gcvgvc <= 2) {
							?>
							<form action="login.php" method="post">
								<?php
								?>
								<dl style="margin-left: 10px;">
									<dd>
										<span>Nama Pengguna:</span>
										<input type="text" name="uname" value="zainah katering"/>
									</dd>
									<dd>
										<span>Kata Laluan:</span>
										<input type="password" name="pword" value="1111"/>
									</dd>
									<dd>
										<span>&nbsp;</span>
										<input type="submit" value="Log Masuk"/>
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
