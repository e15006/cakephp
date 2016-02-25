{literal}
<script type="text/javascript">
<!--
function chk1(part){
	var c = new CheckUtil();
	c.requiredCheck(part.value,"設置場所");
	c.lengthCheck(part.value,25,"設置場所");
	return c.getErrors();
}

function chk2(part){
	var c = new CheckUtil();
	c.requiredCheck(part.value,"取得年月日");
	c.dateTypeCheck(part.value,"取得年月日");
	return c.getErrors();
}

function chk3(part){
	var c = new CheckUtil();
	c.lengthCheck(part.value,255,"備考");
	return c.getErrors();
}
//-->
</script>
{/literal}
<img src="{$base}/img/cd.gif"
	width="25" height="25" />
備品管理データベース［{$smarty.session.myApp.name}］
<form method="POST" name="fm"
	action="{$base}/manager/edit/process">
<input type="submit" value="更新／削除" />
<input type="reset" value="取消" />
<table border="0">
<tr bgcolor="#00ccff">
	<th rowspan="2">処理区分</th><th rowspan="2">備品コード</th>
	<th>品名</th><th>部門</th><th>取得年月日</th>
</tr><tr bgcolor="#00ccff">
	<th>型番</th><th>設置場所</th><th>備考</th>
</tr>
{foreach from=$result|smarty:nodefaults item="item" name="loop"}
	<tr bgcolor="{cycle values="#FFffCC,#EEeeAA" name="f"}">
		<td rowspan="2">
			<select name="mid{$smarty.foreach.loop.iteration}">
				<option value="">処理なし</option>
				<option value="up">情報更新</option>
				<option value="del">情報削除</option>
			</select>
		</td>
		<td rowspan="2">{$item.id}
			<input type="hidden" name="id{$smarty.foreach.loop.iteration}"
				value="{$item.id}" />
		</td><td>
			{$item.nam}
		</td><td>
			<select name="depart{$smarty.foreach.loop.iteration}">
				{html_options values=$departs output=$departs
					selected=$item.depart}
			</select>
		</td><td>
			<input type="text" name="dat{$smarty.foreach.loop.iteration}"
				size="15" maxlength="10"
				value="{$item.dat|date_format:"%Y-%m-%d"}"
				style="ime-mode:disabled;" onchange="return chk2(this)" />
		</td>
	</tr>
	<tr bgcolor="{cycle values="#FFffCC,#EEeeAA" name="s"}">
		<td>{$item.fnum}</td>
		<td>
			<input type="text" name="plac{$smarty.foreach.loop.iteration}"
				size="15" maxlength="15"
				value="{$item.plac}" style="ime-mode:active;"
				onchange="return chk1(this)" />
		</td><td>
			<textarea name="mem{$smarty.foreach.loop.iteration}"
				cols="15" rows="1" style="ime-mode:active;"
				onchange="return chk3(this)">{$item.mem}</textarea>
		</td>
	</tr>
{/foreach}
</table>
<input type="hidden" name="cnt" value="{$smarty.foreach.loop.total}" />
</form>
