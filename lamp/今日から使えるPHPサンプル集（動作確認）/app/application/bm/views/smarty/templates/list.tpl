<dl>
{foreach from=$result|smarty:nodefaults item="item"}
	<dt>
		<a href="{$item.url}">{$item.title}</a>
	</dt>
	<dd>
		{$item.c} user &nbsp;&nbsp;
		{$item.updated|date_format:"%Y年 %m月 %d日 "}
		<small>
		{foreach from=`$item.tags` item="tag"}
			<a href="{$base}/bm/cloud/index/tag/{$tag|escape:"url"}">{$tag}</a>&nbsp;
		{/foreach}
		<br /><span style="font-style:italic">{$item.comment}</span>
		</small>
	</dd>
{/foreach}
</dl>