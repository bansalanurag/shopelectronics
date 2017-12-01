<?php
include("includes/db.php");
include("functions/functions.php");
session_start();
if(isset($_SESSION['sess_user'])){
?>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" href="styles/style.css" media="all"/>
	<style>
	.fcontent{
		width:1000px;
		height:800px;
		background:#80A8E6;
		
	}
	</style>
</head>
<body>
	<div class="main_wrapper">
		<div class="header_wrapper">
			<a href="index.php"><img src="images/ecom.jpg"/></a>
		</div>		
			
		<div class="fcontent">			
				<div id="headline">
				<?php cart(); ?>
					<div width="1000px">
						<b>Please Pay carefully <?=$_SESSION['sess_user'];?></b>
						<b style="color:yellow">My Shopping Cart:</b>
						<span>- Items: <?php t_items(); ?> <!-- Price: Rs.<?php t_price(); ?>--></span>
					</div>
				</div>
				<div id="products_box">
					<form action="" method="post" enctype="multipart/form-data">
						<table style="margin-right:200px" width="700px" bgcolor="skyblue" cellpadding="10px" cellspacing="10px">
							<tr align="center">
								<td colspan="2"><h2>Your Cart</h2></td>
							</tr>
							<tr align="center">								
								<th>Product</th>								
								<th>Details</th>
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
							<td><?php echo $product_title ?><br>
							<img src="admin_area/product_images/<?php echo $product_image;?>" width="60px" height="70px"/></img></td>																	
							<td><?php echo "Rs.".$single_price; ?></td>
							</tr>
							<?php }} ?>
							<tr align="center">
								<td ><b>Total Amount Payable:</b></td>
								<td><?php echo "Rs.".$total;?> </td>
							</tr>
							<tr>
						<th>Select Payment Type:</th>
						<td align="center"> <select name="payment">
								<option value="Credit Card">Credit Card</option>
								<option value="Debit Card">Debit Card</option>
								<option value="Net Banking">Net Banking</option>
								<option value="Cash On Delivery">Cash On Delivery</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>Select Bank:</th>
						<td align="center"> <select name="bank">
								<option value="ICICI Bank">ICICI Bank</option>
								<option value="Punjab National">Punjab National</option>
								<option value="State Bank of India">State Bank of India</option>
								<option value="Axis Bank">Axis Bank</option>
							</select>
						</td>
					</tr>
					<tr>
					<th>Card Details:</th>
					<td align="center"><input type="text" name="card" placeholder="Card Details"/></td>
					</tr>
					<tr>
					<td align="center"><input type="submit" name="goback" value="Cancel & Go back"/></td>
					<td align="center"><input type="submit" name="submit" value="Pay Now"/></td>
					</tr>
						</table>
					</form>
							
				<?php
					if(isset($_POST['submit'])){
						if(empty($_POST['card'])){
							$msg = "Enter Card Details";
						}else{
							echo "<script>
							var a =	confirm('Are you Sure? Once payment initiated will not be reverted!!');
							if(a){	window.open('transaction.php','_self');	}
							else{	window.open('checkout.php','_self');	}
							</script>";
						}
					}
					if(isset($_POST['goback'])){
						echo "<script>
							var b =	confirm('Are you Sure you want cancel payment and go back ??');
							if(b){	window.open('cart.php','_self');	}
							else{	window.open('checkout.php','_self');	}
							</script>";
					}
				?>		
					<p style="color:red" align="center">
					<?php
					if(isset($msg)){
						echo $msg;
					}?></p>
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
