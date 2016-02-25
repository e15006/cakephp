<?php
require_once APP.'/bbs/models/Article.class.php';

class Bbs_DeleteController extends Zend_Controller_Action{
	public function indexAction(){
		$s = new MySmarty();
		$req = $this->getRequest();
		$at = new Article();
		$result = $at->getInfoById($req->getUserParam('id'));
		$s->assign('result', $result);
		$s->simpleDisplay($req);
	}

	public function processAction() {
		$req = $this->getRequest();
		$c = new CheckUtil();
		$c->requiredCheck($req->getPost('passwd'), '削除用パスワード');
		$c->lengthCheck($req->getPost('passwd'), 15, '削除用パスワード');
		$at = new Article();
		$flag = $at->deleteInfo($req->getUserParam('id'), $req->getPost('passwd'));
		if(!$flag) { $c->setError('削除用パスワードが間違っています。'); }
		$c->showResult();
		$this->_redirect('/bbs/index/index');
	}
}
