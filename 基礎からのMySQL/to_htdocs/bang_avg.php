<?php
$s=mysql_connect("localhost","root","1234") or die("���s�ł�"); 

mysql_select_db("db1",$s);

$q=<<<eot
SELECT bang,AVG(uria)
	 FROM tb 
WHERE uria>=50 
	GROUP BY bang
 HAVING AVG(uria)>=120
	 ORDER BY AVG(uria) DESC;
eot;

$re=mysql_query($q);
while($kekka=mysql_fetch_array($re)){
	print "�Ј��ԍ��F";
	print $kekka[0];
	print "�@���㕽�ρF";
	print $kekka[1];
	print "<BR>";
}
mysql_close($s);
?>
