<?php include_once "header.php" ?>

<div class="row-bot">
	<div class="row-bot-bg">
		<div class="maincon">
			<div class="slider-wrapper">
				<div class="slider">
					<div id="slidercon">
						<div id="title">
							Ruang Lazat</br></br>
						</div>
						<?php
						include('connect.php');
						$result = $db->prepare("SELECT * FROM menu ORDER BY rand() LIMIT 4");
						$result->execute();
						for ($i = 0; $row = $result->fetch(); $i++) {
							?>
							<div id="imgcon"><a rel="facebox" href="details.php?id=<?php echo $row['id']; ?>"><img
										src="menu/<?php echo $row['image']; ?>" width="150" height="150"></a></div>
							<?php
						}
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once "footer.php" ?>
