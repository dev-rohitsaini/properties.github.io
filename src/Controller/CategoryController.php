<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

use Cake\Datasource\connectionManager;

class CategoryController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
   
    }
    public function index()
    {
        $parentCategory = $this->Category->find('list', ['limit' => 200])->where(['parent_id is' => null]);
        // $users = $this->paginate($this->Users->find('all')->where(['Users.user_type' => '1'])->contain(['UserProfile']));
        $this->set(compact('parentCategory'));
        $category = $this->Category->newEmptyEntity();
        if ($this->request->is('post')) {
            $category = $this->Category->patchEntity($category, $this->request->getData());

            //    dd($category);
            if ($this->Category->save($category)) {

                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'view']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
       
    }
    public function view()
    {
        $con = connectionManager::get('default');
        $results = $con->execute('SELECT * FROM category')->fetchAll('assoc');
        dd($results);
    }
}


