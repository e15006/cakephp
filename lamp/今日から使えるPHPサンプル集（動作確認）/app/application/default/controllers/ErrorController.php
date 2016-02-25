<?php
require_once 'Zend/Log.php';
require_once 'Zend/Log/Writer/Stream.php';

class ErrorController extends Zend_Controller_Action {
	public function errorAction() {
		$res = $this->getResponse();
		$writer = new Zend_Log_Writer_Stream(APP.'/log/log.dat');
		$logger = new Zend_Log($writer);
		$logger->addFilter(Zend_Log::ERR);
		foreach($res->getException() as $ex) {
			$logger->log($ex->getMessage()."\t".$ex->getFile(), Zend_Log::ERR);
		}
		$s = new MySmarty();
		$s->simpleDisplay($this->getRequest());
	}
}
