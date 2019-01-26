<?php

mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");
session_start();
$dlno= $_SESSION['lno'];

$result=mysql_query("(select * from driver where LicenceNumber= $dlno)");

while($row=mysql_fetch_array($result))
{
	
	if($row['LicenceNumber']==$dlno)
	{
		$dno = $row['LicenceNumber'];
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



?>



<html>
	<head>
		<title>Welcome!</title>
		<link rel="stylesheet" type="text/css" href="css/maincss.css">
		<link rel="stylesheet" type="text/css" href="css/detailspage.css">
	</head>
	
	<body>
		<div id="box">
			<div id="header">
			</div>
			<div id="navbar">
				<?php include("css/navbarlogout.css") ?>
			</div>
			<div id="sidebar">
				<?php include("css/sidebardriver.css") ?>		
			</div>
			<div id="main">
				<h1>Welcome <?php echo $fname; ?>!</h1>
			
				<table align="center" class="table-fill">
					<tr>
						<th>License No.</td>
						<td><?php echo $dno; ?></td>
						<th>Contact No.</td>
						<td><?php echo $mono; ?></td>
					</tr>
					<tr>
						<th>UID</td>
						<td><?php echo $uno; ?></td>
						<th>Email</td>
						<td><?php echo $email; ?></td>	
					</tr>
					<tr>
						<th>First Name</td>
						<td><?php echo $fname; ?></td>
						<th>Address</td>
						<td><?php echo $address; ?> - <?php echo $pin; ?></td>
					</tr>
					<tr>
						<th>Last Name</td>
						<td><?php echo $lname; ?></td>
						<th>City</td>
						<td><?php echo $city; ?>, <?php echo $state; ?></td>
					</tr>
					<tr>
					    <th>Date Of Birth</td>
						<td><?php echo $dob; ?></td>
						<th>Nationality</td>
						<td>Indian</td>
					</tr>
					
				</table>				
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>