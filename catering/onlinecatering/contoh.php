<?php include_once "header.php" ?>

<?php
	$user_id = $_SESSION["user"]->id;
	$Menu = null;
	
	$MenuModel = new DB("menu");
	//INSERT
	if(isset($_POST["menu"]) && !isset($_GET['action'])){//when form submitted, insert
		$_POST["menu"]["user_id"] = $_SESSION["user"]->id;
		$MenuModel->insert($_POST["menu"]);
	}
	
	//ACTION
	if(isset($_GET['action'])){
		$Menu = $MenuModel->findOne($_GET['id']); // cari by id
		//UPDATE
		if($_GET['action'] == 'update' && isset($_POST["menu"])){
			$_POST["menu"]['id'] = $_GET['id'];
			//assign semua sekali
			$Menu = $MenuModel->assign($_POST["menu"]);
			//assign satu2
			// $Menu->mcat = $_POST["menu"]["mcat"];
			// $Menu->scat = $_POST["menu"]["scat"];
			// $Menu->name = $_POST["menu"]["name"];
			
			//update
			$MenuModel->update($Menu);
			header("Location: " . basename(__FILE__));
		}
		//DELETE
		if($_GET['action'] == 'delete'){
			$MenuModel->delete($Menu);
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
							<legend>Borang</legend>
							Main Category: 
							<input value="<?=isset($Menu)? $Menu->mcat:'' ?>" type="text" name="menu[mcat]" />
							<br/>
							Sub Category:
							<input value="<?=isset($Menu)? $Menu->scat:'' ?>" type="text" name="menu[scat]" />
							<br/>
							Name: 
							<input value="<?=isset($Menu)? $Menu->name:'' ?>" type="text" name="menu[name]" />
							<br/>
							Description:
							<input type="text" name="menu[description]" />
							<br/>
							Price:
							<input type="text" name="menu[price]" />
							<br/>
							<br/>
							<input type="submit" name="submit" value="Submit" />
						</fieldset>
					</form>
					<table border="1" style="background-color: white;">
						<caption><h2><a href="contoh.php">Tambah Rekod</a></h2></caption>
						<tr>
							<td>ID</td>
							<td>Main Category</td>
							<td>Sub Category</td>
							<td>Name</td>
							<td>Action</td>
						</tr>
						
						<?php
							$MenuModel = new DB("menu");
							$Menus = $MenuModel->findAll("user_id=$user_id");
							foreach($Menus as $Menu){
						?>
						<tr>
							<td><?=$Menu->id?></td>
							<td><?=$Menu->mcat?></td>
							<td><?=$Menu->scat?></td>
							<td><?=$Menu->name?></td>
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

