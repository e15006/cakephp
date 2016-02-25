<img src="{$base}/img/sche.gif"
	width="25" height="25" />
	メンバスケジュール（{$smarty.post.pDat}：{$bTim}～{$eTim}）
<hr />
<table border="1" align="center" bordercolordark="#FFffFF">
<tr>
	<th>メンバ名</th><th>予定</th><th>開始時刻</th><th>終了時刻</th>
</tr>
{foreach from=$result|smarty:nodefaults item=info}
	<tr>
		<td>{$info.id}</td>
		<td>{$info.pNam}</td>
		<td>{$info.bTim}</td>
		<td>{$info.eTim}</td>
	</tr>
{/foreach}
</table>
