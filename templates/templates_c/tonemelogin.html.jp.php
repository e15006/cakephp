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
<form class="formnav" method="post" action="index.php">
<input type="submit" value="キモチ曲検索">
</form>
</div>
<h2>ログイン</h2>
<div class="message"><?php echo $this->plugin("hs",$t->errmsg);?></div>
<?php echo $this->elements['loginform']->toHtmlnoClose();?>
<div><label>ユーザID</label>
<?php echo $this->elements['username']->toHtml();?>
</div>
<div><label>パスワード</label>
<?php echo $this->elements['password']->toHtml();?>
</div>
<div class="submit"><?php echo $this->elements['login']->toHtml();?></div>
</form>
</div>
<div id="footer">
</div>
</div>
</body>
</html>
