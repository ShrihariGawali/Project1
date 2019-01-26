<?php

mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");

if(isset($_POST['login']))
{
 $id=$_POST['dlno'];
 $passd=$_POST['pass'];
 
$result=mysql_query("select * from traffic where Id='$id' and Pass='$passd'");
$row=mysql_fetch_array($result);

if($row['Id']==$id && $row['Pass']==$passd)
{
	  session_start();
		$_SESSION['id']=$_POST['dlno'];
	header("Location:trafficpolicepage.php");
	
}
else
{
	echo "You are not a valid user";
}
}
  
?>



<html>
	<head>
		<title>Traffic Police Login</title>
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
				<form align="center" action="" method="post">
				<h2 align="center">Traffic Police Login</h2>
					<input class="text" type="text" name="dlno" placeholder="RTO ID"><br><br>
					<input class="text" type="password" name="pass" placeholder="Password"><br><br>
					<input class="button1" type="submit" name="login" value="Login"> &nbsp
					<input class="button1" type="reset" name="reset" value="Reset">
				 <h3><p style="color:red">
						<?php
						if(isset($msg))
							echo $msg;
						?>
						</p></h3>
				
				</form>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>