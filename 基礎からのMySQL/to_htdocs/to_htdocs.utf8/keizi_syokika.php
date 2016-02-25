<?php
require_once("data/db_info.php");
$s=mysql_connect($SERV,$USER,$PASS) or die("失敗しました");

mysql_select_db($DBNM);

mysql_query("DELETE FROM tbj0");
mysql_query("DELETE FROM tbj1");
mysql_query("ALTER TABLE tbj0 AUTO_INCREMENT=0");
mysql_query("ALTER TABLE tbj1 AUTO_INCREMENT=0");

print "ＳＱＬカフェのテーブルを初期化しました";

mysql_close($s);

?>
