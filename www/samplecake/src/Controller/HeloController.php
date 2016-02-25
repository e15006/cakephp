<?php
namespace App\Controller;
 
use App\Controller\AppController;
//クラス定義、  [  ]+Controller 
class HeloController extends AppController
{

public function index($a = '')
    {
     $str = $this->request->data('text1');
  $msg = 'typed: ' . $str;
  if ($str == null) 
    { $msg = "please type..."; }
  $this->set('message', $msg);
    }
}