<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('ecom');
?>
<html>
<head>
	<title>All Products</title>
	<script type = "text/javascript" >
    history.pushState(null, null, 'view_all_products');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'view_all_products');
    });
</script>
</head>
<body style="background-color:#ff9933">
	<div>
	<h3 align="center"><u>All Products:</u></h3>
		
	<div id="con">	
	<table border="1px solid black" align="center" width="100%">
		<?php
			$select = "Select product_title,product_price,product_id,product_desc from products";
			$result = mysql_query($select);
			if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
		echo "<tr style='background-color:pink;'>";
		echo "<td>"."Product Id"."</td>";
		echo "<td>"."Product Title"."</td>";
		echo "<td>"."Product Price"."</td>";
		echo "<td>"."Product Description"."</td>";
		echo "</tr>";
			while($row=mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td>".$row['product_id']."</td>";
		echo "<td>".$row['product_title']."</td>";
		echo "<td>".$row['product_price']."</td>";
		echo "<td>".$row['product_desc']."</td>";
		echo "</tr>";
	}
		?>
	</table>
	</div>
<br>
<br>
	<div align="center">
	<button onclick="window.location.href='admin_manage.php'">Go Back</button>
	</div>
</body>
</html>