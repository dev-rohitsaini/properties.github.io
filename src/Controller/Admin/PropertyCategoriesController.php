<?php

declare(strict_types=1);

namespace App\Controller;

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PropertyCategories Controller
 *
 * @property \App\Model\Table\PropertyCategoriesTable $PropertyCategories
 * @method \App\Model\Entity\PropertyCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertyCategoriesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

   
        $this->viewBuilder()->setLayout('new');
        // $this->loadComponent('User');
        // $this->loadComponent('Authe');
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        // $id = $values->id;
// dd($values);
        if (empty($values)) {
            $this->Flash->error(__('Plese Login first'));
            return $this->redirect(['controller' => 'admin', 'action' => 'login']);
        }


       else if ($admin == 2 && $status == 2) {
        $propertyCategories = $this->paginate($this->PropertyCategories);

        $this->set(compact('propertyCategories'));}
        else {
            $this->Flash->error(__(' Please Login'));
    
          return  $this->redirect(['action' => 'login']);
                    }
    }

    /**
     * View method
     *
     * @param string|null $id Property Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        // $id = $values->id;
        if ($admin == 2 && $status == 2) {
        $propertyCategory = $this->PropertyCategories->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('propertyCategory'));
    }else {
        $this->Flash->error(__('  Please Login'));

      return  $this->redirect(['action' => 'login']);
                }}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        // $id = $values->id;
        if (empty($values)) {
            $this->Flash->error(__('Plese Login first'));
            return $this->redirect(['controller' => 'admin', 'action' => 'login']);
        }




        if ($admin == 2 && $status == 2) {
        $propertyCategory = $this->PropertyCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $propertyCategory = $this->PropertyCategories->patchEntity($propertyCategory, $this->request->getData());
            if ($this->PropertyCategories->save($propertyCategory)) {
                $this->Flash->success(__('The property category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property category could not be saved. Please, try again.'));
        }
        $this->set(compact('propertyCategory'));}
        else {
            $this->Flash->error(__(' Please Login'));

          return  $this->redirect(['action' => 'login']);
                    }
    }

    /**
     * Edit method
     *
     * @param string|null $id Property Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
       
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        // $id = $values->id;

        if (empty($values)) {
            $this->Flash->error(__('Plese Login first'));
            return $this->redirect(['controller' => 'admin', 'action' => 'login']);
        }


       else if ($admin == 2 && $status == 2) {
        $propertyCategory = $this->PropertyCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propertyCategory = $this->PropertyCategories->patchEntity($propertyCategory, $this->request->getData());
            if ($this->PropertyCategories->save($propertyCategory)) {
                $this->Flash->success(__('The property category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property category could not be saved. Please, try again.'));
        }
        $this->set(compact('propertyCategory'));}
        else {
            $this->Flash->error(__(' Please Login'));

          return  $this->redirect(['action' => 'login']);
                    }
    }

    /**
     * Delete method
     *
     * @param string|null $id Property Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;

        if (empty($values)) {
            $this->Flash->error(__('Plese Login first'));
            return $this->redirect(['controller' => 'admin', 'action' => 'login']);
        }

   
       else if ($admin == 2 && $status == 2) {
        $this->request->allowMethod(['post', 'delete']);
        $propertyCategory = $this->PropertyCategories->get($id);
        if ($this->PropertyCategories->delete($propertyCategory)) {
            $this->Flash->success(__('The property category has been deleted.'));
        } else {
            $this->Flash->error(__('The property category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);}
        else {
            $this->Flash->error(__(' Please Login'));

          return  $this->redirect(['action' => 'login']);
                    }
    }
    // public function logout()
    // {
    //     $this->Logo->Logo();
    // }
    public function status($id = null, $status)

    {
        // print_r($status);
        // die;
 {
            
                // print_r($status);
                // die;
                $this->request->allowMethod(['post']);
                $game = $this->PropertyCategories->get($id);

                if ($status == 1)
                    $game->status = 2;
                else
                
                    $game->status = 1;
                    // dd($game);
                    // dd($properties);
                if ($this->PropertyCategories->save($game)) {
                    
                    
                    $this->Flash->success(__('The user  status has been changed.'));
                }
                return $this->redirect(['action' => 'index']);
            }
           }

    
}

