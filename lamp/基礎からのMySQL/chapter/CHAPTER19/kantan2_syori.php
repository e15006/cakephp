<?php

/***************�@�f�[�^�x�[�X�֐ڑ��A�f�[�^�x�[�X�I���@***************/
$s=mysql_connect("localhost","root","1234") or die("���s�ł�"); 
mysql_select_db("db1",$s);

/***************�@NAME��h��VALUE��ϐ�$h_d�ɑ���@***************/
$h_d=$_POST["h"];

/***************�@$h_d��sel�Ains�Adel�Aser�̂ǂꂩ�ŏ�������@***************/
switch("$h_d"){
	case "sel":
		$re=mysql_query("SELECT * FROM tbk ORDER BY bang");
		break;
	case "ins":
		$a1_d=$_POST["a1"];
		$a2_d= $_POST["a2"];
		mysql_query("INSERT INTO tbk (nama,mess) VALUES ('$a1_d','$a2_d')");
		$re=mysql_query("SELECT * FROM tbk ORDER BY bang");
		break;
	case "del":
		$b1_d=$_POST["b1"];
		mysql_query("DELETE FROM tbk WHERE bang=$b1_d");
		$re=mysql_query("SELECT * FROM tbk ORDER BY bang");
		break;
	case "ser":
		$c1_d=$_POST["c1"];
		$re=mysql_query("SELECT * FROM tbk WHERE mess LIKE '%$c1_d%' ORDER BY bang");
		break;
}

/***************�@�N�G���̌��ʂ�\���@***************/
while($kekka=mysql_fetch_array($re)){
	print $kekka[0];
	print " : ";
	print $kekka[1];
	print " : ";
	print $kekka[2];
	print "<BR>";
}

/***************�@�f�[�^�x�[�X�ؒf�@***************/
mysql_close($s);

/***************�@�g�b�v�y�[�W�ւ̃����N�@***************/
print "<BR><A HREF='kantan2.html'>�g�b�v���j���[�ɖ߂�܂�</A>";
?>
