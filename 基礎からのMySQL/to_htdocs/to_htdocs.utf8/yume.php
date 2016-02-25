<?php
print <<<eof1
   <HTML>
      <HEAD>
         <TITLE>ＳＱＬカフェのページ</TITLE>
      </HEAD>
      <BODY BGCOLOR="cyan">
        
       <BR>
        <BR>
	<FONT SIZE="7" COLOR="indigo">
	ＳＱＬカフェにようこそ！
	 </FONT>
<IMG SRC='pic/d3.gif'>
         <BR><BR>
eof1;

print "<FONT size='5' COLOR='red'>";
for($i=1;$i<=15;$i=$i+1){
	print "＊";
}
print "<BR>";

$m[0]="　　　　　　　眠くないですか";
$m[1]="　　　　　　　おはようございます";
$m[2]="　　　　　　　こんにちは";
$m[3]="　　　　　　　こんばんは";

if (date("G")>=18){
	print $m[3];
}elseif(date("G")>=9){
	print $m[2];
}elseif(date("G")>=6){
	print $m[1];
}else{
	print $m[0];
}
print "<BR>";
print "　　今日は".date("Y")."年".date("m")."月".date("j")."日です<BR>";
$i=1;
while($i<=15){
	print "＊";
	$i++;
}

print "</FONT>";
print "<HR><BR>";
print "あなたのIPアドレスは　　";
print getenv('REMOTE_ADDR');
print "<BR>";
print "あなたのホスト名は　　　";
print gethostbyaddr(getenv('REMOTE_ADDR'));
print "<BR>";
print "あなたのブラウザは　　　";
print getenv('HTTP_USER_AGENT');
print "<BR>ですね<HR>";

print "<FORM action='uke.php' method='post'>";
print "メッセージを送ってください。ひたすら山彦になります。<BR>";
print "<INPUT TYPE='text' NAME='a'>";
print "<BR>";
print "<INPUT TYPE='submit' VALUE='送信'>";
print "</FORM>";
print "<HR><A href='keizi_top.php'>ＳＱＬカフェ掲示板へはこちらからどうぞ</A>";


?>