<div id="navdiv">
<form class="formnav" method="post" action="/cake/users/logout">
<input type="submit" value="ログアウト">
</form>
</div>
<h2>曲の編集</h2>


    <?= $this->Form->create($tune) ?>
    <?php
            echo $this->Form->input('name', array('label' => '曲名', 'size' => 30, 'maxlength' => 20));
            echo $this->Form->input('artist_id', array('label' => 'アーティスト'));
            echo $this->Form->input('feeling_id', array('label' => '気持ち'));
            echo $this->Form->input('comcont', array('label' => 'コメント', 'cols' => 30, 'rows' => 3));
        ?>

    <?= $this->Form->Submit(__('保存')) ?>
    <?= $this->Form->end() ?>

