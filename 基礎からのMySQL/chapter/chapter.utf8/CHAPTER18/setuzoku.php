<?php
$s=mysql_connect("localhost","root","1234")  or die("失敗です"); 
print "成功しました";
mysql_close($s);
?>
