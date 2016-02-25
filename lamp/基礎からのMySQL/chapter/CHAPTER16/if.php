<?php
if (date("G")>=18){
	print "‚±‚ñ‚Î‚ñ‚Í";
}elseif(date("G")>=9){
	print "‚±‚ñ‚É‚¿‚Í";
}elseif(date("G")>=6){
	print "‚¨‚Í‚æ‚¤‚²‚´‚¢‚Ü‚·";
}else{
	print "–°‚­‚È‚¢‚Å‚·‚©";
}
?>
