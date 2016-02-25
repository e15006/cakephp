<img src="{$base}/img/sche.gif"
	width="25" height="25" />
	{$current_month|date_format:"%Y年%m月 "}の予定
	［{$smarty.session.myApp.name}］
<table border="1" align="center">
<tr>
	<th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th>
	<th>Thu</th><th>Fri</th><th>Sat</th>
</tr>
{foreach name=i from=$result|smarty:nodefaults item="item"}
	{if $smarty.foreach.i.iteration % 7 == 1}<tr>{/if}
	<td width="50" height="30" valign="top">
		<a href="{$base}/schedule/day/index/dat/{$item.timestamp}">{$item.day}</a>
			<br />
			{foreach from=$item.icon|smarty:nodefaults item="icon"}
				{if $icon.pic != ""}
					<img src="{$base}/img/{$icon.pic}"
						alt="{$item.cnam}" width="15" height="15" />
				{/if}
			{/foreach}
	</td>
	{if ($smarty.foreach.i.iteration) is div by 7}</tr>{/if}
{/foreach}
</table>
<br />
<div align="center">
	<form method="POST" action="{$base}/schedule/index/download">
	＜＜<a href="{$base}/schedule/index/index/num/{$current_num-1}">前の月へ</a>
	<input type="hidden" name="year" value="{$current_month|date_format:"%Y"}" />
	<input type="hidden" name="month" value="{$current_month|date_format:"%m"}" />
	<input type="submit" name="dl" value="ダウンロード" />
	<input type="button" value="ログアウト"
		onclick="location.href='{$base}/auth/logout'" />
	<a href="{$base}/schedule/index/index/num/{$current_num+1}">次の月へ</a>＞＞
	</form>
</div>
