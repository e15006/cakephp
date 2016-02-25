<?php
//--------------------------------------------------------------//
//!	Userコントローラクラス
class UsersController extends AppController {
	public	$components = array('Auth');	//!<	コンポーネント
	public	$layout = 'toneme';				//!<	レイアウト

	//------------------------------//
	//!	アクションが呼び出される前
	function beforeFilter() {
		Security::setHash('sha256');	//	暗号化方法をSHA-256にする

		$this->Auth->loginError = 'ログインに失敗しました';
		$this->Auth->authError = 'ログインしてください';

		//	ログイン後の遷移先
		$this->Auth->loginRedirect = array('controller' => 'tunes', 'action' => 'search');
	}

	//------------------------------//
	//!	ビューがレンダされる前
	function beforeRender(){
		//	ログインに失敗したとき、ユーザ名を空白表示にするため
		//	(パスワード欄は、Authコンポーネントがクリアしてくれる)
		$this->data['User']['username'] = NULL;
	}

	//------------------------------//
	//!	ログイン
	function login(){
		$this->Session->delete('Auth.redirect');
	}

	//------------------------------//
	//!	ログアウト
	function logout(){
		$this->redirect($this->Auth->logout());
	}
}
