<?php /* Smarty version 2.6.28, created on 2014-10-19 01:49:57
         compiled from create/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'create/index.tpl', 21, false),array('function', 'html_options', 'create/index.tpl', 45, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
<!--
function chk(){
	var c = new CheckUtil();
	c.requiredCheck(document.fm.id.value, \'備品コード\');
	c.lengthCheck(document.fm.id.value,10, \'備品コード\');
	c.regExCheck(document.fm.id.value,\'^[0-9]{3}-[0-9A-Z]{6}$\', \'備品コード\');
	c.lengthCheck(document.fm.nam.value, 25, \'品名\');
	c.lengthCheck(document.fm.fnum.value, 50, \'型番\');
	c.requiredCheck(document.fm.plac.value, \'設置場所\');
	c.lengthCheck(document.fm.plac.value, 25, \'設置場所\');
	c.requiredCheck(document.fm.dat.value, \'取得年月日\');
	c.dateTypeCheck(document.fm.dat.value, \'取得年月日\');
	c.lengthCheck(document.fm.mem.value, 255, \'備考\');
	return c.getErrors();
}
//-->
</script>
'; ?>

<img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/img/cd.gif"
	width="25" height="25" />
備品管理データベース［<?php echo ((is_array($_tmp=$_SESSION['myApp']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
］
<form method="POST" name="fm" onsubmit="return chk()"
	action="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/manager/create/process">
<table border="0">
	<tr>
		<th align="right">備品コード：</th>
		<td>
			<input type="text" name="id" size="12" maxlength="10"
				style="ime-mode:disabled;" /></td>
	</tr><tr>
		<th align="right">品名：</th>
		<td>
			<input type="text" name="nam" size="20" maxlength="25"
				style="ime-mode:active;" /></td>
	</tr><tr>
		<th align="right">型番：</th>
		<td>
			<input type="text" name="fnum" size="15" maxlength="50"
				style="ime-mode:disabled;" /></td>
	</tr><tr>
		<th align="right">保管責任部門：</th>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'depart','values' => ((is_array($_tmp=$this->_tpl_vars['departs'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')),'output' => ((is_array($_tmp=$this->_tpl_vars['departs'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>

		</td>
	</tr><tr>
		<th align="right">設置場所：</th>
		<td>
			<input type="text" name="plac" size="35" maxlength="15"
				style="ime-mode:active;" /></td>
		</td>
	</tr><tr>
		<th align="right">取得年月日：</th>
		<td>
			<input type="text" name="dat" size="15" maxlength="10"
				style="ime-mode:active;" />（YYYY-MM-DD）</td>
	</tr><tr>
		<th align="right">備考：</th>
		<td>
			<input type="text" name="mem" size="50" maxlength="255"
				style="ime-mode:active;" /></td>
		</td>
	</tr><tr>
		<td colspan="2" align="center">
			<input type="submit" name="sbm" value="新規登録" />
			<input type="reset" value="取消" />
		</td>
	</tr>
</table>
</form>