<?php

error_reporting(E_ALL);
mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");

	if(isset($_POST['submit']))
	{
		$id= $_POST['id'];
		$uid= $_POST['uid'];
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$designation= $_POST['designation'];
		$pass= $_POST['pass'];
		$cpass= $_POST['cpass'];
		$dob= $_POST['dob'];
		$gender= $_POST['gender'];	
		$mono= $_POST['mono'];
		$email= $_POST['email'];
		$padd= $_POST['address'];	
		$pin= $_POST['pin'];
		$city= $_POST['city'];
	    $state= $_POST['state'];	
		$country= $_POST['country'];
		if(strcmp($pass, $cpass)!=0)
		{
			$msg= "Password Do Not Match !!!!";
		}
		else if(strlen($mono)!=10)
		{
			$msg="Enter 10 digit mobile number!";
		}
		else
		{

		
		
		if(mysql_query("insert into traffic( Id,Uid,Fname,Lname,Designation,Pass,Cpass,Dob,Gender,Mobile,Email,Address,Pin,City,State,Country) values ('$id',
'$uid','$fname','$lname','$designation','$pass','$cpass','$dob','$gender','$mono','$email','$padd','$pin','$city','$state','$country')"))
		header("Location:registersuccess.php");
				}
  
		}
	
?> 




<html>
	<head>
		<title>New Police</title>
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
					<h3><p align="center" style="color:red">
						<?php
						if(isset($msg))
							echo $msg;
						?>
						</p></h3></td>
						</tr>
					<tr>
						<td>Police ID<font color="red">*</font></td>
						<td><input class="text" type="text" name="id" required></td>
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
						<td>Designation<font color="red">*</font></td>
						<td>
							<select name="designation" class="text">
								<option value="Commissioner of Police">Commissioner of Police (CP)</option>
								<option value="Special Commissioner of Police">Special Commissioner of Police (SCP)</option>
								<option value="Joint Commissioner of Police">Joint Commissioner of Police (JCP)</option>
								<option value="Deputy Commissioner of Police">Deputy Commissioner of Police (DCP)</option>
								<option value="Assistant Commissioner of Police">Assistant Commissioner of Police (ACP)</option>
								<option value="Inspector">Inspector</option>
								<option value="Sub Inspector">Sub Inspector</option>
								<option value="Assistant Sub Inspector">Assistant Sub Inspector</option>
								<option value="Head Constable">Head Constable</option>
								<option value="Constable">Constable</option>
							</select>
						</td>
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
						<td>Gender<font color="red">*</font></td>
						<td>
							<select name="Gender" style="width:100px; height:30px;">
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