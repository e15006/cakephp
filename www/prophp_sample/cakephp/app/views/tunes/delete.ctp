<div id="navdiv">
<form class="formnav" method="post" action="/cake/users/logout">
<input type="submit" value="ログアウト">
</form>
</div>
<h2>曲の削除</h2>
<div class="message">以下の曲を削除します、よろしいですか？</div>
<table class="tunetbl">
<tr class="tunetbltr"><th class="column-1">曲名</th><td>
<?php echo h($this->data['Tune']['name']); ?>
</td></tr>
<tr class="tunetbltr"><th>アーティスト</th><td>
<?php echo h($this->data['Artist']['name']); ?>
</td></tr>
<tr class="tunetbltr"><th>気持ち</th><td>
<?php echo h($this->data['Feeling']['name']); ?>
</td></tr>
<tr class="tunetbltr"><th>コメント</th><td>
<?php echo nl2br(h($this->data['Tune']['comcont'])); ?>
</td></tr>
</table>
<?php
echo $this->Form->create();
echo $this->Form->input('id');
echo $this->Form->end('削除');
?>
