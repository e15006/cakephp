<?php
//--------------------------------------------------------------//
//!	Tunesコントローラクラス
class TunesController extends AppController {
	public	$components = array('Security', 'Auth');	//!<	コンポーネント
	public	$uses = array('Tune', 'Artist', 'Feeling');	//!<	モデル
	public	$layout = 'toneme';							//!<	レイアウト

	//------------------------------//
	//!	アクションが呼び出される前に呼ばれるメソッド
	function beforeFilter() {
		Security::setHash('sha256');	//	暗号化方法をSHA-256にする
		if($this->action === 'index' || $this->action === 'search'){
			$this->Security->validatePost = false;
		}

		$this->Auth->allow('index');	//	キモチ曲検索画面は認証不要
		$this->Auth->authError = 'ログインしてください';
	}

	//------------------------------//
	//!	キモチ曲検索（一般ユーザ用）
	function index() {
		if(!empty($this->params['form'])){
			$feeling_id = 0;
			for($idx = 1; $idx <= 6; $idx ++){
				if(isset($this->params['form']['btn' . $idx . '_x'])){
					$feeling_id = $idx;
					break;
				}
			}

			if($feeling_id >= 1 && $feeling_id <= 6){
				$result = $this->Tune->findFeeling($feeling_id);
				if($result !== null){
					$this->set('tune', $result);
				}
			}
		}
	}

	//------------------------------//
	//!	曲データ検索（管理者用）
	function search() {
		$aopts = $this->Artist->find('list');
		$aopts['0'] = '指定しない';
		ksort($aopts);
		$this->set('artists', $aopts);

		$fopts = $this->Feeling->find('list');
		$fopts['0'] = '指定しない';
		ksort($fopts);
		$this->set('feelings', $fopts);

		$cond = array();	//	検索条件を作る
		if(!empty($this->data)){
			if($this->data['Tune']['name'] != ''){
				$tn = preg_replace('/([_%#])/u', '#$1', $this->data['Tune']['name']);
				$cond["Tune.name LIKE ? ESCAPE '#'"] = array('%' . $tn . '%');
			}
			if(!empty($this->data['Tune']['artist_id'])){
				$cond['Tune.artist_id'] = $this->data['Tune']['artist_id'];
			}
			if(!empty($this->data['Tune']['feeling_id'])){
				$cond['Tune.feeling_id'] = $this->data['Tune']['feeling_id'];
			}
		}
		$this->set('tunes', $this->Tune->find('all',
											array('conditions' => $cond, 'limit' => 100)));
	}

	//------------------------------//
	//!	曲データ追加（管理者用）
	function add() {
		$this->set('artists', $this->Artist->find('list', array('order' => 'Artist.id ASC')));
		$this->set('feelings', $this->Feeling->find('list', array('order' => 'Feeling.id ASC')));
		if(!empty($this->data)){
			if($this->Tune->save($this->data)){
				$this->Session->setFlash('追加しました');
				$this->redirect(array('action' => 'search'));
			}
		}
	}

	//------------------------------//
	//!	曲データ編集（管理者用）
	function edit($id = null) {
		$this->Tune->id = $id;

		$this->set('artists', $this->Artist->find('list', array('order' => 'Artist.id ASC')));
		$this->set('feelings', $this->Feeling->find('list', array('order' => 'Feeling.id ASC')));

		if(empty($this->data)){
			$this->data = $this->Tune->read();
			if(!is_array($this->data)){
				$this->redirect(array('action' => 'search'));
			}
		}
		else{
			if($this->Tune->save($this->data)){
				$this->Session->setFlash('保存しました');
				$this->redirect(array('action' => 'search'));
			}
		}
	}

	//------------------------------//
	//!	曲データ削除（管理者用）
	function delete($id = null) {
		$this->Tune->id = $id;

		if(empty($this->data)){
			$this->data = $this->Tune->read();
			if(!is_array($this->data)){
				$this->redirect(array('action' => 'search'));
			}
		}
		else{
			if($this->Tune->delete($id)){
				$this->Session->setFlash('削除しました');
			}
			$this->redirect(array('action' => 'search'));
		}
	}
}
