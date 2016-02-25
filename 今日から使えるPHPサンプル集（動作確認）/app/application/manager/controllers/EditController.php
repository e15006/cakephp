<?php
require_once APP.'/manager/models/Fortune.class.php';

class Manager_EditController extends Zend_Controller_Action {
	public function indexAction() {
		$s = new MySmarty();
		$s->assign('departs', array('総務', '資材', '技術', '製造', 'システム'));
		$sess = new Zend_Session_Namespace('myApp');
		$fn = new Fortune();
		$result = $fn->getInfosByDepart($sess->roles, $sess->depart);
		$s->assign('result', $result);
		$s->simpleDisplay($this->getRequest());
	}

	public function processAction() {
		$req = $this->getRequest();
		$update = array();
		$delete = array();
		for($i=1; $i <= $req->getPost('cnt'); $i++){
			switch($req->getPost('mid'.$i)){
				case 'up' :
					$update[] = array(
						'id' => $req->getPost('id'.$i),
						'depart' => $req->getPost('depart'.$i),
						'dat' => $req->getPost('dat'.$i),
						'plac' => $req->getPost('plac'.$i),
						'mem' => $req->getPost('mem'.$i)
					);
					break;
				case 'del' :
					$delete[] = $req->getPost('id'.$i);
					break;
			}
		}
		$c = new CheckUtil();
		for($i=0; $i < count($update); $i++){
			$c->requiredCheck($update[$i]['plac'], '設置場所');
			$c->lengthCheck($update[$i]['plac'], 25, '設置場所');
			$c->requiredCheck($update[$i]['dat'], '取得年月日');
			$c->dateTypeCheck($update[$i]['dat'], '取得年月日');
			$c->lengthCheck($update[$i]['mem'], 255, '備考');
		}
		$c->showResult();
		$fn = new Fortune();
		$fn->updateInfo($update);
		$fn->deleteInfo($delete);
		$this->_redirect('/manager/edit/');
	}
}
