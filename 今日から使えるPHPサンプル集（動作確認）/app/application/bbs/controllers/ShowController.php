<?php
require_once APP.'/bbs/models/Article.class.php';

class Bbs_ShowController extends Zend_Controller_Action{
	public function indexAction(){
		$s = new MySmarty();
		$req = $this->getRequest();
		$at = new Article();
		$result = $at->getInfoById($req->getUserParam('id'));
		$s->assign('result', $result);
		$s->simpleDisplay($req);
	}
}
