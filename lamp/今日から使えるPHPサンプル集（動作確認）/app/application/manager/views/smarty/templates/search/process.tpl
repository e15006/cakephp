<img src="{$base}/img/cd.gif"
	width="25" height="25" />
備品管理データベース［{$smarty.session.myApp.name}］<br />
{$result_number}件のデータが検索されました。
<table border="0">
	<tr bgcolor="#00ccff">
		{foreach item=col from=$columnSet|smarty:nodefaults name="loop"}
			<th {$col.attributes}
				{if $smarty.foreach.loop.iteration == 1 ||
					$smarty.foreach.loop.iteration == 5}rowspan="2"{/if}>
				<a href="{$base}/manager/search/process{$col.link|smarty:nodefaults}">{$col.label}</a>
			</th>
			{if $smarty.foreach.loop.iteration is div by 5}
				</tr><tr bgcolor="#00ccff">{/if}
		{/foreach}
		<th></th>
	</tr>
	{foreach item=row from=$recordSet|smarty:nodefaults}
		<tr bgcolor="{cycle values="#FFffCC,#EEeeAA" name="f"}">
			{foreach item=col from=$row|smarty:nodefaults key="c" name="loop"}
				<td {$columnSet[$smarty.foreach.c.index].attributes}
					{if $smarty.foreach.loop.iteration == 1 ||
						$smarty.foreach.loop.iteration == 5}rowspan="2"{/if}>
					{if $smarty.foreach.loop.iteration == 1}{$col|smarty:nodefaults}{/if}
					{if $smarty.foreach.loop.iteration != 1}{$col}{/if}
				</td>
				{if $smarty.foreach.loop.iteration is div by 5}
					</tr><tr bgcolor="{cycle values="#FFffCC,#EEeeAA" name="s"}">{/if}
			{/foreach}
			<td></td>
		</tr>
	{/foreach}
</table>
{getPaging prevImg="&lt;" nextImg="&gt;" separator="｜" delta="10"
	path="`$base`/manager/search/process"}
