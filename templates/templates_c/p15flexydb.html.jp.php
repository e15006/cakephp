<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>郵便番号検索</title>
</head>
<body>
<table>
<tr><th>郵便番号</th><th>都道府県名</th><th>市区町村名</th><th>町域名</th></tr>
<?php if ($this->options['strict'] || (is_array($t->records)  || is_object($t->records))) foreach($t->records as $r) {?>
<tr>
<td><?php echo $this->plugin("hs",$r->zipcode);?></td>
<td><?php echo $this->plugin("hs",$r->pref);?></td>
<td><?php echo $this->plugin("hs",$r->city);?></td>
<td><?php echo $this->plugin("hs",$r->town);?></td>
</tr>
<?php }?>
</table>
</body>
</html>
