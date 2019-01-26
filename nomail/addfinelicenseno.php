<?php

error_reporting(E_PARSE);

mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");          

$result=mysql_query("select * from driver");
while($row=mysql_fetch_array($result))
{

	 $adminid = $row['LicenceNumber'];
	  
  if(isset($_POST['check']))
  {
    $id = $_POST['dlno'];	
  	  
  if($adminid == $id)
     {
		session_start();
		$_SESSION['dlnod']=$_POST['dlno'];
	 header("Location:policefineform.php");
    }
	else
	{
		$msg="Driver Detail Not Available.";
	}
  }
  }
  
?>



<html>
	<head>
		<title>Enter License No</title>
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
				<?php include("css/sidebartraffic.css") ?>
			</div>
			<div id="main">
				<form align="center" action="" method="post">
					Enter License Number: <input class="text" type="text" name="dlno"><br><br>
					<input class="button1"type="submit" name="check" value="Check">
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