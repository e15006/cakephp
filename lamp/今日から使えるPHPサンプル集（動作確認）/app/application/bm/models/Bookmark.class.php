<?php
require_once 'HTML/TagCloud.php';

class Bookmark {
	private $_db;

	public function __construct() {
		$this->_db = DbManager::getConnection();
	}

	public function __destruct(){
		$this->_db->closeConnection();
	}

	public function setBookmarkInfo($data) {
		try {
			$this->_db->beginTransaction();
			$bid = $this->setMasterInfo($data);
			$this->setCommentInfo($data, $bid);
			$this->setTagsInfo($data, $bid);
			$this->_db->commit();
		} catch(Zend_Db_Statement_Exception $e) {
			$this->_db->rollBack();
			die($e->getMessage());
		}
	}

	private function setMasterInfo($data) {
		$stt = $this->_db->prepare('SELECT bid FROM bm_master WHERE url=:url');
		$stt->bindValue(':url', $data['url']);
		$stt->execute();
		if(($row = $stt->fetch()) === FALSE) {
			$ins = $this->_db->prepare('INSERT INTO bm_master(url, title, updated) VALUES(:url, :title, :updated)');
			$ins->bindValue(':url', $data['url']);
			$ins->bindValue(':title', $data['title']);
			$ins->bindValue(':updated', date('Y-m-d H:i:s'));
			$ins->execute();
			$bid = $this->_db->fetchOne('SELECT LAST_INSERT_ID() AS id');
		}else{
			$bid = $row['bid'];
		}
		return $bid;
	}

	private function setCommentInfo($data, $bid) {
		$sess = new Zend_Session_Namespace('myApp');
		$stt = $this->_db->prepare('SELECT cid FROM bm_comment WHERE bid=:bid AND uid=:uid');
		$stt->bindValue(':bid', $bid);
		$stt->bindValue(':uid', $sess->uid);
		$stt->execute();
		if(($row = $stt->fetch()) === FALSE) {
			$ips = $this->_db->prepare('INSERT INTO bm_comment(bid, uid, comment, updated) VALUES(:bid, :uid, :comment, :updated)');
			$ips->bindValue(':bid', $bid);
			$ips->bindValue(':uid', $sess->uid);
			$ips->bindValue(':comment', $data['comment']);
			$ips->bindValue(':updated', date('Y-m-d H:i:s'));
			$ips->execute();
		} else {
			if($data['comment'] != NULL && $data['comment'] != ''){
				$ups = $this->_db->prepare('UPDATE bm_comment SET comment=:comment WHERE cid=:cid');
				$ups->bindValue(':comment', $data['comment']);
				$ups->bindValue(':cid', $row['cid']);
				$ups->execute();
			}
		}
	}

	private function setTagsInfo($data, $bid) {
		if($data['tags'] != NULL && $data['tags'] != ''){
			$tags = explode(',', $data['tags']);
			for($i = 0; $i < count($tags); $i++){
				$eps = $this->_db->prepare('SELECT tid FROM bm_tag WHERE bid=:bid AND tagname=:tagname');
				$eps->bindValue(':bid', $bid);
				$eps->bindValue(':tagname', trim($tags[$i]));
				$eps->execute();
				if(($row = $eps->fetch()) === FALSE) {
					$ips = $this->_db->prepare('INSERT INTO bm_tag(bid, tagname) VALUES(:bid, :tagname)');
					$ips->bindValue(':bid', $bid);
					$ips->bindValue(':tagname', trim($tags[$i]));
					$ips->execute();
				}
			}
		}
	}

	public function getBookmarks($flag = TRUE) {
		if($flag){
			$stt = $this->_db->prepare('SELECT * FROM bm_master ORDER BY updated DESC LIMIT 50');
		}else{
			$sess = new Zend_Session_Namespace('myApp');
			$stt = $this->_db->prepare('SELECT * FROM bm_master AS m INNER JOIN bm_comment AS c ON m.bid=c.bid WHERE uid=:uid ORDER BY m.updated DESC');
			$stt->bindValue(':uid', $sess->uid);
		}
		$stt->execute();
		$result = $stt->fetchAll();
		return $this->getBookmarkDetails($result);
	}

	public function getBookmarksByTag($tag) {
		$stt = $this->_db->prepare('SELECT * FROM bm_master AS m INNER JOIN bm_tag AS t ON m.bid=t.bid WHERE tagname=:tagname');
		$stt->bindValue(':tagname', $tag);
		$stt->execute();
		$result = $stt->fetchAll();
		return $this->getBookmarkDetails($result);
	}

	private function getBookmarkDetails($result) {
		for($i = 0; $i < count($result); $i++) {
			$result[$i]['c'] = $this->_db->fetchOne('SELECT COUNT(cid) AS c FROM bm_comment WHERE bid=?', array($result[$i]['bid']));
			$result[$i]['tags'] = $this->_db->fetchCol('SELECT tagname FROM bm_tag WHERE bid=?', array($result[$i]['bid']));
		}
		return $result;
	}

	public function getTagcloud($base) {
		$tc = new HTML_TagCloud();
		$stt = $this->_db->prepare('SELECT tagname, COUNT(tid) AS c FROM bm_tag GROUP BY tagname');
		$stt->execute();
		while($row = $stt->fetch()) {
			$tc->addElement(
				$row['tagname'],
				$base.'/bm/cloud/index/tag/'.urlencode($row['tagname']),
				$row['c'],
				time() + $row['c'] * 100000
			);
		}
		return $tc->buildAll();
	}
}