<?php

/***************　データベース情報等の読み込み　***************/
require_once("data/db_info.php");

/***************　データベースへ接続、データベース選択　***************/
$s=mysql_connect($SERV,$USER,$PASS) or die("失敗しました");
mysql_select_db($DBNM);

/***************　スレッドグループ番号(gu)を取得し$gu_dに代入　***************/
$gu_d=$_GET["gu"];

/***************　$gu_dに数字以外が含まれていたら処理を中止　***************/
if(preg_match("/[^0-9]/",$gu_d)){
print <<<eot1
	不正な値が入力されています<BR>
	<A HREF="keizi_top.php">ここをクリックしてスレッド一覧に戻ってください</A>
eot1;

/***************　$gu_dに数字以外が含まれていない、正常な値での処理　***************/
}elseif(preg_match("/[0-9]/",$gu_d)){

/***************　名前とメッセージを取得してタグを削除　***************/
$na_d=isset($_GET["na"])?htmlspecialchars($_GET["na"]):null;
$me_d=isset($_GET["me"])?htmlspecialchars($_GET["me"]):null;

/***************　IPアドレス取得　***************/
$ip=getenv("REMOTE_ADDR");

/***************　スレッドグループ番号(gu)に一致するレコードを表示　***************/
$re=mysql_query("SELECT sure FROM tbj0 WHERE guru=$gu_d");
$kekka=mysql_fetch_array($re);

/***************　スレッド内容の表示文字列$sure_comを作成　***************/
$sure_com="「".$gu_d." ".$kekka[0]."」";

/***************　スレッド表示のタイトル等書き出し　***************/
print <<<eot2
  <HTML>
      <HEAD>
         <META http-equiv="Content-Type" content="text/html;charset=Shift_JIS">
         <TITLE>ＳＱＬカフェ $sure_com スレッド</TITLE>
      </HEAD>
      <BODY BGCOLOR="darkgray">
         <FONT SIZE="7" COLOR="indigo">
            $sure_com スレッド！
         </FONT>
         <BR><BR>
         <FONT SIZE="5">
         $sure_com のメッセージ
         </FONT>
         <BR>
eot2;

/***************　名前($na_d)が入力されていればtbj1にレコード挿入　***************/
if($na_d<>""){
   mysql_query("INSERT INTO tbj1 VALUES (0,'$na_d','$me_d',now(),$gu_d,'$ip')");
}

/***************　水平線表示　***************/
print "<HR>";

/***************　日時の順にレスデータを表示　***************/
$re=mysql_query("SELECT * FROM tbj1 WHERE guru=$gu_d ORDER BY niti");


$i=1;
while($kekka=mysql_fetch_array($re)){

print "$i($kekka[0]):<U>$kekka[1]</U>:$kekka[3] <BR>";
print nl2br($kekka[2]);
print "<BR><BR>";
	$i++;
}

/***************　データベース切断　***************/
mysql_close($s);

print <<<eot3
   <HR>
   <FONT SIZE="5">
       $sure_com  にメッセージを書くときはここにどうぞ
   </FONT>
   <FORM METHOD="GET" ACTION="keizi.php">
         名前　<INPUT TYPE="text" NAME="na"><BR>
         メッセージ<BR>
      <TEXTAREA NAME="me" ROWS="10" COLS="70"></TEXTAREA>
         <BR>
      <INPUT TYPE="hidden" NAME="gu" VALUE=$gu_d>
      <INPUT TYPE="submit" VALUE="送信">
   </FORM>
      <HR>
   <A HREF="keizi_top.php">スレッド一覧に戻る</A>
   </BODY>
   </HTML>
eot3;

/***************　$gu_dに数字以外も、数字も含まれていないときの処理　***************/
}else{
   print "スレッドを選択してください。<BR>";
   print "<A HREF='keizi_top.php'>ここをクリックしてスレッド一覧に戻ってください</A>";
}

?>
