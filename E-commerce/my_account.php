<?php 
include("includes/db.php");
include("functions/functions.php");
?>
<?php
@mysql_connect('localhost','root','') or die('Connection Failed');
@mysql_select_db('ecom') or die('Not Connected To DataBase');

	if(isset($_POST['submit'])){
		if(empty($_POST['username'])){
			$msg = "Enter UserId";
		}
		else if(empty($_POST['password'])){
			$msg = "Enter Password";
		}
		else if($_POST['username']=='admin' && $_POST['password']=='admin'){
			echo "<script>window.open('admin_area/admin_manage.php','_blank');</script>";
		}
		else
		{
		$userid = $_POST['username'];
		$userpass = $_POST['password'];
		$q1 = mysql_query("SELECT * FROM customer WHERE username='".$userid."' AND password = '".$userpass."' ");
		$numrows = mysql_num_rows($q1);
		if($numrows!=0){
			while($row=mysql_fetch_assoc($q1)){
				$dbusername=$row['username'];
				$dbuserpass=$row['password'];
					}
			if($userid == $dbusername && $userpass == $dbuserpass){
				session_start();
				$_SESSION['sess_user'] = $userid;
				header("Location: index.php");
			}
		}else{
			$msg = "Invalid Username";
		}
		}
	}	
?>

<html>
<head>
	<title>My Account</title>
	<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
	<div class="main_wrapper">
		<div class="header_wrapper">
			<a href="index.php"><img src="images/ecom.jpg"/></a>
		
		</div>		
		
		<div id="nav">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a class="current" href="my_account.php">My Account</a></li>
				<li><a href="user_register.php">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>	

			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Enter Your Wish"/>
					<input type="submit" name="search" value="search"/>
				</form>
			</div>
			
		</div>
		
		<div class="content">
			<div id="left_sidebar">
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
				<?php getCats();	?>
				</ul>
				
				<div id="sidebar_title">Brands</div>
				<ul id="cats">
					<?php getBrands(); ?>
				</ul>
			</div>
			<div id="right_content">
				<div id="headline">
				<?php cart(); ?>
					<div id="headline_content">
						<b>Welcome Guest!</b>
						<b style="color:yellow">Shopping Cart:</b>
						<span>- Items: <?php t_items(); ?> - Price: Rs.<?php t_price(); ?></span>
						<a href="cart.php">Go to Cart</a>
					</div>
				</div>
				<div id="Login">
					<form action="" method="post">
	<table style="margin-top:50px;margin-left:250px;border:2px solid black" cellspacing="10" width="20%">
		<tr>
			<th>Username</th>
			<td><input type="text" id="username" name="username" placeholder="User Name"/></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" id="password" name="password" placeholder="Password"/></td>
		</tr>
		<tr>
			<td align="right"><input type="submit" name="submit" value="Log In"/></td>
			<td><input type="reset" /></td>
		</tr>
	</table>
	<p style="color:red" align="center">
		<?php
		if(isset($msg)){
			echo $msg;
		}?></p>
	</form>
		<br>	
			<p style="margin-left:300px;color:yellow;">Not A User ?? <a style="text-decoration:none;" href="user_register.php">Click Here</a></p>
			<p style="margin-left:270px;color:#005500;">Forgot Your Password?? <a style="text-decoration:none;" href="customer/forget_password.php" target="_blank">Click Here</a></p>
				</div>					
			</div>
		
		
		</div>
		
		<div class="footer">
			<p>All rights reserved. Copyright © 2015</p>
			<a href="https://www.linkedin.com"><img src="images/linkedin.png" width="50px"/></a>
			<a href="https://twitter.com"><img src="images/twitter.png" width="50px"/></a>
			<a href="https://plus.google.com"><img src="images/google.png" width="50px"/></a>			
			<a href="https://www.facebook.com/"><img src="images/facebook.png" width="50px"/></a>
		</div>
	</div>
</body>
</html>