<?php
class Menu {
	private $_db;

	public function __construct() {
		$this->_db = DbManager::getConnection();
	}

	public function __destruct(){
		$this->_db->closeConnection();
	}

	public function getMenu($my) {
		$result = array();
		$stt = $this->_db->prepare("SELECT CONCAT_WS('/', module, controller, action) AS path, title, roles FROM metadata WHERE module='manager' AND action='index' ORDER BY controller ASC");
		$stt->execute();
		while($row = $stt->fetch()){
			$flag = FALSE;
			$roles = explode(',', $row['roles']);
			foreach($roles as $role) {
				if(trim($my) == trim($role)) { $flag = TRUE; }
			}
			if($flag || $row['roles'] == ''){
				$result[] = array('path' => $row['path'], 'title' => $row['title']);
			}
		}
		return $result;
	}
}