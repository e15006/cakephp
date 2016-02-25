<?php
require_once APP.'/bbs/models/Article.class.php';

class Bbs_IndexController extends Zend_Controller_Action{
	public function indexAction(){
		$s = new MySmarty();
		$req = $this->getRequest();
		if($req->getUserParam('page') == NULL) {
			$page = 1;
		} else {
			$page = $req->getUserParam('page');
		}
		$start = ($page - 1) * 5;
		$at = new Article();
		$result = $at->getTopArticles($start, 5, $req->getBaseUrl());
		$pager = $at->getPager($page, $req->getBaseUrl());
		$s->assign('result', $result);
		$s->assign('page', $page);
		$s->assign('pager', $pager);
		$s->simpleDisplay($req);
	}

	public function searchAction(){
		$s = new MySmarty();
		$req = $this->getRequest();
		$at = new Article();
		$result = $at->getInfoByKeyword($req->getPost('keywd'));
		$s->assign('result', $result);
		$s->simpleDisplay($req);
	}
}
