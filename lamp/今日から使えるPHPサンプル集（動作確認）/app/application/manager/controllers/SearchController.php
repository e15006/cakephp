<?php
require_once 'Structures/DataGrid.php';
require_once APP.'/manager/models/Fortune.class.php';

function createLink($params, $data) {
	return "<a href=\"JavaScript:void(0)\" onclick=\"window.open('".$data['base']."/manager/search/desc/id/".$params['record']['id']."','','width=250,height=250')\">".$params['record']['id']."</a>";
}

class Manager_SearchController extends Zend_Controller_Action {
	public function indexAction() {
		$s = new MySmarty();
		$s->assign('departs', array('総務', '資材', '技術', '製造', 'システム'));
		$s->simpleDisplay($this->getRequest());
	}

	public function processAction() {
		$req = $this->getRequest();
		$sess = new Zend_Session_Namespace('myApp');
		if($req->getServer('REQUEST_METHOD') == 'POST') {
			$sess->condition = $req->getPost();
		}
		$s = new MySmarty();
		$fn = new Fortune();
		$result = $fn->getInfos($sess->condition);
		$s->assign('result_number', count($result));

		$grid = new Structures_DataGrid(10);
		$res = $grid->bind($result, array(), 'Array');
		$c_id = new Structures_DataGrid_Column('備品コード', 'id', 'id');
		$c_id->setFormatter('createLink()', array('base' => $req->getBaseUrl()));
		$c_nam = new Structures_DataGrid_Column('品名', 'nam', 'nam');
		$c_depart = new Structures_DataGrid_Column('部門', 'depart', 'depart');
		$c_dat = new Structures_DataGrid_Column('取得年月日', 'dat', 'dat');
		$c_mem = new Structures_DataGrid_Column('備考', 'mem', 'mem');
		$c_fnum = new Structures_DataGrid_Column('型番', 'fnum', 'fnum');
		$c_plac = new Structures_DataGrid_Column('設置場所', 'plac', 'plac');
		$grid->addColumn($c_id);
		$grid->addColumn($c_nam);
		$grid->addColumn($c_depart);
		$grid->addColumn($c_dat);
		$grid->addColumn($c_mem);
		$grid->addColumn($c_fnum);
		$grid->addColumn($c_plac);
		$grid->fill($s);
		$s->simpleDisplay($this->getRequest());
	}

	public function descAction(){
		$s = new MySmarty();
		$req = $this->getRequest();
		$fn = new Fortune();
		$result = $fn->getInfo($req->getUserParam('id'));
		$s->assign('result', $result);
		$s->simpleDisplay($this->getRequest(), '');
	}
}
