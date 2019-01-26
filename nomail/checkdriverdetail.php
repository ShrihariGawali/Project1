<?php

mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");

if(isset($_POST['check']))
{
 $lno=$_POST['dlno'];
 
 
$result=mysql_query("select * from driver where LicenceNumber=$lno");
$row=mysql_fetch_array($result);

if($row['LicenceNumber']==$lno)
{
	    session_start();
		$_SESSION['lno']=$_POST['dlno'];
	header("Location:driverdetailadmin.php");
	
}
else
{
	echo "You are not a valid user";
}
}	  
 /* if(isset($_POST['check']))
  {
    $id = $_POST['dlno'];	
  	  
  session_start();
		$_SESSION['lno']=$id;
  if($adminid == $id)
    {
		session_start();
		$_SESSION['dlno']=$_POST['dlno'];
		header("Location:driverdetailadmin.php");
    }
	else
	{
		$msg="Driver Detail Not Available.";
	}
  
  }*/
  
?>


<html>
	<head>
		<title>Check Driver Details</title>
		<link rel="stylesheet" type="text/css" href="css/maincss.css">
		<link rel="stylesheet" type="text/css" href="css/tablestyle.css">
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
					<input class="button1"type="submit" name="check" value="Check">
				   <p style="color:red;">
				   <?php
				     if(isset($msg))
						 echo $msg;
					 ?>
					 </p>
				</form><br><br>
			
				<?php	
					echo "<table align=center border=1 width=700px  class=table-fill>";
					echo "<tr><th>"."License Number"."</th><th>"."Name"."</th></tr>";
                    //$lno=$_POST['dlno'];					
					//$result=mysql_query("select * from driver where LicenceNumber=$lno");
					$result=mysql_query("select * from driver");
				     while($row=mysql_fetch_array($result))
					{
					
						echo "<tr align=center><td>".$row['LicenceNumber']."</td><td>".$row['Fname']."&nbsp".$row['Lname']."</td></tr>";	
					}
					echo "</table><br><br>";
				/*
					echo "</table>";
					echo "<br><br>";
					
					echo "<table align=center width=300 class=total>";
					echo "<tr>";
					echo "<th>Total registered drivers</th>";
					echo "<td></td>";
					//$drivercount;
					echo "<th>".count($drivercount)."</th>";
					echo "</tr>";
					echo "</table>";*/
				?>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>