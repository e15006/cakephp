<?php
$s=mysql_connect("localhost","root","1234") or die("���s�ł�"); 
print "�������܂���";
mysql_select_db("db1",$s);
mysql_query('INSERT INTO tb1 VALUES("K777","�s�[�G�b�`�s�[���Y",20)');
mysql_close($s);
?>
