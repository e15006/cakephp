<FORM METHOD="post" ACTION="radio_uke.php">
���Ȃ��̔N���I�����āA���M�{�^�����N���b�N���Ă��������B<BR>

<?php

$i=1;
$c=1;

while($i<=100){
print "<INPUT TYPE='radio' NAME='r' VALUE='$i'>$i  ";
   if($c==10){
      print "<BR>";
      $c=0;
   }
$i++;
$c++;
}

?>

<INPUT TYPE="submit" VALUE="���M">
</FORM>
