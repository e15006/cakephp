<?php
require_once 'Zend/Auth/Adapter/DbTable.php';

class AuthController extends Zend_Controller_Action{
	public function indexAction(){
		$s = new MySmarty();
		$s->simpleDisplay($this->getRequest());
	}

	public function processAction(){
		$req = $this->getRequest();
		$db = DbManager::getConnection();
		$auth = new Zend_Auth_Adapter_DbTable($db, 'user', 'uid', 'passwd', 'md5(?)');
		$auth->setIdentity($req->getPost('uid'))
			->setCredential($req->getPost('passwd'));
		$result = $auth->authenticate();
		if($result->isValid()) {
			$info = $auth->getResultRowObject(NULL, 'passwd');
			$sess = new Zend_Session_Namespace('myApp');
			$sess->setExpirationSeconds(1800);
			$sess->isLogined = TRUE;
			$sess->uid = $info->uid;
			$sess->name = $info->name;
			$sess->depart = $info->depart;
			$sess->roles = $info->roles;
			$action = $sess->currentAction;
			$controller = $sess->currentController;
			$module = $sess->currentModule;
			$sess->currentAction = NULL;
			$sess->currentController = NULL;
			$sess->currentModule = NULL;
			$this->_redirect('/'.$module.'/'.$controller.'/'.$action);
		} else {
			$res = $this->getResponse();
			$res->setBody('認証に失敗しました。<br />');
			$this->_forward('index', 'auth', 'default');
		}
	}

	public function logoutAction() {
		Zend_Session::destroy();
		//$this->_redirect('/index/index');
		$this->_redirect('/default/index/index');
	}
}
