<?php 
	mysql_connect('localhost','root','');
	mysql_select_db('ecom');
?>
<html>
<head>
	<title>All Users</title>
	<script type = "text/javascript" >
    history.pushState(null, null, 'view_all_users');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'view_all_users');
    });
</script>
</head>
<body style="background-color:#ff9933">
	<div>
	<h3 align="center"><u>User Details:</u></h3>
		
	<div id="con">	
	<table border="1px solid black" align="center" width="100%">
		<?php
			$select = "Select * from customer";
			$result = mysql_query($select);
			if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
		echo "<tr style='background-color:pink;'>";
		echo "<td>"."Customer Id"."</td>";
		echo "<td>"."Full Name"."</td>";
		echo "<td>"."User Id"."</td>";
		echo "<td>"."Email Id"."</td>";
		echo "<td>"."Password"."</td>";
		echo "<td>"."Address"."</td>";
		echo "<td>"."Security Qs"."</td>";
		echo "<td>"."Answer"."</td>";
		echo "</tr>";
			while($row=mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td>".$row['cust_id']."</td>";
		echo "<td>".$row['fullname']."</td>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['password']."</td>";
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['security']."</td>";
		echo "<td>".$row['answer']."</td>";
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