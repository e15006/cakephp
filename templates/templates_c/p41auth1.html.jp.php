<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>キャンペーン情報１</title>
<style type="text/css">
<!--
body { font-family: Osaka, メイリオ, sans-serif; }
h2 { border-left: 12px solid #6633ff; border-bottom: 2px solid #6633ff; padding-left:10px; }
#content { margin-left:20px; }
span { color:#E61980; }
-->
</style>
</head>
<body>
<h2>キャンペーン情報 第１弾！</h2>
<div id="content">
<p>会員さまだけにご案内するとっておきのキャンペーン情報です。</p>
<p>当店では入手困難なあの幻の<br>
<span>「高級スペシャルチョコレート」</span>を<br>
独占的に入手いたしました！</p>
<form method="post" action="p41auth2.php">
<input type="submit" value="キャンペーン情報２を見る">
</form>
<form method="post" action="p41login.php">
<?php echo $this->elements['logout']->toHtml();?>
</form>
</div>
</body>
</html>
