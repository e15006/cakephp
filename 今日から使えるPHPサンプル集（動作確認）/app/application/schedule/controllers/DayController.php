<?php
require_once APP.'/schedule/models/Schedule.class.php';

class Schedule_DayController extends Zend_Controller_Action {
	public function indexAction() {
		$s = new MySmarty();
		$req = $this->getRequest();
		$dat = $req->getUserParam('dat');
		$sche = new Schedule();
		$result = $sche->getInfoByDay($dat);
		$s->assign('result', $result);
		$s->assign('dat', $dat);
		$s->assign('categories', $sche->getCategories());
		$s->simpleDisplay($req);
	}

	public function processAction() {
		$s = new MySmarty();
		$sche = new Schedule();
		$req = $this->getRequest();
		$dat = $req->getUserParam('dat');
		$bTim = $req->getPost('bTim_Hour').':'.$req->getPost('bTim_Minute');
		$eTim = $req->getPost('eTim_Hour').':'.$req->getPost('eTim_Minute');
		if($req->getPost('submit') != NULL){
			$c = new CheckUtil();
			$c->requiredCheck($req->getPost('pNam'), '予定');
			$c->lengthCheck($req->getPost('pNam'), 50, '予定');
			$c->lengthCheck($req->getPost('memo'), 255, 'メモ');
			$c->compareCheck($bTim, $eTim, '開始時刻', '終了時刻');
			$c->showResult();
			$sche->updateInfo($req->getPost());
			$this->_redirect('/schedule/day/index/dat/'.$dat);
		} else {
			$result = $sche->getMemberInfo(date('Y-m-d', $dat), $bTim, $eTim);
			$s->assign('bTim', $bTim);
			$s->assign('eTim', $eTim);
			$s->assign('result', $result);
			$s->simpleDisplay($req);
		}
	}

	public function deleteAction(){
		$s = new MySmarty();
		$req = $this->getRequest();
		$dat = $req->getUserParam('dat');
		$sche = new Schedule();
		$sche->deleteInfo($req->getUserParam('pid'));
		$this->_redirect('/schedule/day/index/dat/'.$dat);
	}
}
