<?php

/***************　データベースへ接続、データベース選択　***************/
$s=mysql_connect("localhost","root","1234") or die("失敗です"); 
mysql_select_db("db1",$s);

/***************　NAMEがhのVALUEを変数$h_dに代入　***************/
$h_d=$_POST["h"];

/***************　$h_dがsel、ins、del、serのどれかで条件分岐　***************/
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

/***************　クエリの結果を表示　***************/
while($kekka=mysql_fetch_array($re)){
	print $kekka[0];
	print " : ";
	print $kekka[1];
	print " : ";
	print $kekka[2];
	print "<BR>";
}

/***************　データベース切断　***************/
mysql_close($s);

/***************　トップページへのリンク　***************/
print "<BR><A HREF='kantan2.html'>トップメニューに戻ります</A>";
?>
