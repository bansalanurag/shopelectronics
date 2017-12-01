<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('ecom');
?>
<?php
if(isset($_POST['submit'])){
	if(isset($_POST['id'])){
		foreach ($_POST['id'] as $id)
			{
				$tbl = "Cart-".$id;
				$sql = "drop table `{$tbl}`";
				$sql1 = 'delete from customer where username = "'.$id.'" ';
				mysql_query($sql);
				mysql_query($sql1);
			}
		}
}
?>
<html>
<head>
	<title>All Users</title>
	<script type = "text/javascript" >
    history.pushState(null, null, 'delete_users');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'delete_users');
    });
</script>
</head>
<body style="background-color:#ff9933">
	<div>
	<h3 align="center"><u>User Details:</u></h3>
		
	<div id="con">	
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<table border="1px solid black" align="center" width="100%">
		 
	
		<tr style='background-color:pink'>
		<td>Select</td>
		<td>Customer Id</td>
		<td>Full Name</td>
		<td>User Id</td>
		<td>Email Id</td>
		<td>Password</td>
		<td>Address</td>
		</tr>
		<?php
			$select = "Select * from customer";
			$result = mysql_query($select);
			if($result === FALSE) {    die(mysql_error()); 	}	
			while($row=mysql_fetch_array($result)){	 ?>
				
		<tr>
		<td><input type="checkbox" name="id[]" value="<?php echo $row['username']; ?>"/></td>
		<td><?php echo $row['cust_id'] ?></td>
		<td><?php echo $row['fullname'] ?></td>
		<td><?php echo $row['username'] ?></td>
		<td><?php echo $row['email'] ?></td>
		<td><?php echo $row['password'] ?></td>
		<td><?php echo $row['address'] ?></td>
		</tr>
		<?php
		}
		?>
		<tr >
			<td colspan='4' align='right'><input type='submit' name='submit' value='Delete'/></td>
			<td colspan='3' align='left'><input type='reset' name='reset' value='Clear Selection'/></td>
		</tr>		
	</table>
	</form>
	</div>
<br>
<br>
	<div align="center">
	<button onclick="window.location.href='admin_manage.php'">Go Back</button>
	</div>
</div>
	
</body>
</html>