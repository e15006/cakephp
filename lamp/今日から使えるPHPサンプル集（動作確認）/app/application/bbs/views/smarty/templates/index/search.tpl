<h2>キーワード「{$smarty.post.keywd}」による検索結果</h2>
{foreach from=$result|smarty:nodefaults item="article"}
	<h3>{$article.id}：{$article.title}</h3>
	<table border="1" width="500" cellpadding="5">
	<tr>
		<th align="right" width="80" height="15">投稿者</th>
		<td>{$article.nam}</td>
	</tr>
	<tr>
		<th align="right" width="80" height="15">投稿日時</th>
		<td>{$article.sdat|date_format:"%Y年 %m月 %d日 %H時 %M分 %S秒 "}</td>
	</tr>
	<tr>
		<td colspan="2" height="300" valign="top">{$article.article|smarty:nodefaults}</td>
	</tr>
	</table>
	{if $article.parent != 0}
		<div align="center">
			[<a href="{$base}/bbs/show/index/id/{$article.parent}">親記事へ移動</a>]
		</div>
	{/if}
	<br />
	<hr />
{/foreach}
