<?php
require_once APP.'/bbs/models/Article.class.php';

class Bbs_CreateController extends Zend_Controller_Action {
	public function indexAction(){
		$s = new MySmarty();
		$req = $this->getRequest();
		$s->simpleDisplay($this->getRequest());
	}

	public function processAction(){
		$req = $this->getRequest();
		$c = new CheckUtil();
		$c->requiredCheck($req->getPost('title'), '件名');
		$c->lengthCheck($req->getPost('title'), 25, '件名');
		$c->requiredCheck($req->getPost('nam'), '投稿者名');
		$c->lengthCheck($req->getPost('nam'), 10, '投稿者名');
		$c->requiredCheck($req->getPost('article'), '本文');
		$c->requiredCheck($req->getPost('passwd'), '削除用パスワード');
		$c->lengthCheck($req->getPost('passwd'), 15, '削除用パスワード');
		$c->showResult();
		$at = new Article();
		$at->setInfo($req->getPost());
		$this->_redirect('/bbs/index/index');
	}
}
