<?php
//--------------------------------------------------------------//
//!	Tuneモデルクラス
class Tune extends AppModel
{
	public	$belongsTo = array('Artist', 'Feeling');	//!<	アソシエーション

	//!	バリデーションのルール
	public	$validate = array(
							'name'		=>	array(
								'rule'		=>	array('between', 1, 20),
								'message'	=>	'曲名は20文字以内で入力してください'),
							'artist_id'	=>	array(
								'rule'		=>	array('range', 0, 100),
								'message'	=>	'アーティストを選択してください'),
							'feeling_id'=>	array(
								'rule'		=>	array('range', 0, 100),
								'message'	=>	'気持ちを選択してください'),
							'comcont'	=>	array(
								'rule'		=>	array('maxLength', 30),
								'message'	=>	'コメントは30文字以内で入力してください')
							);

	//------------------------------//
	//!	キモチ曲検索処理
	//!	@param	integer	$feelId	気持ちID
	//!	@return	array			曲データ
	function findFeeling($feelId = null) {
		if($feelId < 1 || $feelId > 6){
			return NULL;
		}

		//	気持ちIDに一致する曲データの件数を取得する
		$results = $this->find('count', array('conditions' => array('Tune.feeling_id' => $feelId)));
		if($results <= 0){
			return NULL;
		}

		//	ランダムで選択する（たとえば5件なら、1～5の中から1つ選ぶ）
		$offset = mt_rand(1, $results);
		$offset -= 1;

		$results = $this->find('first',
			array(	'conditions' => array('Tune.feeling_id' => $feelId),
					'fields' => array('Tune.id', 'Tune.name', 'Tune.feeling_id',
										'Artist.name', 'Feeling.name', 'Tune.comcont'),
					'order' => array('Tune.id'),
					'limit' => 1,
					'offset' => $offset
			));

		return $results;
	}
}
