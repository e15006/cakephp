<?php /* Smarty version 2.6.28, created on 2014-10-19 15:21:02
         compiled from response/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'response/index.tpl', 19, false),array('modifier', 'date_format', 'response/index.tpl', 34, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
<!--
function chk(){
	var c = new CheckUtil();
	c.requiredCheck(document.fm.title.value, "件名");
	c.lengthCheck(document.fm.title.value,25, "件名");
	c.requiredCheck(document.fm.nam.value, "投稿者名");
	c.lengthCheck(document.fm.nam.value,10, "投稿者名");
	c.requiredCheck(document.fm.article.value, "本文");
	c.requiredCheck(document.fm.passwd.value, "削除用パスワード");
	c.lengthCheck(document.fm.passwd.value, 15, "削除用パスワード");
	return c.getErrors();
}
//-->
</script>
'; ?>

<form method="POST" name="fm" onsubmit="return chk()"
	action="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/bbs/response/process/">
<input type="hidden" name="parent" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['result']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
<table border="1" width="500" cellpadding="5">
<tr>
	<th align="right" nowrap>件名</th>
	<td><input type="text" name="title" size="70" maxlength="25"
		value="Re:  <?php echo ((is_array($_tmp=$this->_tpl_vars['result']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" style="ime-mode:active;" /></td>
</tr>
<tr>
	<th align="right" nowrap>投稿者</th>
	<td><input type="text" name="nam" size="70" maxlength="10"
		style="ime-mode:active;" /></td>
</tr>
<tr>
	<th align="right" nowrap>投稿日時</th>
	<td><?php echo ((is_array($_tmp=((is_array($_tmp=time())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y年 %m月 %d日 %H時 %M分 %S秒 ") : smarty_modifier_date_format($_tmp, "%Y年 %m月 %d日 %H時 %M分 %S秒 ")); ?>
</td>
</tr>
<tr>
	<td colspan="2" valign="top">
		<textarea cols="70" rows="15" name="article"><?php echo $this->_tpl_vars['result']['article']; ?>
</textarea>
	</td>
</tr>
<tr>
	<th align="right" nowrap>削除用パスワード</th>
	<td><input type="password" name="passwd" size="15" maxlength="15"
		style="ime-mode:disabled;" /></td>
</tr>
</table>
<input type="submit" name="res" value="投稿" />
<input type="reset" value="取消" />
</form>