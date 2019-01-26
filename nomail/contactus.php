<?php

 
mysql_connect("localhost","root","") or die("Not Connected");
mysql_select_db("dmv") or die("Database Not Selected");


if(isset($_POST['submit']))
{	
	$name= $_POST['name'];	
	$email_id= $_POST['email_id'];
	$subject= $_POST['subject'];

if(mysql_query("insert into feedback(name,email_id,subject) values ('$name','$email_id','$subject')"))
{
	header("Location:contactus.php");
}
else
{
	echo "Not Submited";
}
}
				
		
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>Contact Us</title>
		<link rel="stylesheet" type="text/css" href="css/maincss.css">
	   <link rel="stylesheet" type="text/css" href="css/feedbackformstyle.css">
   <style>
  h2{color:gray;}
   </style>

	</head>
	
	<body>
		<div id="box">
			<div id="header">
			</div>
			<div id="navbar">
				<?php include("css/navbar.css") ?>
			</div>
			<div id="sidebar">
			</div>
			<div id="main">
				<table>
					<tr>
						<td>
							<b>Regional Transport Officer, Pune</b><br>
							38, Dr. Ambedkar Road, Near Sangam Bridge, Pune 411 001.<br><br>
							<b>Contact:</b><br>
							+91 20 26058080<br>
							+91 20 26058090/8282<br><br><br>

							<b>Regional Transport Officer, Alandi</b><br>
							Road Office Near Fulenagar,<br> 
							Next to Bombay Engineering Group, Pune.<br><br><br>
							 
							<b>Email: MH12@mahatranscom.in</b><br>
							For Online Appointments of Learner’s License please visit: www.mahatranscom.in
						</td>
						<td >
										<h2  align=center>Feedback</h2>

								<form action="" method="post">
									<input name="name" placeholder="What is your name?" class="name" required />
									<input name="email_id" placeholder="What is your email?" class="email" type="email" required />
									<textarea rows="4" cols="50" name="subject" placeholder="Please enter your message" class="message" required></textarea>
									<input name="submit" class="btn" type="submit" value="Send" onclick="myfunction();" />
								</form>

								<script>
									function myfunction() 
									{
										alert('Your feedback has been submitted.');
									}
								</script>
						</td>
					</tr>
				</table>
		
				
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
