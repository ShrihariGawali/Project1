<?php


mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");

if(isset($_POST['check']))
{
 $id=$_POST['dlno'];
 
 
$result=mysql_query("select * from traffic where Id=$id");
$row=mysql_fetch_array($result);

if($row['Id']==$id)
{
	    session_start();
		$_SESSION['id']=$_POST['dlno'];
	header("Location:policedetailadmin.php");
	
}
else
{
	echo "You are not a valid police";
}
}	  

?>



<html>
	<head>
		<title>Check Police Detail</title>
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
					
				<p style="color:red;">
				   <?php
				     if(isset($msg))
						 echo $msg;
					 ?>
					 </p>
				</form><br><br>
				
				<?php	
					echo "<table align=center border=1 width=700px  class=table-fill>";
					echo "<tr><th>"."Police ID"."</th><th>"."Name"."</th><th>"."Lname"."</th></tr>";	
				$result=mysql_query("select * from traffic");
				     while($row=mysql_fetch_array($result))
					{
						echo "<tr align=center><td>".$row['Id']."</td><td>".$row['Fname']."</td><td>".$row['Lname']."</td></tr>";	
					}
					echo "</table><br><br>";
					
					echo "</table>";
					echo "<br><br>";
				/*		
					echo "<table align=center width=300 class=total>";
					echo "<tr>";
					echo "<th>Total registered officers</th>";
					echo "<td></td>";
				//	echo "<th>".count($policecount)."</th>";
					echo "</tr>";
					echo "</table>";*/
               ?>		

				
				
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>