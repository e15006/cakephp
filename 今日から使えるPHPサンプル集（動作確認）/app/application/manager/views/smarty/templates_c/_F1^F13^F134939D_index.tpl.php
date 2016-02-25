<?php /* Smarty version 2.6.28, created on 2014-10-19 14:53:33
         compiled from edit/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'edit/index.tpl', 26, false),array('modifier', 'date_format', 'edit/index.tpl', 62, false),array('function', 'cycle', 'edit/index.tpl', 41, false),array('function', 'html_options', 'edit/index.tpl', 56, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
<!--
function chk1(part){
	var c = new CheckUtil();
	c.requiredCheck(part.value,"設置場所");
	c.lengthCheck(part.value,25,"設置場所");
	return c.getErrors();
}

function chk2(part){
	var c = new CheckUtil();
	c.requiredCheck(part.value,"取得年月日");
	c.dateTypeCheck(part.value,"取得年月日");
	return c.getErrors();
}

function chk3(part){
	var c = new CheckUtil();
	c.lengthCheck(part.value,255,"備考");
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
<form method="POST" name="fm"
	action="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/manager/edit/process">
<input type="submit" value="更新／削除" />
<input type="reset" value="取消" />
<table border="0">
<tr bgcolor="#00ccff">
	<th rowspan="2">処理区分</th><th rowspan="2">備品コード</th>
	<th>品名</th><th>部門</th><th>取得年月日</th>
</tr><tr bgcolor="#00ccff">
	<th>型番</th><th>設置場所</th><th>備考</th>
</tr>
<?php $_from = $this->_tpl_vars['result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['loop']['iteration']++;
?>
	<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#FFffCC,#EEeeAA",'name' => 'f'), $this);?>
">
		<td rowspan="2">
			<select name="mid<?php echo ((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
				<option value="">処理なし</option>
				<option value="up">情報更新</option>
				<option value="del">情報削除</option>
			</select>
		</td>
		<td rowspan="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

			<input type="hidden" name="id<?php echo ((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"
				value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
		</td><td>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['nam'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

		</td><td>
			<select name="depart<?php echo ((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
				<?php echo smarty_function_html_options(array('values' => ((is_array($_tmp=$this->_tpl_vars['departs'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')),'output' => ((is_array($_tmp=$this->_tpl_vars['departs'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')),'selected' => ((is_array($_tmp=$this->_tpl_vars['item']['depart'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>

			</select>
		</td><td>
			<input type="text" name="dat<?php echo ((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"
				size="15" maxlength="10"
				value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['dat'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
"
				style="ime-mode:disabled;" onchange="return chk2(this)" />
		</td>
	</tr>
	<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#FFffCC,#EEeeAA",'name' => 's'), $this);?>
">
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['fnum'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
		<td>
			<input type="text" name="plac<?php echo ((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"
				size="15" maxlength="15"
				value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['plac'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" style="ime-mode:active;"
				onchange="return chk1(this)" />
		</td><td>
			<textarea name="mem<?php echo ((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"
				cols="15" rows="1" style="ime-mode:active;"
				onchange="return chk3(this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['mem'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
		</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<input type="hidden" name="cnt" value="<?php echo ((is_array($_tmp=$this->_foreach['loop']['total'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
</form>