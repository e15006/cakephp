<?php
require_once APP.'/manager/models/Menu.class.php';

class Manager_IndexController extends Zend_Controller_Action {
	public function menuAction() {
		$sess = new Zend_Session_Namespace('myApp');
		$s = new MySmarty();
		$mn = new Menu();
		$s->assign('menu', $mn->getMenu($sess->roles));
		$s->simpleDisplay($this->getRequest());
	}
}
