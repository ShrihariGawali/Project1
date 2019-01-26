<html>
	<head>
		<title>DMV - Home</title>
		<link rel="stylesheet" type="text/css" href="css/maincss.css">
		<style>			
			#slider
			{
				width: 710px;

			}
			@keyframes slidy
			{
				0% { left: 0%; }
				20% { left: 0%; }
				25% { left: -100%; }
				45% { left: -100%; }
				50% { left: -200%; }
				70% { left: -200%; }
				75% { left: -300%; }
				95% { left: -300%; }
				100% { left: -400%; }
			}
			div#slider { overflow: hidden; }
			div#slider figure img { width: 20%; }
			div#slider figure
			{ 
				position: relative;
				width: 500%;
				margin: 0;
				left: 0;
				text-align: left;
				font-size: 0;
				animation: 8s slidy infinite; 
			}
		</style>
		
	</head>
	
	<body>
		<div id="box">
			<div id="header">
			</div>
			<div id="navbar">
				<?php include("css/navbar.css") ?>
			</div>
			<div id="sidebar">			
				<?php include("css/sidebar.css") ?>
			</div>
			<div id="main">
				<marquee>The Indian Motor Vehicle Acte, 1932 <a href="docs/motoract.htm">(Click here to read more)</a></marquee>
				<div id="slider">
					<figure>
						<img src="i1.jpg" height=350px width=200px>
						<img src="i2.jpg" height=350px width=200px>
						<img src="i3.jpg" height=350px width=200px>
						<img src="i4.jpg" height=350px width=200px>
					</figure>
				</div>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>