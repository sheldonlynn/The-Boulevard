<?php
	include '../forum/functions.php';
	require_once('../forum/config.php');
	session_start();

	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect, error: ".mysql_error());
	mysql_select_db(DB_DATABASE)or die("cannot select DB, error: ".mysql_error());
	$tbl_name="topic"; // Table name
?>

<!doctype html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<title>View Topic</title>
	<link rel="stylesheet" type="text/css" href="../style/base.css">
	<link rel="stylesheet" type="text/css" href="../style/topic.css">
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="main-container">
		<nav class="nav-container">
			<div class="spacer"></div>
			<div id="logo-link">
				<a href="../html/index.php"><img id="logo" src="../images/logo.png" width="100" height="165" alt="logo"></a>
				<div id="nav-links">
					<ul>
						<li><a href="../html/index.php">Home</a></li>
						<li><a href="../html/about.php">About</a></li>
						<li><a href="../html/menu.php">Menu</a></li>
						<li><a href="../html/gallery.php">Art</a></li>
						<li><a href="../html/contact.php">Contact</a></li>
					</ul>
				</div>
			</div>
			<div class="spacer"></div>
			<div id="login">
				<ul>
				<?php
					$name = $_SESSION['SESS_FIRST_NAME'];
					if (isLoggedIn()){
						echo '<li class="welcome">Welcome, '.$name.'!</li>';
						echo '<li><a href="../forum/logout.php">Logout</a></li>';
						echo '<li><a href="../forum/forum.php">Go to forum</a></li>';
						echo '<li><a href="../forum/add_topic_form.php">Create topic</a></li>';
					} else {
						echo '<li><a href="../forum/login_form.php">Login</a></li>';
						echo '<li><a href="../forum/register_form.php">Sign Up</a></li>';
					}
				?>
				</ul>
			</div>
			<div id="social-links">
				<a href="https://www.facebook.com/BoulevardCoffeeRoasting" target="_blank"><img src="../images/fb.png" height="30" width="30" alt="facebook"></a>
				<a href="https://twitter.com/blvdroastingco" target="_blank"><img src="../images/twitter.png" height="30" width="30" alt="twitter"></a>
				<a href="https://www.instagram.com/explore/locations/236693420/" target="_blank"><img src="../images/insta.png" height="30" width="30" alt="instagram"></a>
			</div>
		</nav>
				
		<div class="content-container">
			<div class="content">
				<main>
					<h2>View Topic</h2>
					<?php						
						// get value of id that sent from address bar
						$id=$_GET['id'];

						$sql="SELECT * FROM $tbl_name JOIN members ON members.member_id = topic.member_id AND id='$id'";
						$result=mysql_query($sql);

						$rows=mysql_fetch_array($result);
					?>
					<div id="topic">
						<table class="view">
							<tr>
								<td><table>
									<tr>
										<td class="bold"><?php echo $rows['topic']; ?></td>
									</tr>

									<tr>
										<td><?php echo $rows['detail']; ?></td>
									</tr>

									<tr>
										<td><span class="bold">By :</span> <?php echo $rows['firstname'].' '.$rows['lastname']; ?></td>
									</tr>

									<tr>
										<td><span class="bold">Date/time :</span> <?php echo $rows['datetime']; ?></td>
									</tr>
							</table></td>
							</tr>
						</table>
						
						<?php
							$tbl_name2="response"; // Switch to table "response"

							$sql2="SELECT * FROM $tbl_name2 JOIN members ON members.member_id = response.member_id AND topic_id='$id'";
							$result2=mysql_query($sql2);

							while($rows=mysql_fetch_array($result2)){
						?>
						<table class="view">
							<tr>
								<td><table>
									<tr>
										<td class="bold">ID</td>
										<td class="bold">:</td>
										<td><?php echo $rows['id']; ?></td>
									</tr>
									<tr>
										<td class="bold">Name</td>
										<td class="bold">:</td>
										<td><?php echo $rows['firstname'].' '.$rows['lastname']; ?></td>
									</tr>
									<tr>
										<td class="bold">Response</td>
										<td class="bold">:</td>
										<td><?php echo $rows['response']; ?></td>
									</tr>
									<tr>
										<td class="bold">Date/Time</td>
										<td class="bold">:</td>
										<td><?php echo $rows['datetime']; ?></td>
									</tr>
								</table></td>
							</tr>
						</table>

						<?php
						}
						mysql_close();
						?>
					</div>
					<?php
						if(isLoggedIn()) {
							echo '<div id="respond">
								<table>
									<tr>
										<form name="form1" method="post" action="add_response.php">
											<td>
												<table>
													<tr>
														<td class="bold">Response:</td>
														<td>&nbsp;</td>
													</tr>
													<tr>
														<td><textarea name="response" cols="40" rows="3" id="answer"></textarea></td>
														<td>&nbsp;</td>
													</tr>
													<tr>
														<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
														<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
													</tr>
												</table>
											</td>
										</form>
									</tr>
								</table>
							</div>';
						}
						else {
							echo '<div id="responderr">You must be logged in to respond.</div>';
						}
					?>
				</main>
			
				<footer>
					<div id="contact">
						<div id="mobile-social">
							<a href="https://www.facebook.com/BoulevardCoffeeRoasting" target="_blank"><img src="../images/mobilefb.png" height="30" width="30" alt="facebook"></a>
							<a href="https://twitter.com/blvdroastingco" target="_blank"><img src="../images/mobiletwitter.png" height="30" width="30" alt="twitter"></a>
							<a href="https://www.instagram.com/explore/locations/236693420/" target="_blank"><img src="../images/mobileinsta.png" height="30" width="30" alt="instagram"></a>
						</div>
						<div id="address">
							<p>The Boulevard Coffee Roasting Co.</p>
							<p>5970 University Boulevard</p>
							<p>Vancouver, British Columbia</p>
							<p>Canada V6T 1Z3</p>
							<p>Telephone: 604.827.4488</p>
							<p>Email: info@theboulevard.ca</p>
						</div>
						<div id="sitemap-link">
							<br>
							<p><a href="../html/sitemap.php">Site Map</a></p>
						</div>
					</div>
					
					<div id="hours">
						<table>
							<tr>
								<td>Monday</td>
								<td>7am - 7pm</td>
								<td>Friday</td>
								<td>7am - 7pm</td>
							</tr>
							<tr>
								<td>Tuesday</td>
								<td>7am - 7pm</td>
								<td>Saturday</td>
								<td>7am - 7pm</td>
							</tr>
							<tr>
								<td>Wednesday</td>
								<td>7am - 7pm</td>
								<td>Sunday</td>
								<td>8am - 6pm</td>
							</tr>
							<tr>
								<td>Thursday</td>
								<td>7am - 7pm</td>
								<td></td><td></td>
							</tr>
						</table>
					</div>
					
					<div id="mobile-hours">
						<table>
							<tr>
								<td>Monday</td>
								<td>7am - 7pm</td>
							</tr>
							<tr>
								<td>Tuesday</td>
								<td>7am - 7pm</td>
							</tr>
							<tr>
								<td>Wednesday</td>
								<td>7am - 7pm</td>
							</tr>
							<tr>
								<td>Thursday</td>
								<td>7am - 7pm</td>
							</tr>
							<tr>
								<td>Friday</td>
								<td>7am - 7pm</td>
							</tr>
							<tr>
								<td>Saturday</td>
								<td>7am - 7pm</td>
							</tr>
							<tr>
								<td>Sunday</td>
								<td>8am - 6pm</td>
							</tr>
						</table>
					</div>
				
					<div id="sitemap">
						<table>
							<tr>
								<td><a href="../html/index.php">Home</a></td>
								<td><a href="../html/gallery.php">Art</a></td>
							</tr>
							<tr>
								<td><a href="../html/about.php">About</a></td>
								<td><a href="../html/contact.php">Contact</a></td>
							</tr>
							<tr>
								<td><a href="../html/menu.php">Menu</a></td>
								<td><a href="../html/sitemap.php">Site Map</a></td>
							</tr>
						</table>
					</div>
				</footer>
			</div>
		</div>
	</div>
</body>
</html>