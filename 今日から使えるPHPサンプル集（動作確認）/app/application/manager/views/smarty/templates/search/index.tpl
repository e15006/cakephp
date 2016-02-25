<img src="{$base}/img/cd.gif"
	width="25" height="25" />
備品管理データベース［{$smarty.session.myApp.name}］
<form method="POST"
	action="{$base}/manager/search/process">
<table border="0">
<tr>
	<th>備品コード：</th>
	<td><input type="text" name="id" size="15" maxlength="10"
		style="ime-mode:disabled;" /></td>
</tr><tr>
	<th>型番：</th>
	<td><input type="text" name="fnum" size="20" maxlength="50"
		style="ime-mode:disabled;" /></td>
</tr><tr>
	<th>保管責任部門：</th>
	<td>
		{html_options name="depart" values=$departs output=$departs}
	</td>
</tr><tr>
	<td colspan="2" align="center">
		<input type="submit" name="sbm" value="情報検索" />
		<input type="reset" value="取消" />
	</td>
</tr>
</table>
</form>
