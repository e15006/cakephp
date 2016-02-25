<?php
$s=mysql_connect("localhost","root","1234") or die("失敗しました");
print "接続OK！<BR>";	
mysql_select_db("db1");
$a1_d=$_POST["a1"];
$a2_d=$_POST["a2"];
mysql_query("INSERT INTO tbk (nama,mess) VALUES ('$a1_d','$a2_d')");
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
