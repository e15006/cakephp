{literal}
<script type="text/javascript">
<!--
function chk(){
	var c = new CheckUtil();
	c.requiredCheck(document.fm.title.value, "件名");
	c.lengthCheck(document.fm.title.value, 25, "件名");
	c.requiredCheck(document.fm.nam.value, "投稿者名");
	c.lengthCheck(document.fm.nam.value, 10, "投稿者名");
	c.requiredCheck(document.fm.article.value, "本文");
	c.requiredCheck(document.fm.passwd.value, "削除用パスワード");
	c.lengthCheck(document.fm.passwd.value, 15, "削除用パスワード");
	return c.getErrors();
}
//-->
</script>
{/literal}
<form method="POST" name="fm" onsubmit="return chk()"
	action="{$base}/bbs/create/process">
	<input type="hidden" name="parent" value="0" />
	<table border="1" width="500" cellpadding="5">
	<tr>
		<th align="right" nowrap>件名</th>
		<td><input type="text" name="title" size="70" maxlength="25"
					style="ime-mode:active;" /></td>
	</tr><tr>
		<th align="right">投稿者</th>
		<td><input type="text" name="nam" size="70" maxlength="10"
					style="ime-mode:active;" /></td>
	</tr><tr>
		<td colspan="2">
			<textarea name="article" cols="70" rows="15"></textarea>
		</td>
	</tr><tr>
		<th align="right" nowrap>削除用パスワード</th>
		<td><input type="password" name="passwd" size="15" maxlength="15"
					style="ime-mode:disabled;" /></td>
	</tr><tr>
	</table>
	<input type="submit" name="submit" value="投稿" />
	<input type="reset" value="取消" />
</form>
