<html>
	<body style='margin:0; padding:0; background-color:lightblue;'>
		<div style='margin-left:25px; position:absolute;'>
			<h1>
				E-KATERING 
			</h1>
		</div>
		<div style='margin-left:1100px; position:absolute;'>
			<h3>
				<?php
					$connect=mysql_connect('localhost','root','Yang94');
					$database=mysql_select_db('CSHK',$connect);
					
					session_start();
					
					if(isset($_SESSION['username']))
					{
						echo
						'
							<h2 style="margin-top:50px;">
								Welcome, '.$_SESSION['username'].'
							</h2>
						';
					}
					else
					{
						header("location:home.php");
					}
				?>
			</h3>
		</div>
		<div style='margin-top:75px; position:absolute;'>
			<ul style='overflow:hidden; background-color:#333; width:1325px; list-style-type:none;'>
				<li style='float:left;'>
					<a style='padding:14px 16px; display:block; color:white; text-align:center; text-decoration:none;' href='userHome.php'>
						Home
					</a>
				</li>
				<li style='float:left;'>
					<a style='padding:14px 16px; display:block; color:white; text-align:center; text-decoration:none;' href='userTypeOfRoom.php'>
						Types Of Room
					</a>
				</li>
				<li style='float:left;'>
					<a style='padding:14px 16px; display:block; color:white; text-align:center; text-decoration:none;' href='userSpecialService.php'>
						Special Services
					</a>
				</li>
				<li style='float:left;'>
					<a style='padding:14px 16px; display:block; color:white; text-align:center; text-decoration:none;' href='userBookNow.php'>
						Book Now
					</a>
				</li>
				<li style='float:left;'>
					<a style='padding:14px 16px; display:block; color:white; text-align:center; text-decoration:none;' href='userReviewReservation.php'>
						Review Reservation
					</a>
				</li>
				<li style='float:right;'>
					<a style='padding-top:14px; padding-right:48px; display:block; color:white; text-align:center; text-decoration:none;' href='userContactUs.php'>
						Contact Us
					</a>
				</li>
				<li style='float:right;'>
					<a style='padding-top:14px; padding-right:48px; display:block; color:white; text-align:center; text-decoration:none;' href='userLogOut.php'>
						Log Out
					</a>
				</li>
			</ul>
		</div>
		<div style='margin-top:150px; margin-left:150px; position:absolute; background-color:pink; width:1075px; min-height:475px;'>
			<h2 style='padding-left:50px;'>
				Check Availability Result
			</h2>
			<?php
				$startDate=$_POST['startDate'];
				$endDate=$_POST['endDate'];
				$i=1;
				
				$connect=mysql_connect('localhost','root','Yang94');
				mysql_select_db('hotel',$connect);
				
				$query="SELECT * FROM typeOfRoom WHERE roomNumber NOT IN(SELECT roomNumber FROM reservation WHERE(startDate<='$startDate' AND endDate>='$startDate') OR(startDate<='$endDate' AND endDate>='$endDate') OR(startDate>='$startDate' AND endDate<='$endDate'))";
				mysql_query($query,$connect);	//STRANGE!!!
				$result=mysql_query($query,$connect);
				
				echo
				'
					<table style="margin-left:50px; width:975px; border:1px solid black; border-collapse:collapse;">
						<tr style="border:1px solid black;">
							<td style="width:50px; border:1px solid black;">
								No.
							</td>
							<td style="border:1px solid black;">
								Room Number
							</td>
							<td style="border:1px solid black;">
								Title
							</td>
							<td style="border:1px solid black;">
								Price
							</td>
							<td style="border:1px solid black;">
								Action
							</td>
						</tr>
				';
				while($row=mysql_fetch_array($result))
				{
					echo
					'
						<tr>
							<td style="border:1px solid black;">
								'.$i++.'
							</td>
							<td style="border:1px solid black;">
								'.$row['roomNumber'].'
							</td>
							<td style="border:1px solid black;">
								'.$row['title'].'
							</td>
							<td style="border:1px solid black;">
								RM'.$row['price'].'
							</td>
							<td style="border:1px solid black;">
								<button type="button">
									<a style="color:black; text-decoration:none;" href="userReservationCondition.php?roomNumber='.$row["roomNumber"].'&title='.$row["title"].'&price='.$row["price"].'&startDate='.$startDate.'&endDate='.$endDate.'">
										Book Now
									</a>
								</button>
							</td>
						</tr>
					';
				}
				
				echo
				'
					</table>
				';
			?>
		</div>
	</body>
</html>