<?php

/***************�@�f�[�^�x�[�X��񓙂̓ǂݍ��݁@***************/
require_once("data/db_info.php");

/***************�@�f�[�^�x�[�X�֐ڑ��A�f�[�^�x�[�X�I���@***************/
$s=mysql_connect($SERV,$USER,$PASS) or die("���s���܂���");
mysql_select_db($DBNM);

/***************�@�^�C�g���A�摜���̕\���@***************/
print <<<eot1
   <HTML>
      <HEAD>
         <META http-equiv="Content-Type" content="text/html;charset=Shift_JIS">
         <TITLE>�r�p�k�J�t�F�̃y�[�W</TITLE>
      </HEAD>
      <BODY BGCOLOR="lightsteelblue">
         <IMG SRC="pic/oya.gif">
         <FONT SIZE="7" COLOR="indigo">
            �@�r�p�k�J�t�F�f������`
         </FONT>
         <BR><BR>
            �������X���b�h�̔ԍ����N���b�N���Ă�������
         <HR>
         <FONT SIZE="5">
            �i�X���b�h�ꗗ�j
         </FONT>
         <BR>
eot1;

/***************�@�N���C�A���gIP�A�h���X�擾�@***************/
$ip=getenv("REMOTE_ADDR");

/***************�@�X���b�h�̃^�C�g��(su)�Ƀf�[�^�������tbj0�ɑ}���@***************/
$su_d=isset($_GET["su"])? htmlspecialchars($_GET["su"]):null;
if($su_d<>""){
   mysql_query("INSERT INTO tbj0 (sure,niti,aipi) VALUES ('$su_d',now(),'$ip')");
}

/***************�@tbj0�̑S�f�[�^���o�@***************/
$re=mysql_query("SELECT * FROM tbj0");
while($kekka=mysql_fetch_array($re)){
print <<<eot2
	<A HREF="keizi.php?gu=$kekka[0]">$kekka[0]  $kekka[1]</A>
	<BR>
	$kekka[2]�쐬<BR><BR>
eot2;
}

/***************�@�f�[�^�x�[�X�ؒf�@***************/
mysql_close($s);

/***************�@�X���b�h�����͗p�\���A�g�b�v���ւ̃����N�@***************/
print <<<eot3
         <HR>
         <FONT size="5">
            �i�X���b�h�쐬�j
         </FONT>
         <BR>
            �V�����X���b�h�����Ƃ��́A�����łǂ����I
         <BR>
         <FORM METHOD="GET" ACTION="keizi_top.php">
               �V�������X���b�h�̃^�C�g��
            <INPUT TYPE="text" NAME="su" SIZE="50">
            <BR>
            <INPUT TYPE="submit" VALUE="�쐬">
         </FORM>
         <HR>
         <FONT SIZE="5">
            �i���b�Z�[�W�����j
         </FONT>
         <A HREF="keizi_search.php">��������Ƃ��͂������N���b�N</a>
	 <HR>
      </BODY>
   </HTML>
eot3;

?>