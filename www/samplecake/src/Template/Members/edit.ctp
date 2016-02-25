<div>
<h3>Edit </h3>
    <?= $this->Form->create($member) ?>
<fieldset>
    <legend><?= __('Edit Member') ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('mail');
    ?>
</fieldset>
<?= $this->Form->button('Submit') ?>
<?= $this->Form->end() ?>
</div>