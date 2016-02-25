<?php /* Smarty version 2.6.28, created on 2014-10-19 00:45:55
         compiled from auth/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'auth/index.tpl', 3, false),)), $this); ?>
<h1 style="color:white;background-color:#525D76;font-size:22px;">
	アプリケーション・ログイン</h1>
<form method="POST" action="<?php echo ((is_array($_tmp=$this->_tpl_vars['base'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
/auth/process">
<table border="0" align="center">
	<tr>
		<th align="right">ユーザ名：</th>
		<td><input type="text" name="uid" size="10" maxlength="15" /></td>
	</tr><tr>
		<th align="right">パスワード：</th>
		<td><input type="password" name="passwd" size="10" maxlength="15" /></td>
	</tr><tr>
		<td rowspan="2"><input type="submit" name="submit" value="ログイン" /></td>
	</tr>
</table>
</form>