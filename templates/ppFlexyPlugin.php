<?php
//!	HTML_Template_Flexyのサンプル	独自のプラグインクラス
class PpFlexyPlugin
{
	public function hs($text) {
		return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
	}
}
