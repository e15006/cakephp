<?PHP
print "���Ȃ���IP�A�h���X��:";
print getenv("REMOTE_ADDR");
print "<br>";
print "���Ȃ��̃z�X�g����:";
print gethostbyaddr(getenv("REMOTE_ADDR"));
print "<br>";
print "���Ȃ��̃u���E�U��:";
print getenv("HTTP_USER_AGENT");
print "<BR>�ł���";
?>
