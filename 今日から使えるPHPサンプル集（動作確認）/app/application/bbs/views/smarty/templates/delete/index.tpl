{literal}
<script type="text/javascript">
<!--
function chk(){
	var c = new CheckUtil();
	c.requiredCheck(document.fm.passwd.value, "削除パスワード");
	c.lengthCheck(document.fm.passwd.value, 15, "削除パスワード");
	return c.getErrors();
}
//-->
</script>
{/literal}
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
<form method="POST" name="fm" onsubmit="return chk()"
	action="{$base}/bbs/delete/process/id/{$result.id}">
	削除用パスワード：
	<input type="password" name="passwd" size="10" maxlength="15" />
	<input type="submit" name="delete" value="削除" />
</form>
