<?php


mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");
   
	
session_start();
$dlno= $_SESSION['id'];

$result=mysql_query("(select * from traffic where Id= $dlno)");

	
while($row=mysql_fetch_array($result))
{

		
		if($row['Id']==$dlno)
		{
			$id = $row['Id'];
			$uno = $row['Uid'];
			$fname = $row['Fname'];
			$lname = $row['Lname'];	
            $email = $row['Email'];
			$dob = $row['Dob'];
			$year = date_diff(date_create($dob), date_create('today'))->y;
			$month = date_diff(date_create($dob), date_create('today'))->m;
		    $mono = $row['Mobile'];
			$address = $row['Address'];
			$pin = $row['Pin'];
			$city = $row['City'];
			$state = $row['State'];
			
		}
	}
?>



<html>
	<head>
		<title>Welcome !</title>
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
				<?php include("css/sidebartraffic.css") ?>
			</div>
			<div id="main">
				<h1>Welcome</h1>
			
				
				<table align="center" class="table-fill">
					<tr>
						<th>Police ID.</td>
						<td><?php echo $id; ?></td>
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