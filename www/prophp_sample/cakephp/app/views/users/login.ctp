<div id="navdiv">
<form class="formnav" method="post" action="/cake/tunes/">
<input type="submit" value="キモチ曲検索">
</form>
</div>
<h2>ログイン</h2>
<?php
echo $this->Session->flash('auth');
echo $this->Form->create();
echo $this->Form->input('username',
		array('label' => 'ユーザ名', 'size' => 15, 'maxlength' => 20));
echo $this->Form->input('password',
		array('label' => 'パスワード', 'size' => 15, 'maxlength' => 100));
echo $this->Form->end('ログイン');
?>
