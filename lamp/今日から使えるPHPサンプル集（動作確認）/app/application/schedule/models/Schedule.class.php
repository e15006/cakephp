<?php
require_once 'Calendar/Month/Weekdays.php';

class Schedule {
	private $_db;

	public function __construct() {
		$this->_db = DbManager::getConnection();
	}

	public function __destruct(){
		$this->_db->closeConnection();
	}

	public function getCalendar($num) {
		$sess = new Zend_Session_Namespace('myApp');
		$result = array();
		$stt = $this->_db->prepare('SELECT sche_category.cnam, sche_category.pic FROM sche_category INNER JOIN sche_master ON sche_category.id = sche_master.cate WHERE sche_master.id=:id AND sche_master.pDat=:pDat GROUP BY sche_category.cnam');
		$cal = new Calendar_Month_Weekdays(date('Y'), date('m') + $num, 0);
		$cal->build();
		while($d = $cal->fetch()){
			if($d->isEmpty()){
				$result[] = '';
			} else {
				$stt->bindValue(':id', $sess->uid);
				$stt->bindValue(':pDat', date('Y-m-d', $d->getTimestamp()));
				$stt->execute();
				$result[] = array(
					'day' => $d->thisDay(),
					'timestamp' => $d->getTimestamp(),
					'icon' => $stt->fetchAll()
				);
			}
		}
		return $result;
	}

	public function getDetailsInfo($year, $month) {
		$sess = new Zend_Session_Namespace('myApp');
		$stt = $this->_db->prepare('SELECT * FROM sche_master WHERE pDat=:pDat AND id=:id ORDER BY bTim ASC');
		$stt->bindValue(':id', $sess->uid);
		$cal = new Calendar_Month_Weekdays($year, $month, 0);
		$cal->build();
		$result = array(NULL);
		while($d = $cal->fetch()){
			if(!$d->isEmpty()){
				$stt->bindValue(':pDat', date('Y-m-d', $d->getTimestamp()));
				$stt->execute();
				$result[] = $stt->fetchAll();
			}
		}
		return $result;
	}

	public function getInfoByDay($ts) {
		$sess = new Zend_Session_Namespace('myApp');
		$stt = $this->_db->prepare('SELECT sche_master.pid, sche_master.id, sche_master.pDat, sche_master.bTim, sche_master.eTim, sche_master.pNam, sche_category.cnam, sche_master.memo FROM sche_master INNER JOIN sche_category ON sche_master.cate = sche_category.id WHERE sche_master.id=:id AND sche_master.pDat=:pDat ORDER BY sche_master.bTim ASC');
		$stt->BindValue(':id', $sess->uid);
		$stt->BindValue(':pDat', date('Y-m-d', $ts));
		$stt->execute();
		return $stt->fetchAll();
	}

	public function getCategories() {
		return $this->_db->fetchPairs('SELECT id, cnam FROM sche_category ORDER BY id');
	}

	public function getMemberInfo($pDat, $bTim, $eTim) {
		$stt = $this->_db->prepare('SELECT id, pid, pDat, bTim, eTim, pNam, cate FROM sche_master WHERE ((bTim>=:bTim AND bTim<=:eTim) OR (eTim>=:bTim AND eTim<=:eTim) OR (bTim<=:bTim AND eTim>=:eTim)) AND pDat=:pDat');
		$stt->bindValue(':bTim', $bTim);
		$stt->bindValue(':eTim', $eTim);
		$stt->bindValue(':pDat', $pDat);
		$stt->execute();
		return $stt->fetchAll();
	}

	public function updateInfo($data) {
		$sess = new Zend_Session_Namespace('myApp');
		$stt = $this->_db->prepare('INSERT INTO sche_master(id, pDat, bTim, eTim, pNam, cate, memo) VALUES(:id, :pDat, :bTim, :eTim, :pNam, :cate, :memo)');
		$stt->bindValue(':id', $sess->uid);
		$stt->bindValue(':pDat', $data['pDat']);
		$stt->bindValue(':bTim', $data['bTim_Hour'].':'.$data['bTim_Minute']);
		$stt->bindValue(':eTim', $data['eTim_Hour'].':'.$data['eTim_Minute']);
		$stt->bindValue(':pNam', $data['pNam']);
		$stt->bindValue(':cate', $data['cate']);
		$stt->bindValue(':memo', $data['memo']);
		$stt->execute();
	}

	public function deleteInfo($pid) {
		$stt = $this->_db->prepare('DELETE FROM sche_master WHERE pid=:pid');
		$stt->bindValue(':pid', $pid);
		$stt->execute();
	}
}