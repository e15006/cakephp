<?php
define('APP', './application');

require_once 'Zend/Controller/Action.php';
require_once 'Zend/Controller/Front.php';
require_once 'Zend/Registry.php';
require_once 'Zend/Session.php';
require_once APP.'/DbManager.class.php';
require_once APP.'/MySmarty.class.php';
require_once APP.'/CheckUtil.class.php';
require_once APP.'/AuthPlugin.class.php';
require_once APP.'/MetaPlugin.class.php';
require_once APP.'/SitemapPlugin.class.php';

$front = Zend_Controller_Front::getInstance();
$front->setControllerDirectory(
	array(
		'default'  => APP.'/default/controllers',
		'bbs'      => APP.'/bbs/controllers',
		'bm'       => APP.'/bm/controllers',
		'manager'  => APP.'/manager/controllers',
		'schedule' => APP.'/schedule/controllers'
	)
);
$front->registerPlugin(new AuthPlugin());
$front->registerPlugin(new MetaPlugin());
$front->registerPlugin(new SitemapPlugin());
$front->setParam('noViewRenderer', TRUE);
$front->dispatch();
