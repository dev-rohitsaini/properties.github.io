<?php

declare(strict_types=1);

namespace App\Controller;

namespace App\Controller\Users;

use App\Controller\AppController;
use SebastianBergmann\Environment\Console;

/**
 * PropertyComments Controller
 *
 * @property \App\Model\Table\PropertyCommentsTable $PropertyComments
 * @method \App\Model\Entity\PropertyComment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertyCommentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Properties', 'Users'],
        ];
        $propertyComments = $this->paginate($this->PropertyComments);
        $this->set(compact('propertyComments'));
    }

    /**
     * View method
     *
     * @param string|null $id Property Comment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertyComment = $this->PropertyComments->get($id, [
            'contain' => ['Properties', 'Users'],
        ]);

        $this->set(compact('propertyComment'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $this->Check->Chec();
        $propertyComment = $this->PropertyComments->newEmptyEntity();
        if ($this->request->is('post')) {
            $propertyComment = $this->PropertyComments->patchEntity($propertyComment, $this->request->getData());
            $propertyComment->user_id = $this->request->getAttribute('identity')->getIdentifier();
            $propertyComment->property_id = $id;
            if ($this->PropertyComments->save($propertyComment)) {
                return $this->redirect(['controller' => 'Properties', 'action' => 'view', $id]);
            }
            $this->Flash->error(__('The property comment could not be saved. Please, try again.'));
            return $this->redirect(['controller' => 'Properties', 'action' => 'view', $id]);
        }
        // $properties = $this->PropertyComments->Properties->find('list', ['limit' => 200])->all();
        // $users = $this->PropertyComments->Users->find('list', ['limit' => 200])->all();
        // $this->set(compact('propertyComment', 'properties', 'users'));
    }

    public function addcomment($pid=null){
        $id = $pid; 
        if ($this->request->is('ajax')){
            $propertyComment = $this->PropertyComments->newEmptyEntity();
            $propertyComment = $this->PropertyComments->patchEntity($propertyComment, $this->request->getData());
            // dd($propertyComment);
        $propertyComment->property_id = $id;
        $propertyComment->user_id = $this->request->getAttribute('identity')->getIdentifier();
        
        if ($this->PropertyComments->save($propertyComment)) {
            
        
            $this->Flash->success(__('Comment Added'));

            echo json_encode(array(
                "status" => 1,
                "message" => "Review has been posted"
            )); 

           
exit;
     
   
    }
    $this->Flash->error(__('Can not add review pls contact to admin'));

    echo json_encode(array($propertyComment,
        "status" => 0,
        "message" => "Failed to create"
    )); 

    exit;}}
    public function getData(){

        

    }
    public function logout()
    {
        $this->Logo->Logo();
    }

   
}
