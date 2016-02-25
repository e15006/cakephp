<?php
class AuthPlugin extends Zend_Controller_Plugin_Abstract {
	public function dispatchLoopStartup($req) {
		$sess = new Zend_Session_Namespace('myApp');
		if(!$sess->isLogined){
			if($req->getModuleName() != 'default' || 
				$req->getControllerName() != 'auth' || 
				$req->getActionName() != 'process') {
				$sess->currentModule  = $req->getModuleName();
				$sess->currentController  = $req->getControllerName();
				$sess->currentAction  = $req->getActionName();
				$req->setModuleName('default');
				$req->setControllerName('auth');
				$req->setActionName('index');
			}
		}
	}
}
