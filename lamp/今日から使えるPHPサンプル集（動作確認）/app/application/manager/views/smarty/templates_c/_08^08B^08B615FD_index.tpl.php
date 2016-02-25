<?php /* Smarty version 2.6.28, created on 2014-10-19 01:44:27
         compiled from search/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'search/index.tpl', 1, false),array('function', 'html_options', 'search/index.tpl', 18, false),)), $this); ?>
<img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/img/cd.gif"
	width="25" height="25" />
備品管理データベース［<?php echo ((is_array($_tmp=$_SESSION['myApp']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
］
<form method="POST"
	action="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/manager/search/process">
<table border="0">
<tr>
	<th>備品コード：</th>
	<td><input type="text" name="id" size="15" maxlength="10"
		style="ime-mode:disabled;" /></td>
</tr><tr>
	<th>型番：</th>
	<td><input type="text" name="fnum" size="20" maxlength="50"
		style="ime-mode:disabled;" /></td>
</tr><tr>
	<th>保管責任部門：</th>
	<td>
		<?php echo smarty_function_html_options(array('name' => 'depart','values' => ((is_array($_tmp=$this->_tpl_vars['departs'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')),'output' => ((is_array($_tmp=$this->_tpl_vars['departs'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>

	</td>
</tr><tr>
	<td colspan="2" align="center">
		<input type="submit" name="sbm" value="情報検索" />
		<input type="reset" value="取消" />
	</td>
</tr>
</table>
</form>