<?php 
include("../includes/db.php");
include_once("../functions/functions.php");
?>
<?php
mysql_connect('localhost','root','');
			mysql_select_db('ecom');
			
			
if(isset($_POST['submit'])){
	$id = $_POST['username'];
	session_start();
	$_SESSION['id']= $id;
	$result = mysql_query('SELECT username FROM customer where username = "'.$id.'"');
	if($result === FALSE) {  die(mysql_error()); }
		while($row=mysql_fetch_array($result)){		
			$username = $row['username'];			
		}
		
		
	if(empty($_POST['username'])){
		$msg = "You must enter your login Id";
	}
	else if($username!=$id){
		$msg = "UserId does not Exist!!";
		}
	else{
		
		$sql = 'select security from customer where username = "'.$id.'"';
		$result = mysql_query($sql);
		if($result === FALSE) { die(mysql_error());		}
		
		while($row=mysql_fetch_array($result)){
			$msg1 = $row['security'];	}
			
			if(isset($msg1)){
				$msg2 = "<button onclick=\"location.href='security_ques.php'\">Answer Question</button>";
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
							<th>Your Id</th>
							<td><input type="text" name="username" placeholder="UserId"/></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" name="submit" Value="Proceed"/></td>
						</tr>
					</table>
					</form>
			<br>
		<p style="color:red" align="center">
		<?php
		if(isset($msg)){
			echo $msg;
		}?></p>
		<p style="margin-left:350px;font-size:20px">
		<?php
		if(isset($msg1)){
			echo $msg1;
		}?></p><br>
		<p style="margin-left:410px;">
		<?php
		if(isset($msg2)){
			echo $msg2;
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