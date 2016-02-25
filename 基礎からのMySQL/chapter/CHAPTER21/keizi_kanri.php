<?php

/***************　データベース情報等の読み込み　***************/
require_once("data/db_info.php");

/***************　データベースへ接続、データベース選択　***************/
$s=mysql_connect($SERV,$USER,$PASS) or die("失敗しました");
mysql_select_db($DBNM);

/***************　テーブルtbj1をSELECT　***************/
$re=mysql_query("SELECT * FROM tbj1 ORDER BY niti");

/***************　クエリの結果書き出し　***************/
$i=1;
while($kekka=mysql_fetch_array($re)){
print "$i($kekka[0]):$kekka[1]:$kekka[3] GP:$kekka[4] IP:$kekka[5]<BR>";
print nl2br($kekka[2]);
print "<BR><BR>";
	$i++;
}

/***************　データベース切断　***************/
mysql_close($s);
?>
