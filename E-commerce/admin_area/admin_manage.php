<html>
<head>
	<title>Administrator</title>
<script type = "text/javascript" >
    history.pushState(null, null, 'admin_manage');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'admin_manage');
    });
</script>
<style>
body{
	background-color:#ff9933;
}
#products{
	border:1px solid black;
	background-color:#ffff33;
}
#products a{
	text-decoration:none;
	color:black;
}
#products a:hover{
	background-color:white;
	font-size:20px;
	border-radius:5px;
	transition : all 0.5s;
}
#products a:not(:hover){
	text-decoration:none;
	color:black;
	transition:all 0.4s ease-out;
}
#users{
	border:1px solid black;
	background-color:#ffff33;
}
#users a{
	text-decoration:none;
	color:black;
}
#users a:hover{
	background-color:white;
	font-size:20px;
	border-radius:5px;
	transition : all 0.5s;
}
#users a:not(:hover){
	text-decoration:none;
	color:black;
	transition:all 0.4s ease-out;
}
#footer{
	margin-top:90px;
	text-align:center;
}
#footer img{
	-webkit-transition:all 1s;
		transition:all 1s;
}
#footer img:hover{
	-webkit-transition:rotate(360deg);
		transform:rotate(360deg);
}
</style>
</head>
<body>
	<div>
		<div>
			<h1 align="center"><u><i><b>Welcome Admin!!</b></i></u></h1>		
		</div>		
		
		<div id="products">
			<h3 style="margin-left:10px"><u>Manage Products</u></h3>
			<hr>
			<ul>
				<li><a href="insert_product.php">Add New Product</a></li>
				<li><a href="view_all_products.php">View All Products</a></li>
				<li><a href="delete_product.php">Delete Products</a></li>
			</ul>	
			
		</div>
		<br>
			<br>
		<div id="users">
			<h3 style="margin-left:10px"><u>Manage Users</u></h3>
			<hr>
			<ul>
				<li><a href="view_all_users.php">View All Users</a></li>
				<li><a href="delete_user.php">Delete User</a></li>
			</ul>				
		</div>					
	</div>
	<br>
	<br>
	<div align="center">
	<button onclick="window.close();">Close Admin Page</button>
	</div>
		
		<div id="footer">
			<p>All rights reserved. Copyright © 2015</p>
			<a href="https://www.linkedin.com" target="_blank"><img src="../images/linkedin.png" width="50px"/></a>
			<a href="https://twitter.com" target="_blank"><img src="../images/twitter.png" width="50px"/></a>
			<a href="https://plus.google.com" target="_blank"><img src="../images/google.png" width="50px"/></a>			
			<a href="https://www.facebook.com" target="_blank"><img src="../images/facebook.png" width="50px"/></a>
		
		</div>
	</div>
</body>
</html>