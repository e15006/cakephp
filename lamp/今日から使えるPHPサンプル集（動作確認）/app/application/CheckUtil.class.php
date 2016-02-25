<?php
require_once 'Zend/Validate.php';
require_once 'Zend/Validate/Between.php';
require_once 'Zend/Validate/Date.php';
require_once 'Zend/Validate/Digits.php';
require_once 'Zend/Validate/NotEmpty.php';
require_once 'Zend/Validate/Regex.php';
require_once 'Zend/Validate/StringLength.php';

class CheckUtil {
	private $_error;

	function __construct(){
		$this->_error = array();
	}

	public function getError(){
		return $this->_error;
	}

	public function setError($err){
		$this->_error[] = $err;
	}
	public function showResult(){
		if(count($this->_error) > 0){
			$s = new MySmarty();
			$s->assign('errors', $this->_error);
			$s->display('error.tpl');
			exit(0);
		}
	}

	private function checkError($v, $value) {
		if(!$v->isValid($value)){
			foreach($v->getMessages() as $msg) { $this->_error[] = $msg; }
		}
	}

	public function requiredCheck($value, $err) {
		$v = new Zend_Validate_NotEmpty();
		$v->setMessage(str_replace('{0}', $err, '{0}は必須入力です。'));
		$this->checkError($v, $value);
	}

	public function lengthCheck($value, $max, $err){
		$v = new Zend_Validate_StringLength(0, $max);
		$v->setMessage(str_replace('{0}', $err, '{0}は %max% 桁以内で入力してください。'), Zend_Validate_StringLength::TOO_LONG);
		$this->checkError($v, $value);
	}

	public function numberTypeCheck($value, $err){
		$v = new Zend_Validate_Digits();
		$v->setMessage(str_replace('{0}', $err, '{0}は数値で入力してください。'));
		$this->checkError($v, $value);
	}

	public function dateTypeCheck($value, $err){
		$v = new Zend_Validate_Date();
		$v->setMessage(str_replace('{0}', $err, '{0}は日付形式で入力してください。'));
		$this->checkError($v, $value);
	}

	public function dateNumberTypeCheck($year, $month, $day, $err){
		$d = $year + '-' + $month + '-' + $day;
		$this->dateTypeCheck($d, $err);
	}

	public function rangeCheck($value, $max, $min, $err) {
		$v = new Zend_Validate_Between($min, $max);
		$v->setMessage(str_replace('{0}', $err, '{0}は %min% ～ %max% の範囲で入力してください。'));
		$this->checkError($v, $value);
	}

	public function regExCheck($value, $pattern, $err) {
		$v = new Zend_Validate_Regex($pattern);
		$v->setMessage(str_replace('{0}', $err, '{0}を正しい形式で入力してください。'));
		$this->checkError($v, $value);
	}

	public function compareCheck($value1, $value2, $err1, $err2) {
		if(is_null($value1) === FALSE && trim($value1) != ''
			&& is_null($value2) === FALSE && trim($value2) != ''){
			if($value1 >= $value2){
				$this->_error[] = $err1.'は'.$err2.'より小さい値を指定してください。';
			}
		}
	}

	public function duplicateCheck($value, $sql, $err) {
		$db = DbManager::getConnection();
		$stt = $db->prepare($sql);
		$stt->bindValue(':value', $value);
		$stt->execute();
		if(($row = $stt->fetch()) !== FALSE) {
			$this->_error[] = $err.'が重複しています。';
		}
	}
}
