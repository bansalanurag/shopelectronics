<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('ecom');
?>
<?php
if(isset($_POST['submit'])){
	if(isset($_POST['id'])){
		foreach ($_POST['id'] as $id)
			{
			$sql = 'delete from products where product_id = "'.$id.'" ';
			mysql_query($sql);
			}
		}
}
?>
<html>
<head>
	<title>Delete Products</title>
	<script type = "text/javascript" >
    history.pushState(null, null, 'delete_product');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'delete_product');
    });
</script>
</head>
<body style="background-color:#ff9933">
	<div>
	<h3 align="center"><u>Select Products to Delete:</u></h3>
		
	<div id="con">
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">	
	<table border="1px solid black" align="center" width="100%">
		
		<tr style='background-color:pink;'>
		<td>Select</td>
		<td>Product Id</td>
		<td>Product Title</td>
		<td>Product Price</td>
		<td>Product Description</td>
		</tr>
		<?php
			$select = "Select product_title,product_price,product_id,product_desc from products";
			$result = mysql_query($select);
			if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
		
			while($row=mysql_fetch_array($result)){ ?>
		<tr>
		<td><input type="checkbox" name="id[]" value="<?php echo $row['product_id']; ?>" disabled/></td>
		<td><?php echo $row['product_id'] ?></td>
		<td><?php echo $row['product_title'] ?></td>
		<td><?php echo $row['product_price'] ?></td>
		<td><?php echo $row['product_desc'] ?></td>
		</tr>
	<?php
	}
	?>
		<tr>		
		<td colspan='5' align='center'><input type='submit' name='submit' value='Delete'/><input type='reset' name='reset' value='Clear Selection'/></td>
		</tr>		
	</table>
	</form>
	</div>
	<br>
	<br>

	<div align="center">
	<button onclick="window.location.href='admin_manage.php'">Go Back</button>
	</div>
</body>
</html>