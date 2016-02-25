<?php /* Smarty version 2.6.28, created on 2014-10-19 01:44:37
         compiled from search/process.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'search/process.tpl', 1, false),array('function', 'cycle', 'search/process.tpl', 19, false),array('function', 'getPaging', 'search/process.tpl', 34, false),)), $this); ?>
<img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/img/cd.gif"
	width="25" height="25" />
備品管理データベース［<?php echo ((is_array($_tmp=$_SESSION['myApp']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
］<br />
<?php echo ((is_array($_tmp=$this->_tpl_vars['result_number'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
件のデータが検索されました。
<table border="0">
	<tr bgcolor="#00ccff">
		<?php $_from = $this->_tpl_vars['columnSet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['col']):
        $this->_foreach['loop']['iteration']++;
?>
			<th <?php echo ((is_array($_tmp=$this->_tpl_vars['col']['attributes'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

				<?php if (((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')) == 1 || ((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')) == 5): ?>rowspan="2"<?php endif; ?>>
				<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/manager/search/process<?php echo $this->_tpl_vars['col']['link']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['col']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a>
			</th>
			<?php if (!(((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')) % 5)): ?>
				</tr><tr bgcolor="#00ccff"><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<th></th>
	</tr>
	<?php $_from = $this->_tpl_vars['recordSet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
		<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#FFffCC,#EEeeAA",'name' => 'f'), $this);?>
">
			<?php $_from = $this->_tpl_vars['row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['c'] => $this->_tpl_vars['col']):
        $this->_foreach['loop']['iteration']++;
?>
				<td <?php echo ((is_array($_tmp=$this->_tpl_vars['columnSet'][($this->_foreach['c']['iteration']-1)]['attributes'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

					<?php if (((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')) == 1 || ((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')) == 5): ?>rowspan="2"<?php endif; ?>>
					<?php if (((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')) == 1): ?><?php echo $this->_tpl_vars['col']; ?>
<?php endif; ?>
					<?php if (((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')) != 1): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['col'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<?php endif; ?>
				</td>
				<?php if (!(((is_array($_tmp=$this->_foreach['loop']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')) % 5)): ?>
					</tr><tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#FFffCC,#EEeeAA",'name' => 's'), $this);?>
"><?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<td></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php echo $this->_plugins['function']['getPaging'][0][0]->smartyGetPaging(array('prevImg' => "&lt;",'nextImg' => "&gt;",'separator' => "｜",'delta' => '10','path' => ($this->_tpl_vars['base'])."/manager/search/process"), $this);?>
