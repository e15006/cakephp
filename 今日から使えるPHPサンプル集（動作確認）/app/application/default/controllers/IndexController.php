<?php
class IndexController extends Zend_Controller_Action {
	public function indexAction() {
		$s = new MySmarty();
		$s->simpleDisplay($this->getRequest());
	}

	public function dummyAction(){
		throw new Exception('ページでエラーが発生しました。');
	}
}
