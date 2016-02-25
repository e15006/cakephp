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
<?php echo $this->elements['logout']->toHtml();?>
</form>
</div>
<h2>曲の検索</h2>
<div class="message"><?php echo $this->plugin("hs",$t->message);?></div>
<form method="post" action="search.php">
<div><label>曲名</label><?php echo $this->elements['tune_name']->toHtml();?></div>
<div><label>アーティスト</label><?php echo $this->elements['artist_id']->toHtml();?></div>
<div><label>気持ち</label><?php echo $this->elements['feeling_id']->toHtml();?></div>
<div class="submit"><input type="submit" value="検索"></div>
</form>
<div id="navlink"><a href="add.php">曲の追加</a></div>
<table class="tunetbl">
<tr><th class="column-1">ID</th><th class="column-2">曲名</th><th class="column-3">アーティスト名</th><th class="column-4">気持ち</th><th class="column-5">コメント</th><th class="column-6">操作</th></tr>
<?php if ($this->options['strict'] || (is_array($t->records)  || is_object($t->records))) foreach($t->records as $r) {?>
<tr><td class="column-1"><?php echo $this->plugin("hs",$r->tid);?></td><td class="column-2"><?php echo $this->plugin("hs",$r->tname);?></td><td class="column-3"><?php echo $this->plugin("hs",$r->aname);?></td>
<td class="column-4"><?php echo $this->plugin("hs",$r->fname);?></td><td class="column-5"><?php echo $this->plugin("hs",$r->cmntflg);?></td>
<td class="column-6">
<?php 
                $_element = $this->mergeElement(
                    $this->elements['ed%s'],
                    isset($r->tid) && isset($this->elements[sprintf('ed%s',$r->tid)]) ? $this->elements[sprintf('ed%s',$r->tid)] : false
                );
                $_element->attributes['name'] = sprintf('ed%s',$r->tid);
                $_element->attributes['id'] = sprintf('ed%s',$r->tid);
                echo $_element->toHtml();?>
&nbsp;<?php 
                $_element = $this->mergeElement(
                    $this->elements['dd%s'],
                    isset($r->tid) && isset($this->elements[sprintf('dd%s',$r->tid)]) ? $this->elements[sprintf('dd%s',$r->tid)] : false
                );
                $_element->attributes['name'] = sprintf('dd%s',$r->tid);
                $_element->attributes['id'] = sprintf('dd%s',$r->tid);
                echo $_element->toHtml();?>
</td>
</tr>
<?php }?>
</table>
</div>
<div id="footer"></div>
</div>
</body>
</html>
