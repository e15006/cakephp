<?php

/***************�@�f�[�^�x�[�X��񓙂̓ǂݍ��݁@***************/
require_once("data/db_info.php");

/***************�@�f�[�^�x�[�X�֐ڑ��A�f�[�^�x�[�X�I���@***************/
$s=mysql_connect($SERV,$USER,$PASS) or die("���s���܂���");
mysql_select_db($DBNM);

/***************�@�e�[�u��tbj1��SELECT�@***************/
$re=mysql_query("SELECT * FROM tbj1 ORDER BY niti");

/***************�@�N�G���̌��ʏ����o���@***************/
$i=1;
while($kekka=mysql_fetch_array($re)){
print "$i($kekka[0]):$kekka[1]:$kekka[3] GP:$kekka[4] IP:$kekka[5]<BR>";
print nl2br($kekka[2]);
print "<BR><BR>";
	$i++;
}

/***************�@�f�[�^�x�[�X�ؒf�@***************/
mysql_close($s);
?>
