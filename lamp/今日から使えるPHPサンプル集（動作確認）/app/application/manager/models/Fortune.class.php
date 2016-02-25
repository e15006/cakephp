<?php
class Fortune {
	private $_db;

	public function __construct() {
		$this->_db = DbManager::getConnection();
	}

	public function __destruct(){
		$this->_db->closeConnection();
	}

	public function setInfo($data) {
		$this->_db->insert('mng_master',
			array(
				'id'     => $data['id'],
				'nam'    => $data['nam'],
				'fnum'   => $data['fnum'],
				'depart' => $data['depart'],
				'plac'   => $data['plac'],
				'dat'    => $data['dat'],
				'mem'    => $data['mem']
			)
		);
	}

	public function getInfos($data) {
		$sel = $this->_db->select();
		$sel->from('mng_master')->order('id');
		if($data['id'] != ''){ $sel->where('id=?', $data['id']); }
		if($data['fnum'] != ''){ $sel->where('fnum=?', $data['fnum']); }
		if($data['depart'] != ''){ $sel->where('depart=?', $data['depart']); }
		$rs = $this->_db->query($sel);
		return $rs->fetchAll();
	}

	public function getInfosByDepart($roles, $depart) {
		$sel = $this->_db->select();
		$sel->from('mng_master')->order('id');
		if($roles != 'admin') { $sel->where('depart=?', $depart); }
		$rs = $this->_db->query($sel);
		return $rs->fetchAll();
	}

	public function getInfo($id){
		return $this->_db->fetchRow('SELECT * FROM mng_pmaster WHERE id=?', $id);
	}

	public function updateInfo($data) {
		$stt = $this->_db->prepare('UPDATE mng_master SET depart=:depart, dat=:dat, plac=:plac, mem=:mem WHERE id=:id');
		for($i = 0; $i < count($data); $i++) {
			$stt->bindValue(':depart', $data[$i]['depart']);
			$stt->bindValue(':dat', $data[$i]['dat']);
			$stt->bindValue(':plac', $data[$i]['plac']);
			$stt->bindValue(':mem', $data[$i]['mem']);
			$stt->bindValue(':id', $data[$i]['id']);
			$stt->execute();
		}
	}

	public function deleteInfo($data) {
		$stt = $this->_db->prepare('DELETE FROM mng_master WHERE id=:id');
		for($i = 0; $i < count($data); $i++) {
			$stt->bindValue(':id', $data[$i]);
			$stt->execute();
		}
	}
}
