<?php
	session_start();
	$email=$_SESSION['email'];
?>

<html>
	<head>
		<title>Registration Successful</title>
		<link rel="stylesheet" type="text/css" href="css/maincss.css">
	</head>
	
	<body>
		<div id="box">
			<div id="header">
			</div>
			<div id="navbar">
				<?php include("css/navbarlogout.css") ?>
			</div>
			<div id="sidebar">
				<?php include("css/sidebaradmin.css") ?>
			</div>
			<div id="main">
				<h3 align="center">Registration Successful. A confirmation mail has been sent to: <?php echo $email; ?></h3>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>