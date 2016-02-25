<?php
$s=mysql_connect("localhost","root","1234") or die("Ž¸”s‚Å‚·"); 
mysql_select_db("db1",$s);
mysql_query("INSERT INTO tb1 VALUES('K888',25)") or die(mysql_error());
mysql_close($s);
?>
	