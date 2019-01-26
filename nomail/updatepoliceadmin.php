<?php
error_reporting(E_PARSE);
$conn = new MongoClient();     //connect to the server;
$db = $conn->dmv;              //select database;
$collection = $db->police;    //create collection driver;
$cursor = $collection->find();
session_start();

foreach($cursor as $result)
	{
		$adminid= $result['Police_ID'];
		if($adminid == $_SESSION['dlno'])
		{
			$pid = $result['Police_ID'];
			$uno = $result['UID_No'];
			$fname = $result['First_Name'];
			$lname = $result['Last_Name'];		
			$pass= $result['Password'];
			$email = $result['Email_ID'];
			$dob = $result['Date_Of_Birth'];
			$sex = $result['Sex'];
			$mono = $result['Mobile_Number'];
			$padd = $result['Permanent_Address'];
			$pin = $result['PIN_Code'];
			$city = $result['City'];
			$state = $result['State'];
			$file = $result['Photo'];
		}

			if(isset($_POST['update']))
				{
					
				$id= $_POST['id'];
				$uid= $_POST['uid'];
				$fname= $_POST['fname'];
				$lname= $_POST['lname'];
				$passw= $_POST['pass'];
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
				$file=$_POST['file'];

				$update_doc= array(
								"Police_ID"=> $id,
								"UID_No"=> $uid,
								"First_Name"=> $fname,
								"Last_Name"=> $lname,
								"Email_ID"=> $email,
								"Password"=> $passw,
								"Date_Of_Birth"=> $dob,
								"Sex"=> $sex,
								"Mobile_Number"=> $mono, 
								"Permanent_Address"=> $padd,
								"PIN_Code"=> $pin,
								"City"=> $city,
								"State"=> $state,
								"Country"=> $country,
								"Photo"=>$file
								
						  );
					  
				$collection -> update (array('Police_ID'=>$_SESSION['dlno']), array('$set'=>$update_doc) );
				header("Location:updatesuccesspolice.php");
			}
	}			
?> 




<html>
	<head>
		<title>Update Police</title>
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
						<td>Police ID</td>
						<td><input class="text_readonly" type="text" name="id" value="<?php echo $pid ?>" readonly></td>
					</tr>
					<tr>
						<td>UID No.</td>
						<td><input class="text_readonly" type="text" name="uid" value="<?php echo $uno ?>" readonly></td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><input class="text" type="text" name="fname" value="<?php echo $fname ?>" required></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input class="text" type="text" name="lname" value="<?php echo $lname ?>" required></td>
					</tr>
					<tr>
						<td>Email ID</td>
						<td><input class="text" type="email" name="email" value="<?php echo $email ?>" required></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input class="text" type="text" name="pass" value="<?php echo $pass ?>" required></td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><input class="text" type="date" name="dob" value="<?php echo $dob ?>" required></td>
					</tr>
					<tr>
						<td>Sex</td>
						<td><input type="text" name="sex" class="text_readonly" value="<?php echo $sex ?>" readonly></td>
					</tr>
					<tr>
						<td>Mobile No.</td>
						<td><input class="text" type="text" name="mono" value="<?php echo $mono ?>" required></td>
					</tr>
				
					<tr>
						<td>Permanent Address</td>
						<td><input class="text" type="text" name="address" rows=5 cols=38 value="<?php echo $padd ?>" required></textarea></td>
					</tr>
					<tr>
						<td>PIN Code</td>
						<td><input class="text" type="number" name="pin" value="<?php echo $pin ?>" required></td>
					</tr>
					<tr>
						<td>City</td>
						<td><input class="text" type="text" name="city" value="<?php echo $city ?>" required></td>
					</tr>
					<tr>
						<td>State</td>
						<td><input class="text" type="text" name="state" value="<?php echo $state ?>" required></td>
					</tr>
					<tr>
						<td>Country</td>
						<td><input class="text_readonly" type="text" name="country" value="INDIA" readonly></td>
					</tr>
					<tr>
						<td>Photo</td>
						<td><input type="file" name="file" id="file" value="<?php echo $file ?>"></td>
					 </tr>
									
					<tr align="center">
						<td align="right"><input class="button1" type="submit" name="update" value="Update"></td>
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