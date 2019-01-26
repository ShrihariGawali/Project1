<?php
    mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");


  if(isset($_POST['delete']))
	{
		$dlno = $_POST['LicenceNumber'];
		
	    if(mysql_query("delete from driver where LicenceNumber= $dlno"))
		{
		
	     header("Location:deletesuccessdriver.php");
		}
		else
		{
			$msg = "Driver not available";
		}
	}
?>


<html>
	<head>
		<title>Delete Driver</title>
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
				<form align="center" action="" method="post">
					Enter Licence Number: <input class="text" type="text" name="LicenceNumber"><br><br>
					<input class="button1" type="submit" name="delete" value="Delete"><br><br>
					<p style="color:red; font-size:30;"><?php 
						if(isset($msg))
							echo $msg;
					?></p>
				</form>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>