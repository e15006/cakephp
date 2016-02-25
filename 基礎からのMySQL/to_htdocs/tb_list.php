<?php
$s=mysql_connect("localhost","root","1234") or die("Ž¸”s‚Å‚·"); 
$re=mysql_list_tables("db1",$s);
while($kekka=mysql_fetch_array($re)){
     print $kekka[0];
     print "<BR>";
}
mysql_close($s);
?>
	