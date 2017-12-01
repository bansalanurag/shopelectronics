<?php 
include("includes/db.php");
include("functions/functions.php");
session_start();
if(isset($_SESSION["sess_user"])){
?>
<html>
<head>
	<title>Search Results</title>
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
				<li><a href="customer/manage_account.php">Manage Account</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="logout.php">Logout</a></li>
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
					<div id="headline_content">
						<b>Welcome <?=$_SESSION['sess_user'];?>!!</b>
						<b style="color:yellow">Shopping Cart:</b>
						<span>- Items:<?php t_items(); ?></span>
					</div>
				</div>
				<div id="products_box">
					<?php 
					if(isset($_GET['search'])){
						
						$user_search = $_GET['user_query'];
						
					$get_products="select * from products where product_keywords like '%$user_search%'";
					$run_products = mysqli_query($con, $get_products);
					while($row_products=mysqli_fetch_array($run_products)){
						$pro_id = $row_products['product_id'];
						$pro_title = $row_products['product_title'];
						$pro_cat = $row_products['cat_id'];
						$pro_brand = $row_products['brand_id'];
						$pro_desc = $row_products['product_desc'];
						$pro_price = $row_products['product_price'];
						$pro_image = $row_products['product_img1'];
								
					echo"<div id='single_product'>
						<h3>$pro_title</h3>
						<img src='admin_area/product_images/$pro_image' width='200px' height='180px'/><br>
						<p><b>Price: Rs $pro_price</b></p>
						<a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
						<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
						</div>";
							}
					}
					?>				
				</div>					
			</div>
		
		
		</div>
		
		<div class="footer">
			<p>All rights reserved. Copyright © 2015</p>
			<a href="https://www.linkedin.com" target="_blank"><img src="images/linkedin.png" width="50px"/></a>
			<a href="https://twitter.com" target="_blank"><img src="images/twitter.png" width="50px"/></a>
			<a href="https://plus.google.com" target="_blank"><img src="images/google.png" width="50px"/></a>			
			<a href="https://www.facebook.com" target="_blank"><img src="images/facebook.png" width="50px"/></a>
		
		</div>
	</div>
</body>
</html>
<?php
}else{
?>
<html>
<head>
	<title>Search Results</title>
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
					<div id="headline_content">
						<b>Welcome Guest!</b>
						<b style="color:yellow">Shopping Cart:</b>
						<span>- Items: <?php t_items(); ?> - Price: Rs.<?php t_price(); ?></span>
						<a href="cart.php">Go to Cart</a>
					</div>
				</div>
				<div id="products_box">
					<?php 
					if(isset($_GET['search'])){
						
						$user_search = $_GET['user_query'];
						
					$get_products="select * from products where product_keywords like '%$user_search%'";
					$run_products = mysqli_query($con, $get_products);
					while($row_products=mysqli_fetch_array($run_products)){
						$pro_id = $row_products['product_id'];
						$pro_title = $row_products['product_title'];
						$pro_cat = $row_products['cat_id'];
						$pro_brand = $row_products['brand_id'];
						$pro_desc = $row_products['product_desc'];
						$pro_price = $row_products['product_price'];
						$pro_image = $row_products['product_img1'];
								
					echo"<div id='single_product'>
						<h3>$pro_title</h3>
						<img src='admin_area/product_images/$pro_image' width='200px' height='180px'/><br>
						<p><b>Price: Rs $pro_price</b></p>
						<a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
						<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
						</div>";
							}
					}
					?>				
				</div>					
			</div>
		
		
		</div>
		
		<div class="footer">
			<p>All rights reserved. Copyright © 2015</p>
			<a href="https://www.linkedin.com" target="_blank"><img src="images/linkedin.png" width="50px"/></a>
			<a href="https://twitter.com" target="_blank"><img src="images/twitter.png" width="50px"/></a>
			<a href="https://plus.google.com" target="_blank"><img src="images/google.png" width="50px"/></a>			
			<a href="https://www.facebook.com" target="_blank"><img src="images/facebook.png" width="50px"/></a>
		
		</div>
	</div>
</body>
</html>
<?php
}
?>