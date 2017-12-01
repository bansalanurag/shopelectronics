<?php 
include("../includes/db.php");
include_once("../functions/functions.php");
session_start();
if(isset($_SESSION["sess_user"])){
?>
<html>
<head>
	<title>View my account</title>
	<link rel="stylesheet" href="../styles/style.css" media="all"/>
	<style>
		#links{
			font-size:23px;
		}
		#links a{
			color:black;
			text-decoration:none;			
			transition: .2s all; 		
		}
		#links a:hover{
			color:white;
			font-size:25px;
		}
		#links a:not(:hover){
		color:black;
			text-decoration:none;
		}
	</style>
</head>
<body>
	<div class="main_wrapper">
		<div class="header_wrapper">
			<a href="index.php"><img src="../images/ecom.jpg"/></a>	
		</div>		
		
		<div id="nav">
			<ul id="menu">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../all_products.php">All Products</a></li>
				<li><a class="current" href="manage_account.php">Manage Account</a></li>
		<!--	<li><a href="../user_register.php">Sign Up</a></li>	-->
				<li><a href="../cart.php">My Shopping Cart</a></li>
				<li><a href="../contact.php">Contact</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>	

			<div id="form">
				<form method="get" action="../results.php" enctype="multipart/form-data">
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
						<b>Welcome <?=$_SESSION['sess_user'];?>!!</b>
						<b style="color:yellow">Shopping Cart:</b>
						<span>- Items: <?php t_items(); ?> <!-- Price: Rs.<?php t_price(); ?>--></span>
						<a href="../cart.php">Go to Cart</a>
					</div>
				</div>
				<div id="products_box">				
					<p id="links" align="center"><a href="change_email.php">Change Registered Email</a></p>	<br>				
					<p id="links" align="center"><a href="change_password.php">Set A New Password</a></p>	<br>				
					<p id="links" align="center"><a href="view_details.php">View Your Details</a></p>		<br>		
					<p id="links" align="center"><a href="delete_account.php">Delete Account</a></p>		<br>		
				</div>					
			</div>
		
		
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
<?php
}
?>