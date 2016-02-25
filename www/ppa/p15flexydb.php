<?php
//!	HTML_Template_Flexyのサンプル	データベース処理との組合せ
require_once 'ppPage.php';
//------------------------------//
//!	DAOクラス
class CcData {
	public $records = array();	//!<	検索したレコードの配列

	//!	データ取得
	public function getData() {
		try {
			//	MySQLに接続	PHP5.3.6以降でcharsetを指定可	MySQL5.5未満ではcharset=utf8を指定
			$dbh = new PDO('mysql:dbname=ppdb;host=localhost;charset=utf8mb4',
							'ppguest',		//	DB接続ユーザ
							'yukari');	//	DB接続パスワード
		} catch (PDOException $e) {
			die('Connect Error: ' . $e->getCode());
		}

		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		try {
			$sql  = 'SELECT zipcode, pref, city, town FROM zipcodes';
			$sql .= ' WHERE zipcode >= ? AND zipcode <= ?';
			$sql .= ' ORDER BY zipcode ASC LIMIT 100';

			//	郵便番号の検索範囲
			$mincd = '2070000';
			$maxcd = '2090000';

			$sth = $dbh->prepare($sql);
			$sth->bindParam(1, $mincd, PDO::PARAM_STR);
			$sth->bindParam(2, $maxcd, PDO::PARAM_STR);
			$sth->execute();
			while ($row = $sth->fetchObject()) {
				$this->records[] = $row;
			}
			$sth->closeCursor();
		} catch (Exception $e) {
			die('Access Error: ' .$e->getCode());
		}
	}
}

//------------------------------//
$page = new PpPage;							//	表示クラス
$cdata = new CcData;						//	DAOクラス
$cdata->getData();							//	DBからデータを取得
$page->display('p15flexydb.html', $cdata);
?>
