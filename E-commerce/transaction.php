<?php
session_start();
if(isset($_SESSION['sess_user'])){
?>
<html>
<head>
	<title>Payment Processing..</title>
	<style>
		p{
			display:inline-block;
		}
	</style>
</head>
<body style="background-color:#ffff99">
	<div style="margin-top:100px;margin-left:20px;border:2px solid black;background-color:white" width="600px" height="500px">
		<h2>Transaction Processing...</h2>
		<p>Thankyou For your payment. Do not Press refresh or Back Button!!. Please Wait for Some time if transaction hangs.<br>Please wait while transactions completes</p>
	</div>
	<p style="margin-left:20px">Redirecting in</p> <p id="a"></p> <p>seconds....</p>
</body>
<?php
 mysql_connect('localhost','root','');
 mysql_select_db('ecom') or die('Cannot Connect to database');
 $name = $_SESSION['sess_user'];
 $tbl = "Cart-".$name;
 $sql = "delete from `{$tbl}`";
 mysql_query($sql) or die(mysql_error());
?>

<script>	
	var x = 5;
	var start = setInterval(function(){
	document.getElementById("a").innerHTML = +x;
	if(x==0){
		clearInterval(start);
		window.open('index.php','_self');
	}
	else{
	x--;
	}	
	},1000);

</script>
</html>
<?php
}
?>