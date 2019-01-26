<?php
mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");

if(isset($_POST['login']))
{
 $username=$_POST['adminid'];
 $password=$_POST['pass'];
 
$result=mysql_query("select * from admin where username='$username' and password='$password'");
$row=mysql_fetch_array($result);

if($row['username']==$username && $row['password']==$password)
{
	header("Location:adminpage.php");
	
}
else
{
	echo "You are not a valid user";
}
}

?>

<html>
	<head>
		<title>Admin Login</title>
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
					<h2>Admin Login</h2>
					<input class="text" type="text" name="adminid" placeholder="Admin ID"><br><br>
					<input class="text" type="password" name="pass" placeholder="Password"><br><br>
					<input class="button1" type="submit" name="login" value="Login"> &nbsp
					<input class="button1" type="reset" name="reset" value="Reset"><br>
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