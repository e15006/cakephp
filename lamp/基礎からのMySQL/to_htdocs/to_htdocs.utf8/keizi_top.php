<?php

/***************　データベース情報等の読み込み　***************/
require_once("data/db_info.php");

/***************　データベースへ接続、データベース選択　***************/
$s=mysql_connect($SERV,$USER,$PASS) or die("失敗しました");
mysql_select_db($DBNM);

/***************　タイトル、画像等の表示　***************/
print <<<eot1
   <HTML>
      <HEAD>
         <META http-equiv="Content-Type" content="text/html;charset=Shift_JIS">
         <TITLE>ＳＱＬカフェのページ</TITLE>
      </HEAD>
      <BODY BGCOLOR="lightsteelblue">
         <IMG SRC="pic/oya.gif">
         <FONT SIZE="7" COLOR="indigo">
            　ＳＱＬカフェ掲示板だよ〜
         </FONT>
         <BR><BR>
            見たいスレッドの番号をクリックしてください
         <HR>
         <FONT SIZE="5">
            （スレッド一覧）
         </FONT>
         <BR>
eot1;

/***************　クライアントIPアドレス取得　***************/
$ip=getenv("REMOTE_ADDR");

/***************　スレッドのタイトル(su)にデータがあればtbj0に挿入　***************/
$su_d=isset($_GET["su"])? htmlspecialchars($_GET["su"]):null;
if($su_d<>""){
   mysql_query("INSERT INTO tbj0 (sure,niti,aipi) VALUES ('$su_d',now(),'$ip')");
}

/***************　tbj0の全データ抽出　***************/
$re=mysql_query("SELECT * FROM tbj0");
while($kekka=mysql_fetch_array($re)){
print <<<eot2
	<A HREF="keizi.php?gu=$kekka[0]">$kekka[0]  $kekka[1]</A>
	<BR>
	$kekka[2]作成<BR><BR>
eot2;
}

/***************　データベース切断　***************/
mysql_close($s);

/***************　スレッド名入力用表示、トップ等へのリンク　***************/
print <<<eot3
         <HR>
         <FONT size="5">
            （スレッド作成）
         </FONT>
         <BR>
            新しくスレッドを作るときは、ここでどうぞ！
         <BR>
         <FORM METHOD="GET" ACTION="keizi_top.php">
               新しく作るスレッドのタイトル
            <INPUT TYPE="text" NAME="su" SIZE="50">
            <BR>
            <INPUT TYPE="submit" VALUE="作成">
         </FORM>
         <HR>
         <FONT SIZE="5">
            （メッセージ検索）
         </FONT>
         <A HREF="keizi_search.php">検索するときはここをクリック</a>
	 <HR>
      </BODY>
   </HTML>
eot3;

?>