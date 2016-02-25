<?php

/***************　データベース情報等の読み込み　***************/
require_once("data/db_info.php");

/***************　データベースへ接続、データベース選択　***************/
$s=mysql_connect($SERV,$USER,$PASS) or die("失敗しました");
mysql_select_db($DBNM);

/***************　タイトル等の表示　***************/
print <<<eot1
   <HTML>
      <HEAD>
         <META http-equiv="Content-Type" content="text/html;charset=Shift_JIS">
         <TITLE>ＳＱＬカフェ 検索のページ</TITLE>
      </HEAD>
      <BODY BGCOLOR="orange">
         <HR>
         <FONT SIZE="5">
            （検索結果はこちらに）
         </FONT>
         <BR>
eot1;

/***************　検索文字列を取得してタグを削除　***************/
$se_d=isset($_GET["se"])?htmlspecialchars($_GET["se"]):null;

/***************　検索文字列($se_d)にデータがあれば検索処理　***************/
if($se_d<>""){

/***************　検索のSQL文　テーブルtbj1にtbj0を結合　***************/
$str=<<<eot2
   SELECT tbj1.bang,tbj1.nama,tbj1.mess,tbj0.sure
      FROM tbj1 
   JOIN tbj0 
   ON
      tbj1.guru=tbj0.guru 
   WHERE tbj1.mess LIKE "%$se_d%"
eot2;

/***************　検索クエリを実行　***************/
   $re=mysql_query($str);
   while($kekka=mysql_fetch_array($re)){
      print " $kekka[0] : $kekka[1] : $kekka[2] ( $kekka[3] )";
      print "<BR><BR>";
   }
}

/***************　データベース切断　***************/
mysql_close($s);

/***************　検索文字列入力用表示、トップへのリンク　***************/
print <<<eot3
   <HR>
      メッセージに含まれる文字を入力してください！
   <BR>
      <FORM METHOD="GET" ACTION="keizi_search.php">
            検索する文字列
         <INPUT TYPE="text" NAME="se">
         <BR>
         <INPUT TYPE="submit" VALUE="検索">
      </FORM>
   <BR>
      <A HREF="keizi_top.php">
         スレッド一覧に戻る
      </A>
   </BODY>
   </HTML>
eot3;
?>
