<?php
require_once APP.'/manager/models/Fortune.class.php';

class Manager_CreateController extends Zend_Controller_Action {
	public function indexAction() {
		$s = new MySmarty();
		$s->assign('departs', array('総務', '資材', '技術', '製造', 'システム'));
		$s->simpleDisplay($this->getRequest());
	}

	public function processAction() {
		$req = $this->getRequest();
		$c = new CheckUtil();
		$c->requiredCheck($req->getPost('id'), '備品コード');
		$c->lengthCheck($req->getPost('id'), 10, '備品コード');
		$c->regExCheck($req->getPost('id'), '/^[0-9]{3}-[0-9A-Z]{6}$/i', '備品コード');
		$c->duplicateCheck($req->getPost('id'), 'SELECT * FROM mng_master WHERE id=:value', '備品コード');
		$c->lengthCheck($req->getPost('nam'), 25, '品名');
		$c->lengthCheck($req->getPost('fnum'), 50, '型番');
		$c->requiredCheck($req->getPost('depart'), '設置場所');
		$c->lengthCheck($req->getPost('plac'), 25, '設置場所');
		$c->requiredCheck($req->getPost('dat'), '取得年月日');
		$c->dateTypeCheck($req->getPost('dat'), '取得年月日');
		$c->lengthCheck($req->getPost('mem'), 255, '備考');
		$c->showResult();
		$fn = new Fortune();
		$fn->setInfo($req->getPost());
		$this->_redirect('/manager/create/');
	}
}
