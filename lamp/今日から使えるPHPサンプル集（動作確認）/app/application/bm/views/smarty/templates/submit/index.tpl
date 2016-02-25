{literal}
<script type="text/javascript">
<!--
function chk(){
	var c = new CheckUtil();
	c.requiredCheck(document.fm.title.value, "タイトル");
	c.lengthCheck(document.fm.title.value,50, "タイトル");
	c.requiredCheck(document.fm.url.value, "URL");
	c.lengthCheck(document.fm.url.value, 255, "URL");
	c.regExCheck(document.fm.url.value, "(http://|https://|ftp://){1}[A-Za-z0-9\.\-/_]+", "URL");
	return c.getErrors();
}
//-->
</script>
{/literal}
<form name="fm" method="POST" onsubmit="return chk()"
	action="{$base}/bm/submit/process">
タイトル：<br />
<input type="text" name="title" size="50" maxlength="50"
	value="{$title}" style="ime-mode:active;" /><br />
URL：<br />
{$url}
<input type="hidden" name="url" value="{$url}" /><br />
コメント：<br />
<input type="text" name="comment" size="70" maxlength="255"
	style="ime-mode:active;" /><br />
タグ（半角カンマ区切り）：<br />
<input type="text" name="tags" size="50" maxlength="100"
	style="ime-mode:active;" /><br />
<input type="submit" value="登録" />
</form>
