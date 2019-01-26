<?php

mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");

foreach($cursor as $result)
  {
	 $adminid = $result['License_No'];
	  
  if(isset($_POST['check']))
  {
    $id = $_POST['dlno'];	
  	  
 
  if($adminid == $id)
     {
		session_start();
		$_SESSION['dlno']=$_POST['dlno'];
	  header("Location:updatedriveradmin.php");
    }
	else
	{
		$msg="Driver Not Found.";
	}
  }
  }
  
?>



<html>
	<head>
		<title>Enter DLNO</title>
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
					Enter License Number: <input class="text" type="text" name="dlno"><br><br>
					<input class="button1" type="submit" name="check" value="Proceed">
				   <p style="color:red;">
				   <?php
				     if(isset($msg))
						 echo $msg;
					 ?>
					 </p>
				</form>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>