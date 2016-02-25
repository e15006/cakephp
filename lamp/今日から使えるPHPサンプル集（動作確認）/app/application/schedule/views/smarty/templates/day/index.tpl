{literal}
<script type="text/javascript">
<!--
function chk(){
	var c = new CheckUtil();
	c.lengthCheck(document.fm.pNam.value, 50, "予定");
	c.lengthCheck(document.fm.memo.value, 255, "メモ");
	return c.getErrors();
}
//-->
</script>
{/literal}
<img src="{$base}/img/sche.gif"
	width="25" height="25" />
	{$dat|date_format:"%Y年 %m月 %d日"}の予定
	［{$smarty.session.myApp.name}］
<table border="1" bordercolordark="#FFffFF">
<tr>
	<th>開始時刻</th><th>終了時刻</th><th>予定</th>
	<th>予定区分</th><th>メモ</th><th>中止</th>
</tr>
{foreach from=$result|smarty:nodefaults item="sche"}
	<tr>
		<td>{$sche.bTim|date_format:"%H時 %M分 "}</td>
		<td>{$sche.eTim|date_format:"%H時 %M分 "}</td>
		<td>{$sche.pNam}</td>
		<td>{$sche.cnam}</td>
		<td>{$sche.memo}</td>
		<td>
			<a href="{$base}/schedule/day/delete/dat/{$dat}/pid/{$sche.pid}">
				<img src="{$base}/img/eraser.gif" border="0" width="15" height="15" alt="削除" />
			</a>
		</td>
	</tr>
{/foreach}
</table>
<hr />
<h2>予定を追加</h2>
<form method="POST" name="fm" onsubmit="return chk()"
	action="{$base}/schedule/day/process/dat/{$dat}">
<input type="hidden" name="pDat" value="{$dat|date_format:"%Y-%m-%d"}" />
<table border="0">
<tr>
	<th align="right">予定：</th>
	<td>
		<input type="text" name="pNam" size="50" maxlength="50"
			style="ime-mode:active;" />
	</td>
</tr><tr>
	<th align="right">開始時間：</th>
	<td>
		{html_select_time prefix=bTim_
			display_hours=true display_minutes=false display_seconds=false}:
		{html_select_time prefix=bTim_ display_hours=false
			display_minutes=true display_seconds=false minute_interval=15}
	</td>
</tr><tr>
	<th align="right">終了時間：</th>
	<td>
		{html_select_time prefix=eTim_
			display_hours=true display_minutes=false display_seconds=false}:
		{html_select_time prefix=eTim_
			display_hours=false display_minutes=true display_seconds=false
			minute_interval=15}
		</select>
	</td>
</tr><tr>
	<th align="right">予定区分：</th>
	<td>
		{html_options name="cate" options=$categories}
	</td>
</tr><tr>
	<th align="right">メモ：</th>
	<td>
		<input type="text" name="memo" size="100" maxlength="255"
			style="ime-mode:active;" />
	</td>
</tr><tr>
	<td colspan="2" align="center">
		<input type="submit" name="submit" value="スケジュール登録" />
		<input type="submit" name="search" value="他の人の予定を検索" />
	</td>
</tr>
</table>
</form>
