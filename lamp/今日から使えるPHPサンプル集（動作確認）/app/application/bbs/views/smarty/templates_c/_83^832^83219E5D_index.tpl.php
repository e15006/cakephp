<?php /* Smarty version 2.6.28, created on 2014-10-19 15:13:01
         compiled from show/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'show/index.tpl', 4, false),array('modifier', 'date_format', 'show/index.tpl', 12, false),)), $this); ?>
<table border="1" width="500" cellpadding="5">
<tr>
	<th align="right" width="80" height="15">タイトル</th>
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['result']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
：<?php echo ((is_array($_tmp=$this->_tpl_vars['result']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
</tr>
<tr>
	<th align="right" width="80" height="15">投稿者</th>
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['result']['nam'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
</tr>
<tr>
	<th align="right" width="80" height="15">投稿日時</th>
	<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['result']['sdat'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y年 %m月 %d日 %H時 %M分 %S秒 ") : smarty_modifier_date_format($_tmp, "%Y年 %m月 %d日 %H時 %M分 %S秒 ")); ?>
</td>
</tr>
<tr>
<td colspan="2" height="300" valign="top"><?php echo $this->_tpl_vars['result']['article']; ?>
</td>
</tr>
</table>
<form>
	<input type="button" value="記事に返信" onclick="location.href='<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/bbs/response/index/id/<?php echo ((is_array($_tmp=$this->_tpl_vars['result']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'" />
	<input type="button" value="記事を削除" onclick="location.href='<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/bbs/delete/index/id/<?php echo ((is_array($_tmp=$this->_tpl_vars['result']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'" />
</form>