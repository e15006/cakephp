<?php
require_once 'HTML/TreeMenu.php';
require_once 'Pager/Pager.php';

class Article {
	private $_db;

	public function __construct() {
		$this->_db = DbManager::getConnection();
	}

	public function __destruct(){
		$this->_db->closeConnection();
	}

	public function getTopArticles($start, $len, $base) {
		$tree = new HTML_TreeMenu();
		$stt = $this->_db->prepare('SELECT id, title, nam, sdat, deleted, parent FROM bbs_master WHERE parent=0 ORDER BY sdat DESC LIMIT '.$this->_db->quote($start).', '.$this->_db->quote($len));
		$stt->execute();
		while($row = $stt->fetch()){
			$mid = 'm'.$row['id'];
			$$mid = new HTML_TreeNode(
				array(
					'text' => $this->createTitle($row),
					'link' => $this->createLink($row, $base)
				)
			);
			$result = $this->setNode($row['id'] ,$$mid, $base);
			if($result){
				$$mid->setOption('icon', 'folder.gif');
				$$mid->setOption('expandedIcon', 'folder-expanded.gif');
			}
			$tree->addItem($$mid);
		}
		$tree_d = new HTML_TreeMenu_DHTML($tree);
		$tree_d->images = $base.'/img';
		return $tree_d->toHTML();
	}

	private function setNode($parent, $node, $base){
		$flag = FALSE;
		$stt = $this->_db->prepare("SELECT id, title, nam, sdat, deleted, parent FROM bbs_master WHERE parent=:parent");
		$stt->bindValue(':parent', $parent);
		$stt->execute();
		while($row = $stt->fetch()){
			$flag = TRUE;
			$mid = 'm'.$row['id'];
			$$mid = new HTML_TreeNode(
				array(
					'text' => $this->createTitle($row),
					'link' => $this->createLink($row, $base)
				)
			);
			$result = $this->setNode($row['id'] ,$$mid, $base);
			if($result){
				$$mid->setOption('icon', 'folder.gif');
				$$mid->setOption('expandedIcon', 'folder-expanded.gif');
			}
			$node->addItem($$mid);
		}
		return $flag;
	}

	private function createTitle($row){
		if($row['deleted'] == 0) {
			return $row['id'].'. '.$row['title'].'&nbsp;'.$row['nam'].'&nbsp;'.date('Y/m/d H:i:s', strtotime($row['sdat']));
		} else {
			return '削除済み';
		}
	}

	private function createLink($row, $base){
		return (($row['deleted'] == 0) ? $base.'/bbs/show/index/id/'.$row['id'] : '');
	}

	public function getPager($current, $base) {
		$num = $this->_db->fetchOne('SELECT COUNT(*) FROM bbs_master WHERE parent=0');
		$p = Pager::factory(
			array(
				'perPage' => 5,
				'totalItems' => $num,
				'path' => $base,
				'fileName' => 'bbs/index/index/page/%d',
				'append' => FALSE,
				'currentPage' => $current
			)
		);
		$navi = $p->getLinks();
		return $navi['all'];
	}

	public function setInfo($data) {
		$stt = $this->_db->prepare('INSERT INTO bbs_master(title, nam, sdat, article, passwd, parent) VALUES(:title, :nam, :sdat, :article, :passwd, :parent)');
		$stt->bindValue(':title', $data['title']);
		$stt->bindValue(':nam', $data['nam']);
		$stt->bindValue(':sdat', date('Y-m-d G:i:s'));
		$stt->bindValue(':article', $data['article']);
		$stt->bindValue(':passwd', $data['passwd']);
		$stt->bindValue(':parent', $data['parent']);
		$stt->execute();
	}

	public function deleteInfo($id, $passwd) {
		$flag = FALSE;
		$stt = $this->_db->prepare('SELECT id FROM bbs_master WHERE id=:id AND passwd=:passwd');
		$stt->bindValue(':id', $id);
		$stt->bindValue(':passwd', $passwd);
		$stt->execute();
		while($row = $stt->fetch()){
			$this->_db->query('UPDATE bbs_master SET deleted=1 WHERE id=?', array($row['id']));
			$flag = TRUE;
		}
		return $flag;
	}

	public function getInfoById($id, $flag = FALSE){
		$result = $this->_db->fetchRow('SELECT * FROM bbs_master WHERE id=?', array($id));
		$result['article'] = $this->formatArticle($result['article'], $flag);
		return $result;
	}

	public function getInfoByKeyword($keywd){
		$stt = $this->_db->prepare('SELECT * FROM bbs_master WHERE (title LIKE :keywd OR article LIKE :keywd) AND deleted=0 ORDER BY id DESC');
		$stt->bindValue(':keywd', '%'.$keywd.'%');
		$stt->execute();
		$result = $stt->fetchAll();
		for($i = 0; $i < count($result); $i++) {
			$result[$i]['article'] = $this->formatArticle($result[$i]['article'], FALSE);
		}
		return $result;
	}

	private function formatArticle($article, $flag){
		if($flag){
			return '&gt;'.ereg_replace("\n","\n&gt;", htmlspecialchars($article));
		}else{
			return ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\">\\0</a>", nl2br(htmlspecialchars($article)));
		}
	}
}