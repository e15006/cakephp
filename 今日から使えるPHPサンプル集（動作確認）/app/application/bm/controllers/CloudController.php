<?php
require_once APP.'/bm/models/Bookmark.class.php';

class Bm_CloudController extends Zend_Controller_Action {
	public function indexAction() {
		$s = new MySmarty();
		$req = $this->getRequest();
		$tag = urldecode($req->getUserParam('tag'));
		$tag = (($tag == NULL) ? 'PHP' : $tag);
		$bm = new Bookmark();
		$result = $bm->getBookmarksByTag($tag);
		$cloud = $bm->getTagcloud($req->getBaseUrl());
		$s->assign('result', $result);
		$s->assign('cloud', $cloud);
		$s->simpleDisplay($req);
	}
}
