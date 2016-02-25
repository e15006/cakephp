-- MySQL dump 10.11
--
-- Host: localhost    Database: samples
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `access_counter`
--

DROP TABLE IF EXISTS `access_counter`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `access_counter` (
  `url` varchar(255) NOT NULL default '',
  `cnt` int(11) NOT NULL default '0',
  PRIMARY KEY  (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `access_counter`
--

LOCK TABLES `access_counter` WRITE;
/*!40000 ALTER TABLE `access_counter` DISABLE KEYS */;
INSERT INTO `access_counter` VALUES ('/samples/chap3/grhCnt/cnt1.php',100);
/*!40000 ALTER TABLE `access_counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bbs_master`
--

DROP TABLE IF EXISTS `bbs_master`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `bbs_master` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL default '',
  `nam` varchar(20) NOT NULL default '',
  `sdat` datetime NOT NULL default '0000-00-00 00:00:00',
  `article` text,
  `passwd` varchar(15) NOT NULL default '',
  `deleted` tinyint(1) NOT NULL default '0',
  `parent` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `bbs_master`
--

LOCK TABLES `bbs_master` WRITE;
/*!40000 ALTER TABLE `bbs_master` DISABLE KEYS */;
INSERT INTO `bbs_master` VALUES (1,'シンクの水あか','鈴木','2008-01-30 10:11:02','シンクの水あかが気になるのですが、みなさんどのように掃除してますか？','12345',0,0),(2,'エコ生活','佐藤','2008-01-30 18:18:15','今までお弁当などにアルミカップを使っていたのですが、\r\n最近、繰り返し洗って使えるカップを購入。\r\nレンジも冷凍もOKだし、地球にやさしいし、満足してます。\r\nおすすめですよ。','12345',0,0),(3,'Re:  シンクの水あか','井上','2008-02-05 10:20:15','食器を洗った後、そのまま同じスポンジで洗っています。','12345',0,1),(4,'Re:  シンクの水あか','あっちゃん','2008-02-06 11:21:29','じゃがいもの皮で擦るときれいになります。','12345',0,1),(5,'ネットで買い物','河合','2008-02-09 10:24:54','妊娠中は、買い物にいくのも一苦労。\r\nなのでインターネットで買い物しています。\r\n最近、近所のスーパーでもネットショッピングが始まって、買い物が楽になりました。\r\n','12345',0,0),(6,'お中元やお歳暮','和田','2008-02-10 10:26:48','皆さん、お中元やお歳暮って贈っていますか。\r\n娘が書道を習い始めたのですが、先生に贈った方がよいのでしょうか。\r\nもし、贈る場合はだいたい幾らくらいのものがよいのでしょうか。','12345',0,0),(7,'熨斗について','はる','2008-02-13 10:29:22','先日、贈答品を購入した際、店員さんに熨斗をどうするか聞かれたのですが、\r\nどのようなときに、熨斗をつけたらよいのでしょうか。','12345',0,0),(8,'窓ふき','伊東','2008-03-01 10:37:27','窓ふきってどのくらいの頻度でやっていますか。\r\nうちはほとんどやらなくて、半年に1回くらいです。','12345',0,0),(9,'Re:  熨斗について','田中','2008-03-08 10:39:21','親しい人に渡すものには、付けていません。\r\n上司や先生には付けます。\r\n\r\n','12345',0,7),(10,'Re:  お中元やお歳暮','佐々木','2008-03-19 10:40:15','どのくらいの期間習っているかにもよるのでは？','12345',0,6),(11,'Re:  Re:  お中元やお歳暮','和田','2008-03-22 10:41:14','>どのくらいの期間習っているかにもよるのでは？\r\n具体的には、どのくらいの期間以上習っていたら贈るものなのでしょうか','12345',0,10),(12,'離乳食について','山口','2008-04-10 10:41:55','いつ頃から離乳食を始めたらよいですか','12345',1,0),(13,'簡単なおつまみレシピ','須藤','2008-04-30 10:43:04','カンタンにつくれるおつまみのレシピを教えてください。','12345',0,0),(14,'お酢の保存法','坂本','2008-04-20 10:44:03','お酢ってどのように保存していますか。\r\nうちは、冷蔵庫に入れています。','12345',0,0),(15,'こげの落とし方','相田','2008-04-30 10:45:18','お気に入りのなべを焦がしてしまいました。\r\n上手な焦げの落とし方を教えてください。','12345',0,0),(16,'花粉','新井','2008-05-07 10:46:16','花粉症で参ってます。\r\n洗濯物も布団も外に干せません。','12345',0,0),(17,'Re:  花粉','山田','2008-05-08 10:48:38','私も花粉症です。\r\n\r\n花粉の時期は、乾燥機を使ってます。','12345',0,16),(18,'Re:  Re:  花粉','新井','2008-05-15 10:49:39','乾燥機いいですね。\r\nうちも買おうかな。','12345',0,17);
/*!40000 ALTER TABLE `bbs_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_comment`
--

DROP TABLE IF EXISTS `bm_comment`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `bm_comment` (
  `cid` int(11) NOT NULL auto_increment,
  `bid` int(11) default NULL,
  `uid` varchar(20) default NULL,
  `comment` varchar(255) default NULL,
  `updated` datetime default NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `bm_comment`
--

LOCK TABLES `bm_comment` WRITE;
/*!40000 ALTER TABLE `bm_comment` DISABLE KEYS */;
INSERT INTO `bm_comment` VALUES (1,1,'yyamada','開発ツール','2008-05-16 15:10:59'),(2,2,'yyamada','PHPのインストール','2008-05-17 15:14:56'),(3,3,'yyamada','','2008-05-19 15:25:44'),(4,4,'yyamada','','2008-05-20 15:26:22'),(5,2,'hsuzuki','','2008-05-23 15:27:32'),(6,3,'hsuzuki','','2008-05-25 15:27:54'),(7,4,'hsuzuki','','2008-05-26 15:28:05'),(8,5,'hsuzuki','後で読む','2008-05-28 15:30:38'),(9,6,'hsuzuki','','2008-05-30 15:32:28'),(10,2,'ksato','','2008-06-01 15:33:19'),(11,3,'ksato','','2008-06-03 15:33:36'),(12,7,'ksato','','2008-06-05 15:34:56'),(13,8,'ksato','','2008-06-10 15:36:07'),(14,2,'nkakeya','','2008-06-12 15:36:46'),(15,9,'nkakeya','','2008-06-15 15:37:34'),(16,10,'nkakeya','環境設定','2008-06-18 15:40:13'),(17,2,'ykimura','','2008-06-20 15:41:15'),(18,11,'ykimura','','2008-06-21 15:43:09'),(19,12,'ykimura','正規表現で色分け可能','2008-06-23 15:44:17'),(20,13,'yyamada','','2008-06-28 15:45:58'),(21,11,'yyamada','','2008-06-30 16:08:28'),(22,11,'nkakeya','','2008-07-01 16:09:19'),(23,11,'ksato','','2008-07-02 16:10:31'),(24,1,'ksato','','2008-07-03 16:27:23'),(25,12,'ksato','','2008-07-04 16:27:47'),(26,12,'yyamada','','2008-07-05 16:29:15');
/*!40000 ALTER TABLE `bm_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_master`
--

DROP TABLE IF EXISTS `bm_master`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `bm_master` (
  `bid` int(11) NOT NULL auto_increment,
  `url` varchar(255) default NULL,
  `title` varchar(255) default NULL,
  `updated` datetime default NULL,
  PRIMARY KEY  (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `bm_master`
--

LOCK TABLES `bm_master` WRITE;
/*!40000 ALTER TABLE `bm_master` DISABLE KEYS */;
INSERT INTO `bm_master` VALUES (1,'http://allabout.co.jp/internet/database/closeup/CU20071109A/index.htm?FM=rss','PHPプログラミングにおすすめ！PHPエディタ','2008-05-16 15:10:59'),(2,'http://www.wings.msn.to/index.php/-/B-08/php_win_php/','サーバサイド環境構築・設定 - WINGS','2008-05-17 15:14:56'),(3,'http://www.tohoho-web.com/www.htm','とほほのＷＷＷ入門','2008-05-19 15:25:44'),(4,'http://www.openspc2.org/JavaScript/','一撃必殺JavaScript日本語リファレンス','2008-05-20 15:26:22'),(5,'http://www.atmarkit.co.jp/fdb/index/subindex/tsql_subindex.html','連載記事 「さらっと覚えるSQL＆T-SQL入門」 － ＠IT','2008-05-23 15:30:38'),(6,'http://www.atmarkit.co.jp/fdb/index/subindex/xmldbdev_subindex.html','＠IT：連載記事 「XMLデータベース開発方法論」','2008-05-25 15:32:28'),(7,'http://www.xmldb.jp/db_contents/xmldb/cyberluxeon/cyberluxeon_1.html','Cyber Luxeonで学ぶXMLDB入門','2008-05-26 15:34:56'),(8,'http://www.atmarkit.co.jp/fdotnet/ajaxlib/ajaxlib01/ajaxlib01_01.html','Microsoft AJAX Libraryで実践オブジェクト指向JavaScript','2008-05-28 15:36:07'),(9,'http://www.wings.msn.to/index.php/-/B-08/db_win_mysql/','MySQLのインストール','2008-05-30 15:37:34'),(10,'http://www.wings.msn.to/index.php/-/B-08/cmn_win_apache/','環境構築-Apache-','2008-06-01 15:40:13'),(11,'http://hide.maruo.co.jp/software/hidemaru.html','秀まるおのホームページ(サイトー企画)－秀丸エディタ','2008-06-03 15:43:09'),(12,'http://www.forest.impress.co.jp/lib/offc/document/txteditor/k2editor.html','窓の杜 - K2Editor','2008-06-05 15:44:17'),(13,'http://www.wings.msn.to/index.php/-/B-08/cmn_win_aptana/','Aptana Studioのインストール方法','2008-06-10 15:45:58');
/*!40000 ALTER TABLE `bm_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_tag`
--

DROP TABLE IF EXISTS `bm_tag`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `bm_tag` (
  `tid` int(11) NOT NULL auto_increment,
  `bid` int(11) default NULL,
  `tagname` varchar(50) default NULL,
  PRIMARY KEY  (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `bm_tag`
--

LOCK TABLES `bm_tag` WRITE;
/*!40000 ALTER TABLE `bm_tag` DISABLE KEYS */;
INSERT INTO `bm_tag` VALUES (1,1,'エディタ'),(2,1,'ツール'),(3,2,'インストール'),(4,5,'データベース'),(5,5,'SQL'),(6,6,'データベース'),(7,7,'データベース'),(8,8,'AJAX'),(9,9,'データベース'),(10,9,'インストール'),(11,10,'インストール'),(12,10,'設定'),(13,11,'エディタ'),(14,12,'エディタ'),(15,13,'インストール');
/*!40000 ALTER TABLE `bm_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `books` (
  `isbn` varchar(50) NOT NULL default '',
  `title` varchar(100) NOT NULL default '',
  `category` varchar(20) NOT NULL default '',
  `price` int(11) NOT NULL default '0',
  `publish` varchar(30) NOT NULL default '',
  `published` date NOT NULL default '0000-00-00',
  `memo` text NOT NULL,
  `cnt` int(11) NOT NULL default '0',
  PRIMARY KEY  (`isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES ('978-4-8399-2438-6','プログラミング ASP.NET AJAX','ASP.NET',3780,'マイコム','2007-09-22','ASP.NET AJAX 1.0、ASP.NET AJAX Control Toolkit対応。',65000),('978-4-7981-1363-0','10日でSQL Server 2005入門教室','データベース',2940,'正栄社','2007-09-19','自分で動かして確かめながら、SQL Server2005の機能をがっちり学べる入門書です。',37000),('978-4-7981-1427-9','Visual Studio 2005でいってきます','ASP.NET',2520,'正栄社','2007-07-31','Visual Studio 2005でASP.NETアプリケーション開発を行う入門書。データベースはSQL Server 2005 ExpressEditionを使用。',20000),('978-4-7980-1669-6','Pocket詳解JSP＆サーブレット辞典','JSP/サーブレット',2310,'秀和システム','2007-05-30','サーバサイドJavaに必要な技術情報をコンパクトに凝縮したリファレンス本。基本構文はもちろん、注意／参考／参照などで該当メンバのみならず 関連する機能についても詳しく解説。',32000),('978-4-7980-1616-0','今日からつかえるASP.NET 2.0サンプル集','ASP.NET',3360,'秀和システム','2007-03-29','入門書だけでは身につかなかったASP.NET 2.0の実践的な使い方をサンプルアプリケーションを通じて学びましょう。アプリケーション作成の基礎TIPSからデータベース連携、話題のWeb APIやASP.NET AJAXを利用したWeb 2.0的テクニックまで、CD-ROMと連動した実用サンプルが満載。',15000),('978-4-7981-1257-2','独学ASP.NET2.0','ASP.NET',4179,'正栄社','2007-02-20','具体的なWebアプリケーションを自ら作成しながら、基礎から応用までを実体験。イベントドリブン、サーバコントロール、データベース連携、Web.configなどなど挿絵入りで詳しく紹介。解説、例題、練習問題という3ステップの学習メソッドできっちり身につけられます。',23000),('978-4-7981-1230-5','ASP.NETリファレンス','ASP.NET',3129,'正栄社','2007-02-13','ASP.NETが提供する豊富なサーバコントロールを、サンプルを交えてわかりやすく解説したリファレンス本。目的引きで構成されており、索引と併用すれば、知りたいことがすぐにわかる。',25000),('978-4-8399-2188-0','MySQL逆引きリファレンス','データベース',2730,'マイコム','2006-12-01','MySQLのインストールからサーバ管理、データ操作まで体系的に詳しく解説。最新バージョン5.0に対応。新機能ビュー／ストアドプロシージャ／ストアドファンクション／トリガも掲載。わかりやすい用例つきで、サンプルデータはサポートサイトより入手可能。',80000),('978-4-7981-1062-2','10日でASP.NET2.0入門教室','ASP.NET',2940,'正栄社','2006-08-03','1レッスンごと実際に自分でサンプルを作成しながら、じっくり基礎から学べます。丁寧な解説と豊富な挿絵、動作画面が嬉しい構成。。',62000),('978-4-7981-1070-7','始めようXML DB','XML',3780,'正栄社','2006-04-10','ネイティブXMLデータベースの代表格「NeoCoreXMS」の無償体験版「Xpriori」でXMLDBの世界を体験しよう。',75000),('978-4-8833-7491-5','SQLのドリル','データベース',2940,'ホシム','2006-03-27','とにかくSQLを繰り返し書いて、実践力を身につけるドリル。計算力も漢字力も、そしてSQL力も同じ。繰り返しの練習が基礎力を養います。。',26000),('978-4-7980-1270-4','Pocket詳解PHP辞典','PHP',2520,'秀和システム','2006-03-24','コンパクトなのに充実の情報量。PHP利用者必携のリファレンス。最新バージョンに対応し、機能引きの目次で目的のページがすぐに引けます。',30000),('978-4-7980-1875-1','今日からつかえるJSP＆サーブレットサンプル集　JavaSE6＋Tomcat6対応版','JSP',3150,'秀和システム','2008-01-24','JSTLやタグファイルなどの新機能活用で「スクリプトレス」JSPページを実現。さらにAjax、WebAPI、RSS、共有ブックマークなど今話題のトピックも豊富。',11000);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gmap`
--

DROP TABLE IF EXISTS `gmap`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `gmap` (
  `mid` int(11) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `url` varchar(255) default NULL,
  `axisx` float default NULL,
  `axisy` float default NULL,
  `description` text,
  PRIMARY KEY  (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `gmap`
--

LOCK TABLES `gmap` WRITE;
/*!40000 ALTER TABLE `gmap` DISABLE KEYS */;
INSERT INTO `gmap` VALUES (1,'東京ディズニーランド','http://www.tokyodisneyresort.co.jp/tdl/',139.881,35.6325,'本家アメリカ以外で初めて開園したディズニーランドです。'),(2,'旭山動物園','http://www5.city.asahikawa.hokkaido.jp/asahiyamazoo/',142.482,43.7688,'行動展示で有名な旭川市にある動物園です。'),(3,'ユニバーサル・スタジオ・ジャパン','http://www.usj.co.jp/',135.432,34.6665,'大阪にあるテーマパークです。'),(4,'スペースワールド','http://www.spaceworld.co.jp/',130.812,33.8737,'日本初の宇宙テーマパークです。'),(5,'沖縄美ら海水族館','http://www.kaiyouhaku.com/',127.877,26.694,'沖縄にある世界一を誇る水族館です。');
/*!40000 ALTER TABLE `gmap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `link` (
  `id` int(11) NOT NULL default '0',
  `url` varchar(100) NOT NULL default '',
  `icon` varchar(100) NOT NULL default '',
  `title` varchar(50) NOT NULL default '',
  `keyword` varchar(50) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `nextId` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `link`
--

LOCK TABLES `link` WRITE;
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
INSERT INTO `link` VALUES (1,'chap0-1.php','star1.gif','老樹の城砦1','老樹,城','闇果つる古代王国アレスィアの累々たる血脈、そして忌まわしき歪んだ歴史の象徴たる「潜争」とは？新シリーズ「緑翳の聖域」、ここにスタート。',2),(2,'chap0-2.php','star2.gif','老樹の城砦2','老樹,城','永き歴史のひずみはすべてここにある。古代王国アレスィアの右の重鎮サルニュダーサ公、左の重鎮ログレシア公の、呪われた婚礼のおとない。そして、歴史の歯車は緩やかに回りだす。',3),(3,'chap1-1.php','star3.gif','紅月の逢瀬1','逢瀬,紅月','紅き月がサルニュダーサの城にかかるとき、森はざわめき、山は戦慄する。人の営みを懐に押し隠し、アレスィアの夜が異なる旋律をつむぎだすのを、人はいまだ知らぬ。',4),(4,'chap1-2.php','star4.gif','紅月の逢瀬2','逢瀬,紅月','陰謀のログレシア公ウェルダ、狂喜の花嫁アルテスィア、そして、暗躍の翳法師。月の細き紅の光が鈍く城を照らし、次第と一点に交わっていくとき、神は歴史の一頁を繰った。',5),(5,'chap1-3.php','star5.gif','紅月の逢瀬3','逢瀬,紅月','サルニュダーサ公の死。哄笑の翳法師。狂喜の花嫁が紡ぎ出す拙い旋律は、古代王国アレスィアの鎮魂歌なのか。ログレシア公ウェルダの蒼き双眸は、今焦点を結ぶ。',0);
/*!40000 ALTER TABLE `link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_list`
--

DROP TABLE IF EXISTS `mail_list`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `mail_list` (
  `email` varchar(255) NOT NULL,
  `name` varchar(30) default NULL,
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `mail_list`
--

LOCK TABLES `mail_list` WRITE;
/*!40000 ALTER TABLE `mail_list` DISABLE KEYS */;
INSERT INTO `mail_list` VALUES ('kimura@wings.msn.to','木村勇'),('nami@wings.msn.to','掛谷奈美'),('sato@wings.msn.to','佐藤圭'),('suzuki@wings.msn.to','鈴木花子'),('yamada@wings.msn.to','山田祥寛');
/*!40000 ALTER TABLE `mail_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_queue`
--

DROP TABLE IF EXISTS `mail_queue`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `mail_queue` (
  `id` bigint(20) NOT NULL default '0',
  `create_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `time_to_send` datetime NOT NULL default '0000-00-00 00:00:00',
  `sent_time` datetime default NULL,
  `id_user` bigint(20) NOT NULL default '0',
  `ip` varchar(20) NOT NULL default 'unknown',
  `sender` varchar(50) NOT NULL default '',
  `recipient` text NOT NULL,
  `headers` text NOT NULL,
  `body` longtext NOT NULL,
  `try_sent` tinyint(4) NOT NULL default '0',
  `delete_after_send` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`),
  KEY `time_to_send` (`time_to_send`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `mail_queue`
--

LOCK TABLES `mail_queue` WRITE;
/*!40000 ALTER TABLE `mail_queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metadata`
--

DROP TABLE IF EXISTS `metadata`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `metadata` (
  `id` int(11) NOT NULL,
  `module` varchar(20) default NULL,
  `controller` varchar(20) default NULL,
  `action` varchar(20) default NULL,
  `title` varchar(255) default NULL,
  `keywords` varchar(100) default NULL,
  `description` varchar(255) default NULL,
  `roles` varchar(100) default NULL,
  `parent` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `metadata`
--

LOCK TABLES `metadata` WRITE;
/*!40000 ALTER TABLE `metadata` DISABLE KEYS */;
INSERT INTO `metadata` VALUES (1,'default','index','index','ホーム','ホーム, トップ','ホーム画面です','',0),(2,'default','auth','index','ログイン','ログイン, 認証','ログイン画面です','',0),(3,'manager','index','menu','備品管理データベース','備品管理, メイン','備品管理データベースのメインメニューです','',1),(4,'manager','create','index','新規作成','新規, 備品, 登録','新規に備品を登録します','admin',3),(5,'manager','edit','index','更新','既存, 備品, 更新','備品情報を更新します','admin,supervisor',3),(6,'manager','search','index','検索','備品, 検索, サーチ','備品情報を検索します','',3),(7,'manager','search','process','検索結果','備品, 検索結果','備品情報の検索結果を表示します','',6),(8,'bbs','index','index','スレッド式掲示板','スレッド式掲示板, メイン','スレッド式掲示板のメインメニューです','',1),(9,'bbs','index','search','検索','スレッド式掲示板, 記事, 検索','記事を検索します','',8),(10,'bbs','create','index','新規作成','スレッド式掲示板, 新規, 記事, 登録','新規に記事を投稿します','',8),(11,'bbs','delete','index','削除','スレッド式掲示板, 既存, 記事, 削除','記事を削除します','',8),(12,'bbs','response','index','返信','スレッド式掲示板, 記事, 返信','返信記事を投稿します','',8),(13,'bbs','show','index','個別記事','スレッド式掲示板, 個別記事, 表示','個別記事を表示します','',8),(14,'bm','index','index','共有ブックマーク','共有ブックマーク, メイン','共有ブックマークのメインメニューです','',1),(15,'bm','cloud','index','タグ別一覧','共有ブックマーク, タグ, 表示','タグを表示します','',14),(16,'bm','submit','index','新規作成','共有ブックマーク, 新規, ブックマーク, お気に入り, 登録','新規にブックマークを作成します','',14),(17,'schedule','index','index','グループスケジュール管理','グループスケジュール管理, メイン','グループスケジュール管理のメインメニューです','',1),(18,'schedule','index','download','スケジュールデータのダウンロード','グループスケジュール管理, 予定, データ, ダウンロード','スケジュールデータをダウンロードします','',17),(19,'schedule','day','index','新規作成','グループスケジュール管理, 新規, スケジュール, 登録','新規に予定を登録します','',17),(20,'schedule','day','process','メンバスケジュール','グループスケジュール管理, メンバ, 予定, 表示','メンバの予定を表示します','',17),(21,'default','index','dummy','エラー','エラーページ, カスタム','エラー画面です','',0);
/*!40000 ALTER TABLE `metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mng_master`
--

DROP TABLE IF EXISTS `mng_master`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `mng_master` (
  `id` varchar(10) NOT NULL default '',
  `nam` varchar(50) default NULL,
  `fnum` varchar(50) default NULL,
  `depart` varchar(20) default NULL,
  `plac` varchar(30) default NULL,
  `dat` date default NULL,
  `mem` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `mng_master`
--

LOCK TABLES `mng_master` WRITE;
/*!40000 ALTER TABLE `mng_master` DISABLE KEYS */;
INSERT INTO `mng_master` VALUES ('101-000003','業務用PC','PC9000/10T','資材','302オフィス','2008-01-20','山田M管理'),('101-000041','カードリーダ','SR2003','資材','OCRルーム','2007-12-12','山浦S管理'),('101-000040','複合プリンタ','SMLP-99','資材','通路キャビネット','2007-11-11','山浦S管理'),('101-000023','会議用テーブル','TABLE1','資材','502会議室','2007-11-10','山浦S管理'),('101-000022','移動書庫','SHOKO2','資材','サイドP','2007-12-21','萩本S管理'),('101-000021','移動書庫','SHOKO1','資材','サイドS','2008-01-15','萩本S管理'),('101-000020','メディアボード','E32-490-9898','資材','905会議室','2008-06-01','萩本S管理'),('101-000045','ディスクアレイ装置','DR200-XR','システム','サーバ室','2007-08-06','浜島S管理'),('101-000036','業務用PC','PC9001/10U','システム','401オフィス','2007-08-23','浜島S管理'),('101-000035','日本語カラーシリアルプリンタ','CSP5200PR','システム','XYZビル4F','2007-12-07','浜島S管理'),('101-000034','オフィスプロセッサ','OP5200','システム','サーバ室','2007-12-06','浜島S管理'),('101-000012','UNIXサーバ','NX4800-J','システム','システムセンタ','2007-10-01','浜島S預かり'),('101-000011','NTサーバ（部門用）','N8500-160B','システム','サーバ室','2007-06-07','大橋S管理'),('101-000002','無停電電源装置','DGN-58-A','システム','OCRルーム','2007-12-18','川端氏管理'),('101-000000','オフィスプロセッサ','OP5200-98','システム','サーバ室','2007-08-15','川端氏管理'),('101-000039','サーマルプリンタ','SMLP-00','製造','行方不明中','2007-09-19','小野氏保管'),('101-000033','ワークステーション','OP5200-98','製造','サーバ室','2007-11-21','小野氏保管'),('101-000032','ワークステーション','OP5200-98','製造','サーバ室','2007-12-22','小野氏保管'),('101-000029','日本語ラインプリンタ','LN23-JX-00','製造','XCビル','2007-08-03','小野氏保管'),('101-000015','ラインプリンタ','PC-KRT800','製造','OCRルーム','2008-01-10','本多S保有'),('101-000014','業務用PC','PC9100/11B','製造','武蔵工場','2008-02-03','横井T'),('101-000009','業務用PC','PC5800/10T','製造','海外工場にて使用','2007-02-10','韓国鈴木Ｋ'),('101-000007','業務用PC','PC5800/80','製造','管理課保管','2008-02-04','小野氏保管'),('101-000006','業務用PC','PC5800/13TA','製造','製造部キャビネット保管','2008-01-13','営業部より融通'),('101-000048','タイプライター','TW2007/XZ','総務','製造部設置','2007-12-10','小野K管理'),('101-000047','OHP','OHP','総務','総務部キャビネット','2008-05-21','山田左脇'),('101-000044','投影型フルカラー液晶','PC-PJ600','総務','移動書庫内','2007-08-08','漆原K保有'),('101-000038','ラインプリンタ','LNPRT-00-X','総務','ＯＣＲルーム','2007-07-02','漆原K保有'),('101-000027','照明回路スイッチ','SWT01','総務','601会議室照明スイッチ部分','2007-09-07','漆原K保有'),('101-000026','排煙口','OTHER','総務','802会議室天井','2007-10-17','漆原K保有'),('101-000025','スチールパーティション','PART1','総務','503会議室','2007-12-29','漆原K保有'),('101-000024','ウォールキャビネット','CABI1','総務','906会議室前','2007-12-01','漆原K保有'),('101-000019','応接セット','OUSETSU','総務','支配人室','2008-01-25','小野氏管理'),('101-000018','UNIXサーバ','NX4800-JD','総務','システム管理センタ','2007-07-16','松岡K保持'),('101-000017','NTサーバ','N8500-140K','総務','システム管理室','2007-06-18','松岡K保持'),('101-000016','カードリーダ','K7500SR','総務','行方不明中','2007-03-05','川村S預かり'),('101-000010','液晶プロジェクタ','PC-PJ600','総務','総務部裏倉庫','2007-05-13','漆原K保有'),('101-000001','ファックス装置','FAX-DX6800','総務','総務部業務FAX','2007-04-21','川端氏管理'),('101-000004','業務用PC','PC8000/15T','技術','301オフィス','2008-06-03','ユーザ田中S'),('101-000005','業務用PC','PC5800/17TE','技術','302オフィス','2007-10-08','営業部より融通'),('101-000008','業務用PC','PC8000/95','技術','管理課保管','2008-04-22','ユーザ井上S'),('101-000013','プリンタ','PC-PRT500','技術','技術管理グループ使用','2008-01-09','鎌本B専用'),('101-000030','オフィスプロセッサ','OP5200-98','技術','335会議室キャビネット','2007-12-04','田中S管理'),('101-000031','日本語ラインプリンタ','LNPRT-00-X','技術','オフィス500','2007-06-28','田中S管理'),('101-000037','オフィスプロセッサ','OP5200','技術','サーバ室','2007-07-08','田中S管理'),('101-000042','マルチポートFAX','MP200-0-1X','技術','サーバ室','2007-10-10','田中S管理'),('101-000043','光ディスク装置','KNK-1312-DA','技術','OCRルーム','2007-09-09','田中S管理'),('101-000046','複合プリンタ','SMLP-98','技術','技術部内','2007-03-03','田中S管理');
/*!40000 ALTER TABLE `mng_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mng_pmaster`
--

DROP TABLE IF EXISTS `mng_pmaster`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `mng_pmaster` (
  `id` varchar(10) NOT NULL default '',
  `ip` varchar(15) default NULL,
  `pnum` varchar(8) default NULL,
  `memory` int(11) default NULL,
  `hdd` int(11) default NULL,
  `mem` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `mng_pmaster`
--

LOCK TABLES `mng_pmaster` WRITE;
/*!40000 ALTER TABLE `mng_pmaster` DISABLE KEYS */;
INSERT INTO `mng_pmaster` VALUES ('101-000003','10.2.109.200','ZZUI12',1024,150,'DVD-RW機器増設'),('101-000004','10.2.109.201','ZZUI13',2048,300,'DVD-RW機器増設');
/*!40000 ALTER TABLE `mng_pmaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `photo` (
  `pid` int(11) NOT NULL auto_increment,
  `pname` varchar(100) default NULL,
  `last_updated` date default NULL,
  `data` blob,
  `content_type` varchar(50) default NULL,
  `category` varchar(10) default NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quest_answer`
--

DROP TABLE IF EXISTS `quest_answer`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `quest_answer` (
  `qid` varchar(10) NOT NULL default '',
  `answer_id` int(11) NOT NULL default '0',
  `answer_title` varchar(100) default NULL,
  `cnt` bigint(20) default NULL,
  PRIMARY KEY  (`qid`,`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `quest_answer`
--

LOCK TABLES `quest_answer` WRITE;
/*!40000 ALTER TABLE `quest_answer` DISABLE KEYS */;
INSERT INTO `quest_answer` VALUES ('Browser',1,'Internet Explorer ',100),('Browser',2,'Safari',30),('Browser',3,'Firefox',50),('Browser',4,'Opera',10),('Browser',5,'その他',10),('Mailer',1,'Outlook Express ',100),('Mailer',2,'Outlook',80),('Mailer',3,'Becky! Internet mail',40),('Mailer',4,'Apple mail',10),('Mailer',5,'その他',10);
/*!40000 ALTER TABLE `quest_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quest_master`
--

DROP TABLE IF EXISTS `quest_master`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `quest_master` (
  `qid` varchar(10) NOT NULL,
  `qtitle` varchar(255) default NULL,
  PRIMARY KEY  (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `quest_master`
--

LOCK TABLES `quest_master` WRITE;
/*!40000 ALTER TABLE `quest_master` DISABLE KEYS */;
INSERT INTO `quest_master` VALUES ('Browser','ご使用のブラウザは何ですか？'),('Mailer','ご使用のメールソフトは何ですか？');
/*!40000 ALTER TABLE `quest_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sche_category`
--

DROP TABLE IF EXISTS `sche_category`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sche_category` (
  `id` int(11) NOT NULL default '0',
  `cnam` varchar(20) default NULL,
  `pic` varchar(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sche_category`
--

LOCK TABLES `sche_category` WRITE;
/*!40000 ALTER TABLE `sche_category` DISABLE KEYS */;
INSERT INTO `sche_category` VALUES (1,'会議','kaigi.gif'),(2,'研修','ken.gif'),(3,'作業','pen.gif'),(4,'私用','pri.gif'),(5,'外出','out.gif');
/*!40000 ALTER TABLE `sche_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sche_master`
--

DROP TABLE IF EXISTS `sche_master`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sche_master` (
  `pid` int(11) NOT NULL auto_increment,
  `id` varchar(10) default NULL,
  `pDat` date default NULL,
  `bTim` time default NULL,
  `eTim` time default NULL,
  `pNam` varchar(100) default NULL,
  `cate` varchar(20) default NULL,
  `memo` text,
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sche_master`
--

LOCK TABLES `sche_master` WRITE;
/*!40000 ALTER TABLE `sche_master` DISABLE KEYS */;
INSERT INTO `sche_master` VALUES (1,'yyamada','2008-05-01','16:00:00','17:00:00','S社打ち合わせ','1','企画書持参'),(2,'yyamada','2008-05-12','00:00:00','02:30:00','サポートサイトのメンテナンス','3',''),(3,'ykimura','2008-05-01','09:30:00','11:30:00','新人研修','2','B支店 会議室'),(4,'nkakeya','2008-05-01','09:00:00','10:00:00','市役所','4','転居届'),(5,'ksato','2008-05-01','11:00:00','15:00:00','税務署','5','申告書');
/*!40000 ALTER TABLE `sche_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user` (
  `uid` char(7) NOT NULL,
  `passwd` varchar(32) default NULL,
  `name` varchar(50) default NULL,
  `depart` varchar(20) default NULL,
  `roles` varchar(50) default NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('hsuzuki','827ccb0eea8a706c4c34a16891f84e7b','鈴木花子','資材','user'),('ksato','827ccb0eea8a706c4c34a16891f84e7b','佐藤圭','製造','supervisor'),('nkakeya','827ccb0eea8a706c4c34a16891f84e7b','掛谷奈美','資材','supervisor'),('ykimura','827ccb0eea8a706c4c34a16891f84e7b','木村勇','製造','user'),('yyamada','827ccb0eea8a706c4c34a16891f84e7b','山田祥寛','資材','admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2008-05-16  7:30:59
