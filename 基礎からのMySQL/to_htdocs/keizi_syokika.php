<?php
require_once("data/db_info.php");
$s=mysql_connect($SERV,$USER,$PASS) or die("Ž¸”s‚µ‚Ü‚µ‚½");

mysql_select_db($DBNM);

mysql_query("DELETE FROM tbj0");
mysql_query("DELETE FROM tbj1");
mysql_query("ALTER TABLE tbj0 AUTO_INCREMENT=0");
mysql_query("ALTER TABLE tbj1 AUTO_INCREMENT=0");

print "‚r‚p‚kƒJƒtƒF‚Ìƒe[ƒuƒ‹‚ð‰Šú‰»‚µ‚Ü‚µ‚½";

mysql_close($s);

?>
