<?php /* Smarty version 2.6.28, created on 2014-10-19 15:12:26
         compiled from index/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'index/index.tpl', 2, false),)), $this); ?>
<script type="text/javascript"
	src="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/TreeMenu.js"></script>
<?php echo '<style type="text/css">a{ color:#000033; }</style>'; ?>

<table border="0">
<tr>
<td bgcolor="#ccFFDD">
	<form method="POST" action="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/bbs/index/search">
		<span style="font-weight:bold;">記事検索：</span>
		<input type="text" name="keywd" size="20" />
		<input type="submit" value="検索" />
	</form>
	<div align="right">
	［<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/bbs/create/index">新規作成</a>］
	</div>
</td>
</tr>
</table>
<p><?php echo $this->_tpl_vars['result']; ?>
</p>
<div align="center"><?php echo $this->_tpl_vars['pager']; ?>
</div>