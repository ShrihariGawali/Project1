<?php

error_reporting(E_PARSE);
session_start();
	mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");
/*
	$collection = $db->police;    //create collection driver;
	$collection3 =$db->policefine;      //create collection policefine(Total Fine)
    $collection4= $db->policefinelist;  //create collection policefinelist(list according to time)
    $res=array();
	$res1=array('Police_ID'=>$_SESSION['dlno']);
	$cursor = $collection->find($res);
	$cursor3 = $collection3->find();
	$cursor4 = $collection4->find($res1);
	
	*/
	foreach($cursor3 as $result)
	{
		$adminid= $result['Police_ID'];
		if($adminid == $_SESSION['dlno'])
		{
			$totalfine= $result['Fine'];
		}
	}

	
	
	
?>

<html>
	<head>
		<title>Police History</title>
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
				<?php include("css/sidebartraffic.css") ?>
			</div>
			<div id="main">
			
			<?php	
					echo "<table align=center border=1 width=700px  class=table-fill>";
					echo "<tr><th>"."Date & Time"."</th><th>"."Violation Code"."</th><th>"."Fine (₹)"."</th></tr>";	
					$result=mysql_query("select * from policefinelist");
				     while($row=mysql_fetch_array($result))
					
					{
						echo "<tr align=center><td>".$row['Date&Time']."</td><td>".$row['Violationcode']."</td><td>".$row['Fine']."</td></tr>";	
					}
					echo "</table>";
					echo "<br><br>";
					
					echo "<table align=center width=300 class=total>";
					echo "<tr>";
					echo "<th>Total Fine</th>";
					echo "<td></td>";
					echo "<th>₹ ".$totalfine."</th>";
					echo "</tr>";
					echo "</table>"
			?>

			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>