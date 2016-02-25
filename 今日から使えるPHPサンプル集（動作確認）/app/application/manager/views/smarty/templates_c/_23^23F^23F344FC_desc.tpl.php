<?php /* Smarty version 2.6.28, created on 2014-10-19 01:45:14
         compiled from search/desc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'search/desc.tpl', 3, false),)), $this); ?>
<html>
<head>
<title>備品管理データベース［<?php echo ((is_array($_tmp=$_SESSION['myApp']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
］</title>
</head>
<body>
<h1 style="color:white;background-color:#525D76;font-size:22px;">
	備品付随情報</h1>
<?php if (((is_array($_tmp=$this->_tpl_vars['result'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')) == ''): ?>
該当する情報はありません
<?php else: ?>
	<table border="0">
	<tr>
		<th align="right" bgcolor="#00ccff">備品コード</th>
		<td bgcolor="#ffffcc"><?php echo ((is_array($_tmp=$this->_tpl_vars['result']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
	</tr><tr>
		<th align="right" bgcolor="#00ccff">IPアドレス</th>
		<td bgcolor="#ffffcc"><?php echo ((is_array($_tmp=$this->_tpl_vars['result']['ip'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
	</tr><tr>
		<th align="right" bgcolor="#00ccff">プロダクトNo.</th>
		<td bgcolor="#ffffcc"><?php echo ((is_array($_tmp=$this->_tpl_vars['result']['pnum'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
	</tr><tr>
		<th align="right" bgcolor="#00ccff">搭載メモリ</th>
		<td bgcolor="#ffffcc"><?php echo ((is_array($_tmp=$this->_tpl_vars['result']['memory'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
MB</td>
	</tr><tr>
		<th align="right" bgcolor="#00ccff">搭載HDD</th>
		<td bgcolor="#ffffcc"><?php echo ((is_array($_tmp=$this->_tpl_vars['result']['hdd'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
GB</td>
	</tr><tr>
		<th align="right" bgcolor="#00ccff">備考</th>
		<td bgcolor="#ffffcc"><?php echo ((is_array($_tmp=$this->_tpl_vars['result']['mem'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
	</table>
<?php endif; ?>
<form>
	<input type="button" value="閉じる" onclick="self.close();" />
</form>
</body>
</html>