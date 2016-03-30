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
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../style/base.css">
	<link rel="stylesheet" type="text/css" href="../style/login.css">
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
					<h2>Login</h2>
					<?php
						if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
							echo '<ul class="err">';
							foreach($_SESSION['ERRMSG_ARR'] as $msg) {
								echo '<li>',$msg,'</li>'; 
							}
							echo '</ul>';
							unset($_SESSION['ERRMSG_ARR']);
						}
					?>
					<div id="login-sect">
						<form id="loginForm" name="loginForm" method="post" action="login.php">
							<table id="sign-in">
								<tr>
									<td class="header">Login</td>
									<td><input name="login" type="text" class="textfield" id="log-in" /></td>
								</tr>
								<tr>
									<td class="header">Password</td>
									<td><input name="password" type="password" class="textfield" id="password" /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><input type="submit" name="Submit" value="Login" /></td>
								</tr>
							</table>
						</form>
					</div>
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

