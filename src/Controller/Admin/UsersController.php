<?php

declare(strict_types=1);
namespace App\Controller;
namespace App\Controller\Admin;
use App\Controller\AppController;


class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->viewBuilder()->setLayout('new');
        // $this->loadComponent('User');
        // $this->loadComponent('Authe');
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // pr($result);
        // die;
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $values = $this->Authentication->getIdentity();
            $admin = $values->user_type;
            $status = $values->status;
          
            if ($admin == 2 && $status == 2) {

                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
                // AuthComponent::allow($actions = null);
                // $this->Auth->allow('view');


                // $redirect = $this->request->getQuery('redirect', [
                //     'controller' => 'users',
                //     'action' => 'index',
                // ]);

            } else {

                $this->Flash->error(__('details are Not Valid '));
                return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
            }
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    public function logout()
    {
        $this->Logo->logo();
    }
  
    public function index()
    {
  
        $this->Check->chec();

        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
       
        // dd($values);
        if ($admin == 2 && $status == 2) {
            $users = $this->paginate($this->Users->find('all')->where(['Users.user_type' => '1'])->contain(['UserProfile']));
            //    pr($users);
            //    exit;
            // $users = $this->paginate($this->Users);

            $this->set(compact('users'));
        } else {
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
            $this->Flash->error(__('this page is not accessible for users'));
        }
    }
    public function usep($id=null)
    {
  
        // $this->Check->chec();

        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
       
        // dd($id);
        if ($admin == 2 && $status == 2) {
            
            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);
            // $users = $this->Users->get($id, [
            //     'contain' => ['Comments'],
            // ]);
            // $this->set(compact('user'));
            //    pr($users);
            //    exit;
            // $users = $this->paginate($this->Users);
//  dd($user);
            $this->set(compact('user'));
        } else {
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
            $this->Flash->error(__('this page is not accessible for users'));
        }
    }

    public function view($id = null)
    {
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;

        if ($admin == 2 && $status == 2) {
            $user = $this->Users->get($id, [
                'contain' => ['Comments'],
            ]);
            $this->set(compact('user'));
        } else if ($admin == 1 && $status == 2) {
            $user = $this->Authentication->getIdentity();

            $id = $user->id;
            $this->set(compact('user'));
        } else {
            $this->Flash->error(__('Something went wrong'));
        }
    }

    
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }


    public function delete($id = null)
    {
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;

        if ($admin == 2 && $status == 2) {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        } else {
            $this->redirect(['action' => 'view', $values->id]);
            return $this->Flash->error(__('contact admin to change the details'));
        }
    }
    public function status($id = null, $status)

    {
        // print_r($status);
        // die;
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
        if ($status == 2)
            $user->status = 1;
        else
            $user->status = 2;
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user  status has been changed.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
