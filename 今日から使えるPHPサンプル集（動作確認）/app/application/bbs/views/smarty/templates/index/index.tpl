<script type="text/javascript"
	src="{$base}/TreeMenu.js"></script>
{literal}<style type="text/css">a{ color:#000033; }</style>{/literal}
<table border="0">
<tr>
<td bgcolor="#ccFFDD">
	<form method="POST" action="{$base}/bbs/index/search">
		<span style="font-weight:bold;">記事検索：</span>
		<input type="text" name="keywd" size="20" />
		<input type="submit" value="検索" />
	</form>
	<div align="right">
	［<a href="{$base}/bbs/create/index">新規作成</a>］
	</div>
</td>
</tr>
</table>
<p>{$result|smarty:nodefaults}</p>
<div align="center">{$pager|smarty:nodefaults}</div>
