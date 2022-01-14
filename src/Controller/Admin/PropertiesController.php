<?php

declare(strict_types=1);

namespace App\Controller;

namespace App\Controller\Admin;

use App\Controller\AppController;


/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

   
        $this->viewBuilder()->setLayout('new');
       
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()

    {
        // $this->Check->Chec();
 
        $values = $this->Authentication->getIdentity();
        if (empty($values)) {
            $this->Flash->error(__('Plese Login first'));
            return $this->redirect(['controller'=>'users', 'action' => 'login']);
        }
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        if ($admin == 2 && $status == 2) {
            $this->paginate = [
                'contain' => ['PropertyCategories'],
            ];
            $properties = $this->paginate($this->Properties);
// dd($properties);
            $this->set(compact('properties'));
        } else {
            $this->Logo->logo();
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
            $this->Flash->error(__(' this page is not accessible for users'));
        }
    }

   
    public function view($id = null)
    {   $this->Check->Chec();
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        if ($admin == 2 && $status == 2) {
            $property = $this->Properties->get($id, [
                'contain' => ['PropertyCategories', 'PropertyComments'],
            ]);
            $name=$this->fetchTable('Users')->find('all')->contain('UserProfile')->toArray();
            foreach($name as $user){
                $comm[$user['id']]=$user->user_profile->first_name.' '.$user->user_profile->last_name;
            }
            $this->set(compact('property','comm'));
            // $this->set(compact('property'));
        } else {
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
            $this->Flash->error(__(' this page is not accessible for users'));
        }
    }
    public function add()
    {

        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        if ($admin == 2 && $status == 2) {
            $property = $this->Properties->newEmptyEntity();
            if ($this->request->is('post')) {

                $property = $this->Properties->patchEntity($property, $this->request->getData());
// dd($property);
                if (!$property->getErrors) {

                    $image = $this->request->getData('property_image');

                    $name = $image->getClientFilename() . rand(99, 999);

                    $targetpath = WWW_ROOT . 'img' . DS . 'property_images' . DS . $name;

                    if ($name)
                        $image->moveTo($targetpath);
                    $property->property_image = 'property_images/' . $name;
                }
                if ($this->Properties->save($property)) {
                    $this->Flash->success(__('The property has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The property could not be saved. Please, try again.'));
            }
            $propertyCategories = $this->Properties->PropertyCategories->find('list', ['limit' => 200])->where(['status is'=>'2']);
            $this->set(compact('property', 'propertyCategories'));
        } else {
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
            $this->Flash->error(__(' this page is not accessible for users'));
        }
    }
    public function edit($id = null)
    {

        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        if ($admin == 2 && $status == 2) {
            $property = $this->Properties->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $property = $this->Properties->patchEntity($property, $this->request->getData());


                if (!$property->getErrors) {

                    $image = $this->request->getData('property_image');

                    $name = $image->getClientFilename() . rand(99, 999);

                    $targetpath = WWW_ROOT . 'img' . DS . 'property_images' . DS . $name;

                    if ($name)
                        $image->moveTo($targetpath);
                    $property->property_image = 'property_images/' . $name;
                }






                if ($this->Properties->save($property)) {
                    $this->Flash->success(__('The property has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The property could not be saved. Please, try again.'));
            }
            $propertyCategories = $this->Properties->PropertyCategories->find('list', ['limit' => 200])->all();
            $this->set(compact('property', 'propertyCategories'));
        } else {
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
            $this->Flash->error(__(' this page is not accessible for users'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        if ($admin == 2 && $status == 2) {
            $this->request->allowMethod(['post', 'delete']);
            $property = $this->Properties->get($id);
            if ($this->Properties->delete($property)) {
                $this->Flash->success(__('The property has been deleted.'));
            } else {
                $this->Flash->error(__('The property could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        } else {
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
            $this->Flash->error(__(' this page is not accessible for users'));
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
        $this->request->allowMethod(['post']);
        $properties = $this->Properties->get($id);
        if ($status == 2)
            $properties->status = 1;
        else
            $properties->status = 2;
        if ($this->Properties->save($properties)) {
            $this->Flash->success(__('The user  status has been changed.'));
        }
        return $this->redirect(['action' => 'view',$id]);
    }
}
