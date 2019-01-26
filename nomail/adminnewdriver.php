<?php
error_reporting(E_ALL);
mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");

if(isset($_POST['submit']))
{
	$lno= $_POST['dlno'];	
	$uidno= $_POST['uid'];
	$fname= $_POST['fname'];
	$lname= $_POST['lname'];
	$pass= $_POST['pass'];
	$cpass= $_POST['cpass'];
	$dob= $_POST['dob'];
	$sex= $_POST['sex'];	
	$mono= $_POST['mono'];
	$email= $_POST['email'];
	$padd= $_POST['address'];	
	$pin= $_POST['pin'];
	$city= $_POST['city'];
	$state= $_POST['state'];	
	$country= $_POST['country'];
    if(strcmp($pass, $cpass)!=0)
				{
					$msg= "Password Do Not Match!";
		       }
				else if(strlen($mono)!=10)
				{
					$msg="Enter 10 digit mobile number!";
				}
				else
				{
	if(mysql_query("insert into driver( LicenceNumber,Uid,Fname,Lname,Pass,Cpass,Dob,Sex,Mobile,Email,Address,Pin,City,State,Country) values ('$lno',
'$uidno','$fname','$lname','$pass','$cpass','$dob','$sex','$mono','$email','$padd','$pin','$city','$state','$country')"))
	header("Location:registersuccess.php");
				}
}

?> 



<html>
	<head>
		<title>New User</title>
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
				<table align="center" cellpadding=5 cellspacing=5>
					<form action="" method="post">
					</tr>	
					<tr><td>
					<p align="center" style="color:red">
						<?php
						if(isset($msg))
							echo $msg;
						?>
						</p></td>
						</tr>
					
					<tr>
						<td>Driver's License No.<font color="red">*</font></td>
						<td><input class="text" type="text" name="dlno" required></td>
					</tr>
					<tr>
						<td>UID No.</td>
						<td><input class="text" type="text" name="uid" placeholder="12-digit Aadhar No."></td>
					</tr>
					<tr>
						<td>First Name<font color="red">*</font></td>
						<td><input class="text" type="text" name="fname" required></td>
					</tr>
					<tr>
						<td>Last Name<font color="red">*</font></td>
						<td><input class="text" type="text" name="lname" required></td>
					</tr>
					<tr>
						<td>Email ID<font color="red">*</font></td>
						<td><input class="text" type="email" name="email" placeholder="abc@example.com" required></td>
					</tr>
					<tr>
						<td>Enter Password<font color="red">*</font></td>
						<td><input class="text" type="password" name="pass" required></td>
					</tr>
					
					<tr>
						<td>Confirm Password<font color="red">*</font></td>
						<td><input class="text" type="password" name="cpass" required></td>
					</tr>
					
					<tr>
						<td>Date of Birth<font color="red">*</font></td>
						<td><input class="text" type="date" name="dob" required></td>
					</tr>
					<tr>
						<td>Sex<font color="red">*</font></td>
						<td>
							<select name="sex" style="width:100px; height:30px;">
								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Mobile No.</td>
						<td><input class="text" type="text" name="mono" placeholder="10-digits"></td>
					</tr>
				
					<tr>
						<td>Permanent Address<font color="red">*</font></td>
						<td><textarea name="address" rows=3 cols=33 required></textarea></td>
					</tr>
					<tr>
						<td>PIN Code<font color="red">*</font></td>
						<td><input class="text" type="text" name="pin" placeholder="6-digits" required></td>
					</tr>
					<tr>
						<td>City<font color="red">*</font></td>
						<td><input class="text" type="text" name="city" required></td>
					</tr>
					<tr>
						<td>State<font color="red">*</font></td>
						<td><input class="text" type="text" name="state" required></td>
					</tr>
					<tr>
						<td>Country</td>
						<td><input class="text" type="text" name="country" value="INDIA" readonly></td>
					</tr>
					
			
					<tr align="center" height=100>
						<td align="right"><input class="button1" type="submit" name="submit"></td>
						<td align="left"><input class="button1" type="reset" name="reset"></td>
					</tr>	
					</form>
				</table>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>