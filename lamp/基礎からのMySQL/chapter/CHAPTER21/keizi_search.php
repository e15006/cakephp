<?php

/***************�@�f�[�^�x�[�X��񓙂̓ǂݍ��݁@***************/
require_once("data/db_info.php");

/***************�@�f�[�^�x�[�X�֐ڑ��A�f�[�^�x�[�X�I���@***************/
$s=mysql_connect($SERV,$USER,$PASS) or die("���s���܂���");
mysql_select_db($DBNM);

/***************�@�^�C�g�����̕\���@***************/
print <<<eot1
   <HTML>
      <HEAD>
         <META http-equiv="Content-Type" content="text/html;charset=Shift_JIS">
         <TITLE>�r�p�k�J�t�F �����̃y�[�W</TITLE>
      </HEAD>
      <BODY BGCOLOR="orange">
         <HR>
         <FONT SIZE="5">
            �i�������ʂ͂�����Ɂj
         </FONT>
         <BR>
eot1;

/***************�@������������擾���ă^�O���폜�@***************/
$se_d=isset($_GET["se"])?htmlspecialchars($_GET["se"]):null;

/***************�@����������($se_d)�Ƀf�[�^������Ό��������@***************/
if($se_d<>""){

/***************�@������SQL���@�e�[�u��tbj1��tbj0�������@***************/
$str=<<<eot2
   SELECT tbj1.bang,tbj1.nama,tbj1.mess,tbj0.sure
      FROM tbj1 
   JOIN tbj0 
   ON
      tbj1.guru=tbj0.guru 
   WHERE tbj1.mess LIKE "%$se_d%"
eot2;

/***************�@�����N�G�������s�@***************/
   $re=mysql_query($str);
   while($kekka=mysql_fetch_array($re)){
      print " $kekka[0] : $kekka[1] : $kekka[2] ( $kekka[3] )";
      print "<BR><BR>";
   }
}

/***************�@�f�[�^�x�[�X�ؒf�@***************/
mysql_close($s);

/***************�@������������͗p�\���A�g�b�v�ւ̃����N�@***************/
print <<<eot3
   <HR>
      ���b�Z�[�W�Ɋ܂܂�镶������͂��Ă��������I
   <BR>
      <FORM METHOD="GET" ACTION="keizi_search.php">
            �������镶����
         <INPUT TYPE="text" NAME="se">
         <BR>
         <INPUT TYPE="submit" VALUE="����">
      </FORM>
   <BR>
      <A HREF="keizi_top.php">
         �X���b�h�ꗗ�ɖ߂�
      </A>
   </BODY>
   </HTML>
eot3;
?>
