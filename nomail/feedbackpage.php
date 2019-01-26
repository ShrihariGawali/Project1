
<?php

mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");


 
 
$result=mysql_query("select * from feedback");
$row=mysql_fetch_array($result);


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
				<?php include("css/sidebaradmin.css") ?>
			</div>
			<div id="main">
			<?php	
					echo "<table align=center border=1 width=700px  class=table-fill>";
					echo "<tr><th>"."Name"."</th><th>"."Email"."</th><th>"."Subject"."</th></tr>";	
					$result=mysql_query("select * from feedback");
					while($row=mysql_fetch_array($result))
					{
				     
					  
						echo "<tr align=center><td>".$row['name']."</td><td>".$row['email_id']."</td><td>".$row['subject']."</td></tr>";	
					  }
					echo "</table><br><br>";
					
			?>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>