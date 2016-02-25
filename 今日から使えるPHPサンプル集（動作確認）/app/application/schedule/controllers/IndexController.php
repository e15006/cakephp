<?php
require_once APP.'/schedule/models/Schedule.class.php';

class Schedule_IndexController extends Zend_Controller_Action{
	public function indexAction(){
		$s = new MySmarty();
		$req = $this->getRequest();
		$num = $req->getUserParam('num');
		if($num == NULL){ $num = 0; }
		$sche = new Schedule();
		$result = $sche->getCalendar($num);
		$s->assign('current_num', $num);
		$s->assign('current_month',
			mktime(0, 0, 0, date('m') + $num, 1, date('Y')));
		$s->assign('result', $result);
		$s->simpleDisplay($req);
	}

	public function downloadAction(){
		$this->getResponse()->setHeader('Content-Type', 'application/vnd.ms-excel');
		$s = new MySmarty();
		$req = $this->getRequest();
		$sche = new Schedule();
		$result = $sche->getDetailsInfo(
			$req->getPost('year'), $req->getPost('month'));
		$s->assign('result', $result);
		$s->simpleDisplay($req , '');
	}
}
