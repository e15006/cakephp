<?php
require_once APP.'/bm/models/Bookmark.class.php';

class Bm_SubmitController extends Zend_Controller_Action {
	public function indexAction() {
		$s = new MySmarty();
		$req = $this->getRequest();
		$s->assign('title', urldecode($req->getQuery('title')));
		$s->assign('url', urldecode($req->getQuery('url')));
		$s->simpleDisplay($req);
	}

	public function processAction() {
		$s = new MySmarty();
		$req = $this->getRequest();
		$c = new CheckUtil();
		$c->requiredCheck($req->getPost('title'), 'タイトル');
		$c->lengthCheck($req->getPost('title'), 50, 'タイトル');
		$c->requiredCheck($req->getPost('url'), 'URL');
		$c->lengthCheck($req->getPost('url'), 255, 'URL');
		$c->regExCheck($req->getPost('url'), '`[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]`i', 'URL');
		$c->lengthCheck($req->getPost('comment'), 120, 'コメント');
		$c->showResult();
		$bm = new Bookmark();
		$bm->setBookmarkInfo($req->getPost());
		$this->_redirect('/bm/index/index');
	}
}
