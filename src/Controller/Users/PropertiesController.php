<?php

declare(strict_types=1);

namespace App\Controller;

namespace App\Controller\Users;

use App\Controller\AppController;
/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController
{  
    // public function initialize(): void
    // {
    //     $this->viewBuilder()->setLayout('use');
    // }
    

    public function index()
    {
            $this->viewBuilder()->setLayout('use');
        $values = $this->Authentication->getIdentity();
        if (empty($values)) {
            $this->Flash->error(__('Plese Login first'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $admin = $values->user_type;
        $status = $values->status;
        if ($admin == 1 && $status == 2) {
            // $this->paginate = [
            //     'contain' => ['PropertyCategories']
            // ];
            // $properties = $this->Properties->findAll()->contain            
            $properties = $this->Properties->find()->where(['Properties.status' => '2'])->limit('4');
            // $properties = "S"
            //$properties = $this->paginate($this->Properties->find('all')->where(['properties_status'=>'2']));
            // $properties = $this->Properties->find('all')->where(['properties.status'=>'2']);
            // dd($properties);
            // exit;properties/view/18
            $this->set(compact('properties'));
        } else {
            $this->Flash->error(__('Plese Login first'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
    public function store()
    {
            $this->viewBuilder()->setLayout('use');
        $values = $this->Authentication->getIdentity();
        if (empty($values)) {
            $this->Flash->error(__('Plese Login first'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $admin = $values->user_type;
        $status = $values->status;
        if ($admin == 1 && $status == 2) {
             
            $properties = $this->paginate($this->Properties->find('all')->where(['Properties.status' => '2'])->contain(['PropertyCategories']));
            // dd($properties);
            $this->set(compact('properties'));
        } else {
            $this->Flash->error(__('Plese Login first'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('use');
        $this->Check->chec();
        $values = $this->Authentication->getIdentity();
        if (empty($values)) {
            $this->Flash->error(__('Plese Login first'));
            return $this->redirect(['controller' => 'admin', 'action' => 'login']);
        }
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        if ($admin == 1 && $status == 2) {
            $property = $this->Properties->get($id, [
                'contain' => ['PropertyCategories', 'PropertyComments'],
            ]);
            $name=$this->fetchTable('Users')->find('all')->contain('UserProfile')->toArray();
            foreach($name as $user){
                $comm[$user['id']]=$user->user_profile->first_name.' '.$user->user_profile->last_name;
            }
            $this->set(compact('property','comm'));
        }
         else {
            $this->Flash->error(__('Plese Login first'));
        }
    }









    public function logout()
    {
        $this->Logo->Logo();
    }    
}
