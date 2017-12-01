<?php
include("includes/db.php");
include("functions/functions.php");
session_start();
if(!isset($_SESSION['sess_user'])){
?>
<html>
<head>
	<title>Cart</title>
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
				<li><a  class="current" href="cart.php">Shopping Cart</a></li>
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
						<a href="#" style="color:yellow">Go to Cart</a>
					</div>
				</div>
				<div id="products_box">
					<form action="" method="post" enctype="multipart/form-data">
						<table align="center" width="700px" bgcolor="skyblue">
							<tr align="center">
								<td colspan="5"><h2>Your Cart</h2></td>
							</tr>
							<tr align="center">
								<th>Remove</th>
								<th>Product</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>
							<?php
							
							$total = 0;
							global $db;
							$ip = getIp();
							$select_price = "select * from cart where ip_add='$ip'";
							$run_price = mysqli_query($db, $select_price);
							
							while($p_price=mysqli_fetch_array($run_price)){
								$pro_id = $p_price['p_id'];
								$pro_price = "select * from products where product_id='$pro_id'";
								$run_pro_price = mysqli_query($db,$pro_price);
								
								while($pp_price=mysqli_fetch_array($run_pro_price)){
									$product_price=array($pp_price['product_price']);
									$product_title=$pp_price['product_title'];
									$product_image=$pp_price['product_img1'];
									$single_price=$pp_price['product_price'];
									$values = array_sum($product_price);
									$total += $values; 
							
							?>
							<tr align="center">
							<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
							<td><?php echo $product_title ?><br>
							<img src="admin_area/product_images/<?php echo $product_image;?>" width="60px" height="70px"/></td>
							<td><input type="text" size="5" name="qty"/ disabled></td>											
							<td><?php echo "Rs.".$single_price; ?></td>
							</tr>
							<?php }} ?>
							<tr align="right">
								<td colspan="4"><b>Sub Total:</b></td>
								<td colspan="4"><?php echo "Rs.".$total;?> </td>
							</tr>
							
							<tr align="center">
								<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
								<td><input type="submit" name="continue" value="Continue Shopping"></td>
								<td><input type="submit" name="checkout" value="Checkout"/></td>
							</tr>							
						</table>
					</form>
					
					<?php
					
					global $db;
					$ip=getIp();
					if(isset($_POST['update_cart'])){
						foreach($_POST['remove'] as $remove_id){
							$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
							$run_delete = mysqli_query($db,$delete_product);
							if($run_delete){
								echo "<script>window.open('cart.php','_self')</script>";
							}
						}
					}
					
					if(isset($_POST['continue'])){
						echo "<script>window.open('index.php','_self')</script>";
					}	
					if(isset($_POST['checkout'])){
						echo "<script>
						var r = confirm('You Need To login First');
						if(r){
							window.open('my_account.php','_self');
						}else{
							alert('You Payment will not be initiated without login!!');
						}
						</script>";
					}
					
					?>
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
<?php
}
else{
?>
<html>
<head>
	<title>Cart</title>
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
				<li><a class="current" href="cart.php">My Shopping Cart</a></li>
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
				<?php cart(); ?>
					<div id="headline_content">
						<b>Welcome <?=$_SESSION['sess_user'];?>!!</b>
						<b style="color:yellow">My Shopping Cart:</b>
						<span>- Items: <?php t_items(); ?> <!-- Price: Rs.<?php t_price(); ?>--></span>
						<!--<a href="#" style="color:yellow">Go to Cart</a>-->
					</div>
				</div>
				<div id="products_box">
					<form action="" method="post" enctype="multipart/form-data">
						<table align="center" width="700px" bgcolor="skyblue">
							<tr align="center">
								<td colspan="5"><h2>Your Cart</h2></td>
							</tr>
							<tr align="center">
								<th>Remove</th>
								<th>Product</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>
							<?php
							$name = $_SESSION['sess_user'];
							$tbl = "Cart-".$name;
							$total = 0;
							global $db;
							$ip = getIp();
							$select_price = "select * from `{$tbl}`";
							$run_price = mysqli_query($db, $select_price);
							
							while($p_price=mysqli_fetch_array($run_price)){
								$pro_id = $p_price['p_id'];
								$pro_price = "select * from products where product_id='$pro_id'";
								$run_pro_price = mysqli_query($db,$pro_price);
								
								while($pp_price=mysqli_fetch_array($run_pro_price)){
									$product_price=array($pp_price['product_price']);
									$product_title=$pp_price['product_title'];
									$product_image=$pp_price['product_img1'];
									$single_price=$pp_price['product_price'];
									$values = array_sum($product_price);
									$total += $values; 
							
							?>
							<tr align="center">
							<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
							<td><?php echo $product_title ?><br>
							<img src="admin_area/product_images/<?php echo $product_image;?>" width="60px" height="70px"/></td>
							<td><input type="text" size="5" name="qty"/ disabled></td>											
							<td><?php echo "Rs.".$single_price; ?></td>
							</tr>
							<?php }} ?>
							<tr align="right">
								<td colspan="4"><b>Sub Total:</b></td>
								<td colspan="4"><?php echo "Rs.".$total;?> </td>
							</tr>
							
							<tr align="center">
								<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
								<td><input type="submit" name="continue" value="Continue Shopping"></td>
								<td><input type="submit" name="checkout" value="Checkout"/></td>
							</tr>							
						</table>
					</form>
					
					<?php
					$name = $_SESSION['sess_user'];
					$tbl = "Cart-".$name;
					global $db;
					$ip=getIp();
					if(isset($_POST['update_cart'])){
						foreach($_POST['remove'] as $remove_id){
							$delete_product = "delete from `{$tbl}` where p_id='$remove_id'";
							$run_delete = mysqli_query($db,$delete_product);
							if($run_delete){
								echo "<script>window.open('cart.php','_self')</script>";
							}
						}
					}
					
					if(isset($_POST['continue'])){
						echo "<script>window.open('index.php','_self')</script>";
					}					
					if(isset($_POST['checkout'])){
						if($total==0){
							echo "<script>alert('You need to add some items');</script>";
						}else{
						echo "<script>window.open('checkout.php','_self')</script>";	}
					}
					
					?>
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
<?php
}
?>