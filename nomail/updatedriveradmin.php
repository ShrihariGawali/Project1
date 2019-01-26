<?php
error_reporting(E_PARSE);
$conn = new MongoClient();     //connect to the server;
$db = $conn->dmv;              //select database;
$collection = $db->driver;    //create collection driver;
$cursor = $collection->find();
session_start();

foreach($cursor as $result)
	{
		$adminid= $result['License_No'];
		if($adminid == $_SESSION['dlno'])
		{
			$dlno = $result['License_No'];
			$uno = $result['UID_No'];
			$fname = $result['First_Name'];
			$lname = $result['Last_Name'];		
			$password = $result['Password'];
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
				
				$lno= $_POST['dlno'];	
				$uidno= $_POST['uid'];
				$Fname= $_POST['fname'];
				$Lname= $_POST['lname'];
				$passw= $_POST['pass'];
				$Dob= $_POST['dob'];
				$Sex= $_POST['sex'];	
				$Mono= $_POST['mono'];
				$Email= $_POST['email'];
				$Padd= $_POST['address'];	
				$Pin= $_POST['pin'];
				$City= $_POST['city'];
				$State= $_POST['state'];	
				$Country= $_POST['country'];
				$File=$_POST['file'];
			
			
			$update_doc = array(
								"License_No"=> $lno,
								"UID_No"=> $uidno,
								"First_Name"=> $Fname,
								"Last_Name"=> $Lname,
								"Email_ID"=> $Email,
								"Password"=> $passw,
								"Date_Of_Birth"=> $Dob,
								"Sex"=> $Sex,
								"Mobile_Number"=> $Mono, 
								"Permanent_Address"=> $Padd,
								"PIN_Code"=> $Pin,
								"City"=> $City,
								"State"=> $State,
								"Country"=> $Country,
								"Violation_Code"=>$Vcode,
								"Police_ID"=>$Pid,
								"Photo"=>$File
						  );
					  
				$collection -> update (array('License_No'=>$_SESSION['dlno']), array('$set'=>$update_doc) );
				header("Location:updatesuccessdriver.php");
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
					<h3><p align="center" style="color:red">
						<?php
						if(isset($msg))
							echo $msg;
						?>
						</p></h3></td>
						</tr>			
					<tr>
						<td>Driver's License No.</td>
						<td><input class="text_readonly" type="text" name="dlno" value="<?php echo $dlno ?>" readonly></td>
					</tr>
					<tr>
						<td>UID No.</td>
						<td><input class="text_readonly" type="text" name="uid" value="<?php echo $uno ?>" readonly></td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><input class="text" type="text" name="fname" value="<?php echo $fname ?>" required="required"></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input class="text" type="text" name="lname" value="<?php echo $lname ?>" required="required"></td>
					</tr>
					<tr>
						<td>Email ID</td>
						<td><input class="text" type="email" name="email" value="<?php echo $email ?>" required="required"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input class="text" type="text" name="pass" value="<?php echo $password ?>" required></td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><input class="text" type="date" name="dob"value="<?php echo $dob ?>" required="required"></td>
					</tr>
					<tr>
						<td>Sex</td>
						<td><input type="text" name="sex" class="text_readonly" value="<?php echo $sex ?>" readonly></td>
					</tr>
					<tr>
						<td>Mobile No.</td>
						<td><input class="text" type="number" name="mono" value="<?php echo $mono ?>"></td>
					</tr>
				
					<tr>
						<td>Permanent Address</td>
						<td><input class="text" type="text" name="address" rows=5 cols=38 value="<?php echo $padd ?>" required="required"></textarea></td>
					</tr>
					<tr>
						<td>PIN Code</td>
						<td><input class="text" type="number" name="pin" value="<?php echo $pin ?>" required="required"></td>
					</tr>
					<tr>
						<td>City</td>
						<td><input class="text" type="text" name="city" value="<?php echo $city ?>" required="required"></td>
					</tr>
					<tr>
						<td>State</td>
						<td><input class="text" type="text" name="state" value="<?php echo $state ?>" required="required"></td>
					</tr>
					<tr>
						<td>Country</td>
						<td><input class="text_readonly" type="text" name="country" value="INDIA" readonly></td>
					</tr>
					<tr>
						<td>Photo</td>
						<td><input type="file" name="file" id="file" value="<?php echo $file ?>"></td>
					 </tr>
									

					</form>
				</table>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>