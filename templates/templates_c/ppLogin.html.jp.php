<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ログイン</title>
<style type="text/css">
<!--
body { font-family: Osaka, メイリオ, sans-serif; }
h2 { border-left: 12px solid #FF5500; border-bottom: 2px solid #FF5500; padding-left:10px; }
#content { margin-left:20px; }
#msg { color: #E61980; }
input { width: 120px; }
th { text-align: left; }
-->
</style>
</head>
<body>
<h2>ログインしてください</h2>
<div id="content">
<?php echo $this->elements['loginform']->toHtmlnoClose();?>
<table>
<tr><th>ユーザ名</th><td><?php echo $this->elements['username']->toHtml();?></td></tr>
<tr><th>パスワード</th><td><?php echo $this->elements['password']->toHtml();?></td></tr>
</table>
<p><?php echo $this->elements['login']->toHtml();?></p>
</form>
<p id="msg"><?php echo $this->plugin("hs",$t->errmsg);?></p>
</div>
</body>
</html>
