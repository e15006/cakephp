<?php
class BurgersController extends AppController {
	function index() {
		$this->set('burgers', $this->Burger->find('all'));
	}
}
