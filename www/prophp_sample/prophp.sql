-- 本書で使用するデータベースとテーブルを作成するためのSQL文です。
-- 必要に応じて、mysqlコマンドを実行しているSSHターミナル上にペーストして使えます。
-- 文字エンコーディングのutf8mb4はMySQL5.5以降で使用可能です。

--------------------------------
-- 5.1.5 とりあえずCakePHPで作ってみる

use ppdb

charset utf8mb4

CREATE TABLE burgers (
id    INT UNSIGNED NOT NULL AUTO_INCREMENT,
name  VARCHAR(80),
price INT,
PRIMARY KEY(id)
);

INSERT INTO burgers (name, price) VALUES ('チーズハンバーガー', 280);
INSERT INTO burgers (name, price) VALUES ('えびハンバーガー', 350);
INSERT INTO burgers (name, price) VALUES ('和風ハンバーガー', 320);

--------------------------------
-- A.3.1 データベースと接続ユーザの作成

charset utf8mb4

CREATE DATABASE ppdb CHARACTER SET utf8mb4;

SHOW CREATE DATABASE ppdb;

-- 管理者ユーザの作成 'AAAAAAAAAA'の部分は任意のパスワード文字列を決定し指定してください。
GRANT ALL ON ppdb.* TO 'ppadmin'@'localhost' IDENTIFIED BY 'AAAAAAAAAA';

-- 一般ユーザの作成 'GGGGGGGGGG'の部分はは任意のパスワード文字列を決定し指定してください。
GRANT SELECT ON ppdb.* TO 'ppguest'@'localhost' IDENTIFIED BY 'GGGGGGGGGG';

--------------------------------
-- A.3.2 郵便番号データテーブル（zipcodes）の作成

CREATE TABLE zipcodes (
jiscode  VARCHAR(8),
zipcode  VARCHAR(8),
pref     VARCHAR(128),
city     VARCHAR(128),
town     VARCHAR(128),
townkana VARCHAR(128)
);

LOAD DATA LOCAL INFILE "/home/ppuser/KEN_ALL.CSV" INTO TABLE zipcodes
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
(jiscode, @dmy, zipcode, @dmy, @dmy, townkana, pref, city, town,
@dmy, @dmy, @dmy, @dmy, @dmy, @dmy);

--------------------------------
-- A.3.3 ユーザ情報テーブル（users）の作成

CREATE TABLE users(
id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
username    VARCHAR(50),
password    VARCHAR(70),
PRIMARY KEY (id)
);

-- 次の1行は、Linuxコマンドプロンプトで実行するコマンド
-- php -r 'echo(hash("sha256", "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXyyyyyyyyyyyy")."\n");'
-- XXXXX…がソルト値、yyyyy…がパスワード

-- ZZZZZ…は上記のphpコマンド実行によって得られた暗号化文字列。
-- この暗号化文字列をusersテーブルのpassword列に格納してください。
INSERT INTO users VALUES(0, 'ppuser', 'ZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZ');

--------------------------------
-- A.3.4 ToneMeアプリケーション用のテーブルの作成

CREATE TABLE feelings (
id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
name        VARCHAR(50) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE artists (
id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
name        VARCHAR(90) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE tunes (
id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
name        VARCHAR(90) NOT NULL,
artist_id   INT UNSIGNED NOT NULL,
feeling_id  INT UNSIGNED NOT NULL,
comcont     TEXT,
modified    DATETIME,
PRIMARY KEY (id)
);

INSERT INTO feelings VALUES(NULL, 'ルンルン');
INSERT INTO feelings VALUES(NULL, 'ノリノリ');
INSERT INTO feelings VALUES(NULL, 'ホノボノ');
INSERT INTO feelings VALUES(NULL, 'ラブラブ');
INSERT INTO feelings VALUES(NULL, 'ヘロヘロ');
INSERT INTO feelings VALUES(NULL, 'ガックリ');

INSERT INTO artists VALUES(NULL, 'ソフトズ');
INSERT INTO artists VALUES(NULL, '丸見栄子');
INSERT INTO artists VALUES(NULL, 'コナチーズ');
INSERT INTO artists VALUES(NULL, '上部安埔里');
INSERT INTO artists VALUES(NULL, '森見タマエ');
INSERT INTO artists VALUES(NULL, 'ピーエッチピー');

INSERT INTO tunes VALUES(NULL, '春だよね', 1, 1, '春が来ると聴きたくなる曲です', NOW());
INSERT INTO tunes VALUES(NULL, '夏だよね', 1, 2, '夏が来ると聴きたくなる曲です', NOW());
INSERT INTO tunes VALUES(NULL, '秋だよね', 2, 3, '秋が来ると聴きたくなる曲です', NOW());
INSERT INTO tunes VALUES(NULL, '冬だよね', 2, 4, 'また冬がやって来ました', NOW());
INSERT INTO tunes VALUES(NULL, '朝が来た', 3, 5, '朝が来ると聴きたくなります', NOW());
INSERT INTO tunes VALUES(NULL, '昼だよ', 3, 6, '昼になると聴きたくなります', NOW());
INSERT INTO tunes VALUES(NULL, 'もう夜', 4, 1, 'これを聴くと眠くなります', NOW());
INSERT INTO tunes VALUES(NULL, 'あけがた', 4, 2, '', NOW());
INSERT INTO tunes VALUES(NULL, '楽しいな', 5, 3, '楽しいときに聴きたい曲です', NOW());
INSERT INTO tunes VALUES(NULL, 'うれしいな', 5, 4, 'これを聴くとうれしくなります', NOW());
INSERT INTO tunes VALUES(NULL, '迷っちゃう', 6, 5, 'もう迷いたくないです', NOW());
INSERT INTO tunes VALUES(NULL, 'もう食べられない', 6, 6, '満腹状態になると聴きたくなります', NOW());
