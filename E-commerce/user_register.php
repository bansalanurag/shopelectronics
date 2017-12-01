<?php 
include("includes/db.php");
include("functions/functions.php");
?>

<?php
@mysql_connect('localhost','root','') or die('Connection Failed');
@mysql_select_db('ecom') or die('Not Connected To DataBase');

if(isset($_POST['submit'])){
			if(empty($_POST['name'])){
				$msg ='Please Enter Your Name';
			}
			else if(empty($_POST['username'])){
				$msg ='Please Enter Your Prefered Username';
			}
			else if(empty($_POST['email'])){
				$msg ='Please Enter Your Email ID';
			}
			else if(empty($_POST['password'])){
				$msg ='Password Cannot Be Empty';
			}
			else if(empty($_POST['repassword'])){
				$msg ='Re-enter Password';
			}
			else if($_POST['password']!=$_POST['repassword']){
				$msg = 'Password does not Match';
			}
			else if(empty($_POST['address'])){
				$msg ='Provide your address';
			}
			else if(empty($_POST['security'])){
				$msg ='Select one security question';
			}
			else if(empty($_POST['answer'])){
				$msg ='Please provide answer for security question';
			}
			else{
				if(mysql_query("INSERT INTO `customer`(`fullname`, `username`, `email`, `password`, `address`,`security`,`answer`) VALUES ('".$_POST['name']."', '".$_POST['username']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['address']."', '".$_POST['security']."', '".$_POST['answer']."')")){
					$msg1="Successfully Registered !!";
				
				$name = $_POST['username'];
				$tbl = "Cart-".$name;
				mysql_query("CREATE TABLE `{$tbl}`
				(
				`p_id` varchar(15),
				`qty` varchar(15)
				)");
				}
			}
}
?>

<html>
<head>
	<title>Sign Up!!</title>
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
				<li><a href="my_account.php">My Account</a></li>
				<li><a class="current" href="user_register.php">Sign Up</a></li>
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
				<br>
					<h2 style="margin-left:330px;color:black">Give us your details :</h2>
					<form action="" method="post">
	<table style="margin-top:50px;margin-left:190px;border:2px solid black" cellspacing="10" width="60%">
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" id="name" placeholder="Your Full Name"/></td>
		</tr>
		<tr>
			<th>Username</th>
			<td><input type="text" name="username" id="username" placeholder="Login id"/></td>
		</tr>
		<tr>
			<th>Email Id</th>
			<td><input type="text" name="email" id="email" placeholder="Your email Id"/></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="password" id="password" placeholder="Password"/></td>
		</tr>
		<tr>
			<th>Re-enter Password</th>
			<td><input type="password" name="repassword" id="repassword" placeholder="Same As above"/></td>
		</tr>
		<tr>
			<th>Address</th>
			<td><input type="text" name="address" id="address" placeholder="Delivery Address"/></td>
		</tr>
		<tr>
			<th>Security Question</th>
			<td> <select name="security">
					<option value="What is your Mother's Name">What is your Mother's Name</option>
					<option value="What is your First School Name">What is your First School Name</option>
					<option value="How many countries have you visited">How many countries have you visited</option>
					<option value="What is your favorite color">What is your favorite color</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>Your answer</th>
			<td><input type="text" name="answer" id="answer" placeholder="Answer For above qs."/></td>
		</tr>
		<tr>
			<td align="right"><input type="submit" name="submit" value="Sign Up"/></td>
			<td><input type="reset" /></td>
		</tr>
	</table>
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
	</form>
	<br>
		<p style="margin-left:320px;color:yellow;">Already A User ?? <a style="text-decoration:none;" href="my_account.php">Click Here</a></p>
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
