<div id="navdiv">
<form class="formnav" method="post" action="/cake/users/logout">
<input type="submit" value="ログアウト">
</form>
</div>
<h2>曲の検索</h2>
<?php
echo $this->Form->create();
echo $this->Form->input('name', array('label' => '曲名', 'size' => 30, 'maxlength' => 20));
echo $this->Form->input('artist_id', array('label' => 'アーティスト'));
echo $this->Form->input('feeling_id', array('label' => '気持ち'));
echo $this->Form->end('検索');
?>
<div id="navlink">
<?php echo $this->Html->link('曲の追加', array('action' => 'add'));?>
</div>
<table class="tunetbl"><tr>
<th class="column-1">ID</th>
<th class="column-2">曲名</th>
<th class="column-3">アーティスト</th>
<th class="column-4">気持ち</th>
<th class="column-5">コメント</th>
<th class="column-6">操作</th></tr>
<?php
foreach($tunes as $tune){
	$link = $this->Html->link('編集', array('action' => 'edit', $tune['Tune']['id']))
		. '&nbsp;' . $this->Html->link('削除', array('action' => 'delete', $tune['Tune']['id']));

	echo $this->Html->tableCells(array(
		h($tune['Tune']['id']),
		h($tune['Tune']['name']),
		h($tune['Artist']['name']),
		h($tune['Feeling']['name']),
		($tune['Tune']['comcont'] ? 'あり' : 'なし'),
		$link), null, null, true);
}
?>
</table>
