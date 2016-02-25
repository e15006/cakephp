<?php
namespace App\Controller;
 
use App\Controller\AppController;
 
class MembersController extends AppController{
    public function index()
    {
        $this->set('members', $this->paginate($this->Members));
        $this->set('_serialize', ['members']);
    }

    public function view($id = null)
    {
          $member = $this->Members->get($id, [
        'contain' => ['Messages']
    ]);
    $this->set('member', $member);
    $this->set('_serialize', ['member']);
    }
    
    public function add()
    {
        $this->set(compact('member'));
        $this->set('_serialize', ['member']);
    }
    public function edit($id = null)
    {
       $this->set(compact('member'));
       $this->set('_serialize', ['member']);
    }
    public function delete($id = null)
    {
        return $this->redirect(['action' => 'index']);
    }
    
}