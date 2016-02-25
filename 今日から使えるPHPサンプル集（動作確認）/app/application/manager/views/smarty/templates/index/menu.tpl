<ol>
	{foreach from=$menu|smarty:nodefaults item="datum"}
		<li>
			<a href="{$base}/{$datum.path}">{$datum.title}</a>
		</li>
	{/foreach}
	<li>
		<a href="{$base}/auth/logout">ログアウト</a>
	</li>
</ol>