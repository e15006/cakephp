<?php
$s=mysql_connect("localhost","root","1234") or die("失敗しました");
print "接続OK！<BR>";
mysql_select_db("db1");
$b1_d=$_POST["b1"];

if(preg_match("/[^0-9]/",$b1_d)){
	print "<FONT COLOR='red'>数字以外は入力しないで！！</FONT><BR>";
}else{
	mysql_query("DELETE FROM tt WHERE bang=$b1_d");
}

$re=mysql_query("SELECT * FROM tbk ORDER BY bang");
while($kekka=mysql_fetch_array($re)){
	print $kekka[0];
	print " : ";
	print $kekka[1];
	print " : ";
	print $kekka[2];
	print "<BR>";
}
mysql_close($s);
print "<BR><A HREF='kantan.html'>トップメニューに戻ります</A>";
?>
