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


        <select>
            <option value="" disabled="disabled" selected="selected">ID Tempahan</option>
            <option value="Id">20170427A7E9</option>
            <option value="Id">201704277E69</option>
            <option value="Id">201704273A45</option>
            <option value="Id">20170427ABA3</option>
            <option value="Id">20170427D5AC</option>
            <option value="Id">201704270D26</option>
            <option value="Id">2017042719DF</option>
        </select>
    
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
                $res_id = $_GET['res_id'];
				$result = $db->prepare("SELECT * FROM menu_res WHERE res_id=$res_id ORDER BY id DESC");
				$result->execute();
				for ($i = 0; $row = $result->fetch(); $i++) {
					?>
					<tr class="record">
						<td><?php echo $row['res_id']; ?></td>
						<td><?php echo $row['cat1']; ?></td>
						<td><?php echo $row['cat2']; ?></td>
                        <td><?php echo $row['menu']; ?></td>
						<td><a href="#" id="<?php echo $row['id']; ?>" class="delbutton"
						       title="Click To Delete">Delete</a></td>
					</tr>
					<?php
				}
				?>
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