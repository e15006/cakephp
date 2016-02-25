<table border="1" width="500" cellpadding="5">
<tr>
	<th align="right" width="80" height="15">タイトル</th>
	<td>{$result.id}：{$result.title}</td>
</tr>
<tr>
	<th align="right" width="80" height="15">投稿者</th>
	<td>{$result.nam}</td>
</tr>
<tr>
	<th align="right" width="80" height="15">投稿日時</th>
	<td>{$result.sdat|date_format:"%Y年 %m月 %d日 %H時 %M分 %S秒 "}</td>
</tr>
<tr>
<td colspan="2" height="300" valign="top">{$result.article|smarty:nodefaults}</td>
</tr>
</table>
<form>
	<input type="button" value="記事に返信" onclick="location.href='{$base}/bbs/response/index/id/{$result.id}'" />
	<input type="button" value="記事を削除" onclick="location.href='{$base}/bbs/delete/index/id/{$result.id}'" />
</form>
