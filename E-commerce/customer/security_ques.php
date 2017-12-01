<?php 
include("../includes/db.php");
include_once("../functions/functions.php");
?>
<?php
mysql_connect('localhost','root','');
mysql_select_db('ecom');			
session_start();
if(isset($_SESSION['id'])){
			$id = $_SESSION['id'];
if(isset($_POST["submit"])){
	 $ans = $_POST["answer"];		
	 $result = mysql_query('SELECT answer FROM customer where username = "'.$id.'"');
		if($result == FALSE) {	die(mysql_error()); 	}								
		while($row=mysql_fetch_array($result)){		
		$answer= $row['answer'];	}	
			if($ans!=$answer){
				$msg = 'Wrong answer';
			}
			else{
				$result = mysql_query('SELECT password FROM customer where username = "'.$id.'"');
				if($result == FALSE) { 	die(mysql_error());	}							
				while($row=mysql_fetch_array($result)){		
						$msg1 = "Password is " . $row['password'];	
						}
				}	
}
}
?>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" href="../styles/style.css" media="all"/>
	<style>
	.fcontent{
		width:1000px;
		height:457px;
		background:#80A8E6;
		
	}
	</style>
</head>
<body>
	<div class="main_wrapper">
		<div class="header_wrapper">
			<a href="index.php"><img src="../images/ecom.jpg"/></a>	
		</div>		
		
		<div class="fcontent">
		<br>
				<form method="post">
					<table style="margin-left:370px;border:1px solid black" cellspacing="5" cellpadding="4">
						<tr>
							<th>Your Answer</th>
							<td><input type="text" name="answer" placeholder="Your Answer"></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" name="submit" value="Get Password"></td>
						</tr>
					</table>
					</form>
			<br>
			<p style="color:red" align="center">
		<?php
		if(isset($msg)){
			echo $msg;
		}?></p>
		<p style="color:green" align="center">
		<?php
		if(isset($msg1)){
			echo $msg1;
		}?></p>
		</div>		
		<div class="footer">
			<p>All rights reserved. Copyright © 2015</p>
			<a href="https://www.linkedin.com" target="_blank"><img src="../images/linkedin.png" width="50px"/></a>
			<a href="https://twitter.com" target="_blank"><img src="../images/twitter.png" width="50px"/></a>
			<a href="https://plus.google.com" target="_blank"><img src="../images/google.png" width="50px"/></a>			
			<a href="https://www.facebook.com" target="_blank"><img src="../images/facebook.png" width="50px"/></a>
		
		</div>			
	
		
	</div>
</body>
</html>