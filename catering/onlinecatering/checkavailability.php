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
