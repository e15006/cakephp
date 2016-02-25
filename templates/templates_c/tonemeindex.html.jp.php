<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/toneme.css">
<title>ToneMe トンミー</title>
</head>
<body>
<div id="container">
<div id="header">
<h1><img src="img/head.png"></h1>
</div>
<div id="content">
<div id="navdiv">
<form class="formnav" method="post" action="login.php">
<input type="submit" value="ログイン">
</form>
</div>
<h2>いまのあなたの<span class="style1">キブン</span>は？</h2>
<div class="boxbtn">
<form method="post" action="index.php">
<?php echo $this->elements['btn1']->toHtml();?>
<?php echo $this->elements['btn2']->toHtml();?>
<?php echo $this->elements['btn3']->toHtml();?>
<?php echo $this->elements['btn4']->toHtml();?>
<?php echo $this->elements['btn5']->toHtml();?>
<?php echo $this->elements['btn6']->toHtml();?>
</form>
</div>
<?php if ($t->feelingok)  {?>
<h2>いま聞きたい<span class="style1"><?php echo $this->plugin("hs",$t->feelname);?></span>な１曲はコレ！</h2>
<div class="boxbtn">
<div id="boxface">
<?php echo $this->elements['face']->toHtml();?>
</div>
<div id="boxtune">
<p><?php echo $this->plugin("hs",$t->name);?></p>
<p id="artname"><span id="artby">&nbsp;by&nbsp;</span>
<?php echo $this->plugin("hs",$t->artist);?></p>
</div>
<?php if ($t->comcontok)  {?>
<div id="fukit"></div>
<div id="fukim">
<?php if ($this->options['strict'] || (is_array($t->comconts)  || is_object($t->comconts))) foreach($t->comconts as $line) {?>
<?php echo $this->plugin("hs",$line);?><br>
<?php }?>
</div>
<div id="fukib"></div>
<?php }?>
</div>
<?php }?>
</div>
<div id="footer"></div>
</div>
</body>
</html>
