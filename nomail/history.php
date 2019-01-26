<?php

error_reporting(E_PARSE);

	$conn = new MongoClient();     //connect to the server;
	$db = $conn->dmv;              //select database;
	$collection = $db->fine;    //create collection driver;
    $collection1=$db->totalpoint;
	session_start();
	$record =array("License_No"=>$_SESSION['dlno']);
	$cursor = $collection->find($record);

	$cursor1 = $collection1->find();
	
	foreach($cursor1 as $result)
	{
	  $lno= $result['License_No'];
	  if($lno== $_SESSION['dlno'])
	  {
		$totalpoint=$result['Point'];		
	  }
	}

	foreach($cursor as $result)
	{
	  $lno= $result['License_No'];
	  if($lno== $_SESSION['dlno'])
	  {
		$totalfine=$result['Totalfine'];
	  $policeid=$result['Police_ID'];
	  }
	}
	
	
?>



<html>
	<head>
		<title>Welcome</title>
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
				<?php include("css/sidebardriver.css") ?>
			</div>
			<div id="main">
			<?php	
					echo "<table align=center border=1 width=700px  class=table-fill>";
					echo "<tr><th>"."Police ID"."</th><th>"."Date & Time"."</th><th>"."Violation Code"."</th><th>"."Fine (₹)"."</th><th>"."Point"."</th></tr>";	
					foreach($cursor as $result)
					{
						echo "<tr><td>".$result['Police_ID']."</td><td>".$result['Date&Time']."</td><td>".$result['Violation_Code']."</td><td>".$result['Fine']."</td><td>".$result['Point']."</td></tr>";	
					}
					echo "</table>";
					echo "<br><br>";
					
					echo "<table align=center width=300 class=total>";
					echo "<tr>";
					echo "<th>Total Fine</th>";
					echo "<td></td>";
					echo "<th>₹ ".$totalfine."</th>";
					echo "</tr><tr>";
					echo "<th>Total Points</th>";
					echo "<td></td>";
					echo "<th>".$totalpoint."</th>";
					echo "</tr>";
					echo "</table>"
			?>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>