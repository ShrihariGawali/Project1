<?php
mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");

	if(isset($_POST['delete']))
	{
		$dlno = $_POST['Id'];
		
	    if(mysql_query("delete from traffic where Id= $dlno"))
		{
		
	     header("Location:deletesuccesspolice.php");
		}
		else
		{
			$msg = "traffic police not available";
		}
	}
  
?>



<html>
	<head>
		<title>Delete Police</title>
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
					Enter Police ID: <input class="text" type="text" name="Id"><br><br>
					<input class="button1"type="submit" name="delete" value="Delete">
				</form>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>