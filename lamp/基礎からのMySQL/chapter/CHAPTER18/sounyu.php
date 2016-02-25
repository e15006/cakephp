<?php
$s=mysql_connect("localhost","root","1234") or die("失敗です"); 
print "成功しました";
mysql_select_db("db1",$s);
mysql_query('INSERT INTO tb1 VALUES("K777","ピーエッチピー太郎",20)');
mysql_close($s);
?>
