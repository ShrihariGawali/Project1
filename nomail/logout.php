<?php
session_start();
session_destroy();
?>

<html>
	<head>
		<title>Logged Out</title>
		<link rel="stylesheet" type="text/css" href="css/maincss.css">
	</head>
	
	<body>
		<div id="box">
			<div id="header">
			</div>
			<div id="navbar">
				<?php include("css/navbar.css") ?>
			</div>
			<div id="sidebar">
			</div>
			<div id="main">
				<h3 align="center">You have been logged out.</h3>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>