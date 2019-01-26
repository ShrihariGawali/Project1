<?php

error_reporting(E_PARSE);

mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");

	session_start();
$dlno= $_SESSION['dlnod'];

$result=mysql_query("(select * from driver where LicenceNumber= $dlno)");

while($row=mysql_fetch_array($result))
{
	
	if($row['LicenceNumber']==$dlno)
	{
		$lno = $row['LicenceNumber'];
		$fname= $row['Fname'];
		$mono = $row['Mobile'];
		$lname = $row['Lname'];
		$uno = $row['Uid'];
		$email = $row['Email'];
		$address = $row['Address'];
		$city = $row['City'];
		$dob = $row['Dob'];
		$pin = $row['Pin'];
		$state = $row['State'];
		
	}
}
	
	$police_id=$_SESSION['dlno'];
	$result=mysql_query("(select * from totalpoint)");
	
	while($row=mysql_fetch_array($result))      //To find previous point of driver
	{
		$lno= $result['License_No'];
		if($_SESSION['dlnod'] == $lno)
		{
			$prevpoint = $result['Point'];
		}
	}

	$result=mysql_query("(select * from fine)");
	
	while($row=mysql_fetch_array($result))
	{	$lno= $result['License_No'];
		if($_SESSION['dlnod'] == $lno)
		{
			$dprevfine = $result['Totalfine'];
		}
	}
	
if($prevpoint>19)
{
	$msg="Licence Suspended!";
}else
{/*	
mysql_query("insert into driver( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");
	mysql_query("insert into fine( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");
	mysql_query("insert into violationtype( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");
    mysql_query("insert into policefine( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");
	mysql_query("insert into policefinelist( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");
	mysql_query("insert into totalpoint( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");*/
//header("Location:finepaid.php");
	
	}
	
if(isset($_POST['submit']))
{
$result=mysql_query("(select * from totalpoint)");
	
	while($row=mysql_fetch_array($result))       //To find fine,point,rule of particuler violation code
	{
		$vcode= $result['Vcode'];
		if($vcode == $_POST['vcode'])
		{
			$violationcode = $_POST['vcode'];
			$rule = $result['Rule'];
			$fine = $result['Fine'];
			$point = $result['Point'];
		}
	}
	mysql_query("insert into driver( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");
	mysql_query("insert into fine( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");
	mysql_query("insert into violationtype( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");
    mysql_query("insert into policefine( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");
	mysql_query("insert into policefinelist( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");
	mysql_query("insert into totalpoint( Vcode,Rule,Fine,Point) values ('$violationcode','$rule','fine','point')");
	header("Location:finepaid.php");
}

?>






<html>
	<head>
		<title>Police Fine</title>
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
				<table align="center" cellspacing=5>
					<form action="" method="POST">
					<p align="center" style="color:red">
						<?php
						if(isset($msg))
							echo $msg;
						?>
					</p>					
					<tr>
						<td>Driver's License No.</td>
						<td><?php echo $dlno ?></td>
					</tr>
					<tr>
						<td>UID No.</td>
						<td><?php echo $uno ?></td>
					</tr>
					<tr>
						<td>Name</td>
						<td><?php echo $fname; ?>&nbsp;<?php echo $lname; ?></td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><?php echo $dob;?></td>
					</tr>
					<tr>
						<td>Place</td>
						<td><?php echo $city;?>,&nbsp;<?php echo $state; ?>&nbsp-&nbsp;<?php echo $pin; ?></td>
					</tr>
			      <tr>
						<td>Select Violation Type And Code</td>
					<td> <select class="text" name="vcode">
						<option  value="Select">Select</option>
					<optgroup label="A">
						<option  value="A101">A101</option>
						<option  value="A102">A102</option>
						<option  value="A103">A103</option>
						<option  value="A103">A104</option>
						<option  value="A103">A105</option>
                    </optgroup>	
					<optgroup label="B">
						<option  value="B101">B101</option>
						<option  value="B102">B102</option>
						<option  value="B103">B103</option>
						<option  value="B104">B104</option>
						<option  value="B105">B105</option>
						<option  value="B105">B106</option>
                    </optgroup>						
						</select>
					</td>
			    </tr>
				<tr>
					<td><input class="text" type="text" name="pid" value="<?php echo $police_id; ?>" hidden></td>
				</tr>								
				<tr align="center">
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