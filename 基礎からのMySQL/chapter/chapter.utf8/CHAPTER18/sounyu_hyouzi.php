<?php
$s=mysql_connect("localhost","root","1234") or die("失敗です"); 
print "成功しました<BR>";
mysql_select_db("db1",$s);
mysql_query('INSERT INTO tb1 VALUES("K888","エスキュー花子",25)');
$re=mysql_query("SELECT * FROM tb1");
while($kekka=mysql_fetch_array($re)){
	print $kekka[0];
	print ":";
	print $kekka[1];
	print ":";
	print $kekka[2];
	print "<BR>";
}
mysql_close($s);
?>
