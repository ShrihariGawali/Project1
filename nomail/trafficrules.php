<?php
mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");
             //select database;
	
	session_start();
	//$record =array("License_No"=>$_SESSION['dlno']);
	//$cursor = $collection->find($record);

	//$cursor1 = $collection1->find();
/*	
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
	  }
	}	*/
?>

<html>
	<head>
		<title>Welcome</title>
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
				<?php include("rulestable.php") ?>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>