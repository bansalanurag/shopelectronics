<?php
mysql_connect('localhost','root','');
	mysql_select_db('ecom');
	
	$result = mysql_query("SELECT password FROM customer where username = 'max12'");
	if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
	}
	echo "<tr style='background-color:red;'>";		
		echo "<td>"."Password"."</td>";		
		echo "</tr>";
		
			while($row=mysql_fetch_array($result)){
		echo "<tr>";
		
		echo "<td>".$row['password']."</td>";
		echo "</tr>";
	}
	
	?>