<?php
print <<<eof1
   <HTML>
      <HEAD>
         <TITLE>�r�p�k�J�t�F�̃y�[�W</TITLE>
      </HEAD>
      <BODY BGCOLOR="cyan">
        
       <BR>
        <BR>
	<FONT SIZE="7" COLOR="indigo">
	�r�p�k�J�t�F�ɂ悤�����I
	 </FONT>
<IMG SRC='dau.gif'>
         <BR><BR>
eof1;

print "<FONT size='5' COLOR='red'>";
for($i=1;$i<=15;$i=$i+1){
	print "��";
}
print "<BR>";

$m[0]="�@�@�@�@�@�@�@�����Ȃ��ł���";
$m[1]="�@�@�@�@�@�@�@���͂悤�������܂�";
$m[2]="�@�@�@�@�@�@�@����ɂ���";
$m[3]="�@�@�@�@�@�@�@����΂��";

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
print "�@�@������".date("Y")."�N".date("m")."��".date("j")."���ł�<BR>";
$i=1;
while($i<=15){
	print "��";
	$i++;
}

print "</FONT>";
print "<HR><BR>";
print "���Ȃ���IP�A�h���X�́@�@";
print getenv('REMOTE_ADDR');
print "<BR>";
print "���Ȃ��̃z�X�g���́@�@�@";
print gethostbyaddr(getenv('REMOTE_ADDR'));
print "<BR>";
print "���Ȃ��̃u���E�U�́@�@�@";
print getenv('HTTP_USER_AGENT');
print "<BR>�ł���<HR>";

print "<FORM action='uke.php' method='post'>";
print "���b�Z�[�W�𑗂��Ă��������B�Ђ�����R�F�ɂȂ�܂��B<BR>";
print "<INPUT TYPE='text' NAME='a'>";
print "<BR>";
print "<INPUT TYPE='submit' VALUE='���M'>";
print "</FORM>";
print "<HR><A href='keizi_top.php'>�r�p�k�J�t�F�f���ւ͂����炩��ǂ���</A>";


?>