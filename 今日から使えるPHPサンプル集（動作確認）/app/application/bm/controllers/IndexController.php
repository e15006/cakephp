<?php
require_once APP.'/bm/models/Bookmark.class.php';

class Bm_IndexController extends Zend_Controller_Action{
	public function indexAction(){
		$s = new MySmarty();
		$req = $this->getRequest();
		$flag = (($req->getUserParam('mode') == 'my') ? FALSE : TRUE);
		$bm = new Bookmark();
		$result = $bm->getBookmarks($flag);
		$s->assign('result', $result);
		$s->simpleDisplay($req);
	}
}
