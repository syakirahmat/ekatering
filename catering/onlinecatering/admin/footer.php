<?php
?>

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
			if (confirm("Sure you want to delete this menu? There is NO undo!")) {

				$.ajax({
					type: "GET",
					url: "deletereservation.php",
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