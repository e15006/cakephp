<?php
require_once 'HTML/Menu.php';
require_once 'HTML/Menu/DirectRenderer.php';
require_once 'Zend/Cache.php';

class SitemapPlugin extends Zend_Controller_Plugin_Abstract {
	public function dispatchLoopStartup($req) {
		$cache = Zend_Cache::factory('Core', 'File', 
			array('lifetime' => 3600, 'automatic_serialization' => TRUE),
			array('cache_dir' => './application/tmp/')
		);
		if(!$menu = $cache->load('menu')) {
			$db = DbManager::getConnection();
			$data = $this->setNode($db, 0, $req->getBaseUrl());
			$menu = new HTML_Menu($data);
			$cache->save($menu, 'menu');
		}
		$menu->forceCurrentUrl($req->getBaseUrl().'/'.$req->getModuleName().'/'.$req->getControllerName().'/'.$req->getActionName());
		$renderer = new HTML_Menu_DirectRenderer();
		$renderer->setMenuTemplate('<table border="0">', '</table>');
		$menu->render($renderer, 'urhere');
		Zend_Registry::set('sitemenu', $renderer->toHtml());
	}

	private function setNode($db, $parent, $base){
		$stt = $db->prepare('SELECT * FROM metadata WHERE parent=:parent');
		$stt->bindValue(':parent', $parent);
		$stt->execute();
		while($row = $stt->fetch()){
			$tmp = array(
				'title' => $row['title'],
				'url' => $base.'/'.$row['module'].'/'.$row['controller'].'/'.$row['action']);
			$tmp['sub'] = $this->setNode($db, $row['id'], $base);
			$result[] = $tmp;
		}
		return $result;
	}
}