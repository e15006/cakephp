<?php

/***************�@�f�[�^�x�[�X��񓙂̓ǂݍ��݁@***************/
require_once("data/db_info.php");

/***************�@�f�[�^�x�[�X�֐ڑ��A�f�[�^�x�[�X�I���@***************/
$s=mysql_connect($SERV,$USER,$PASS) or die("���s���܂���");
mysql_select_db($DBNM);

/***************�@�X���b�h�O���[�v�ԍ�(gu)���擾��$gu_d�ɑ���@***************/
$gu_d=$_GET["gu"];

/***************�@$gu_d�ɐ����ȊO���܂܂�Ă����珈���𒆎~�@***************/
if(preg_match("/[^0-9]/",$gu_d)){
print <<<eot1
	�s���Ȓl�����͂���Ă��܂�<BR>
	<A HREF="keizi_top.php">�������N���b�N���ăX���b�h�ꗗ�ɖ߂��Ă�������</A>
eot1;

/***************�@$gu_d�ɐ����ȊO���܂܂�Ă��Ȃ��A����Ȓl�ł̏����@***************/
}elseif(preg_match("/[0-9]/",$gu_d)){

/***************�@���O�ƃ��b�Z�[�W���擾���ă^�O���폜�@***************/
$na_d=isset($_GET["na"])?htmlspecialchars($_GET["na"]):null;
$me_d=isset($_GET["me"])?htmlspecialchars($_GET["me"]):null;

/***************�@IP�A�h���X�擾�@***************/
$ip=getenv("REMOTE_ADDR");

/***************�@�X���b�h�O���[�v�ԍ�(gu)�Ɉ�v���郌�R�[�h��\���@***************/
$re=mysql_query("SELECT sure FROM tbj0 WHERE guru=$gu_d");
$kekka=mysql_fetch_array($re);

/***************�@�X���b�h���e�̕\��������$sure_com���쐬�@***************/
$sure_com="�u".$gu_d." ".$kekka[0]."�v";

/***************�@�X���b�h�\���̃^�C�g���������o���@***************/
print <<<eot2
  <HTML>
      <HEAD>
         <META http-equiv="Content-Type" content="text/html;charset=Shift_JIS">
         <TITLE>�r�p�k�J�t�F $sure_com �X���b�h</TITLE>
      </HEAD>
      <BODY BGCOLOR="darkgray">
         <FONT SIZE="7" COLOR="indigo">
            $sure_com �X���b�h�I
         </FONT>
         <BR><BR>
         <FONT SIZE="5">
         $sure_com �̃��b�Z�[�W
         </FONT>
         <BR>
eot2;

/***************�@���O($na_d)�����͂���Ă����tbj1�Ƀ��R�[�h�}���@***************/
if($na_d<>""){
   mysql_query("INSERT INTO tbj1 VALUES (0,'$na_d','$me_d',now(),$gu_d,'$ip')");
}

/***************�@�������\���@***************/
print "<HR>";

/***************�@�����̏��Ƀ��X�f�[�^��\���@***************/
$re=mysql_query("SELECT * FROM tbj1 WHERE guru=$gu_d ORDER BY niti");


$i=1;
while($kekka=mysql_fetch_array($re)){

print "$i($kekka[0]):<U>$kekka[1]</U>:$kekka[3] <BR>";
print nl2br($kekka[2]);
print "<BR><BR>";
	$i++;
}

/***************�@�f�[�^�x�[�X�ؒf�@***************/
mysql_close($s);

print <<<eot3
   <HR>
   <FONT SIZE="5">
       $sure_com  �Ƀ��b�Z�[�W�������Ƃ��͂����ɂǂ���
   </FONT>
   <FORM METHOD="GET" ACTION="keizi.php">
         ���O�@<INPUT TYPE="text" NAME="na"><BR>
         ���b�Z�[�W<BR>
      <TEXTAREA NAME="me" ROWS="10" COLS="70"></TEXTAREA>
         <BR>
      <INPUT TYPE="hidden" NAME="gu" VALUE=$gu_d>
      <INPUT TYPE="submit" VALUE="���M">
   </FORM>
      <HR>
   <A HREF="keizi_top.php">�X���b�h�ꗗ�ɖ߂�</A>
   </BODY>
   </HTML>
eot3;

/***************�@$gu_d�ɐ����ȊO���A�������܂܂�Ă��Ȃ��Ƃ��̏����@***************/
}else{
   print "�X���b�h��I�����Ă��������B<BR>";
   print "<A HREF='keizi_top.php'>�������N���b�N���ăX���b�h�ꗗ�ɖ߂��Ă�������</A>";
}

?>
