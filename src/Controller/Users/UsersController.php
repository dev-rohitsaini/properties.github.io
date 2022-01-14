<?php

declare(strict_types=1);

namespace App\Controller;

namespace App\Controller\Users;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
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
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) { {
                $values = $this->Authentication->getIdentity();
                $admin = $values->user_type;
                $status = $values->status;
                // $id = $values->id;
                if ($admin == 1 && $status == 2) {
                    return $this->redirect(['controller' => 'Properties', 'action' => 'index']);
                    $this->Authentication->addUnauthenticatedActions(['view', 'edit']);
                } else if ($admin == 1 && $status == 1) {
                    $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                    return $this->Flash->error(__('this email is not verified contact admin to change the details'));
                } else {
                    $this->Flash->error(__('Not Valid Details'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                }
            }
            // redirect to /articles after login success
            // $redirect = $this->request->getQuery('redirect', [
            //     'controller' => 'Users',
            //     'action' => 'index',
            // ]);
            // return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    public function logout()
    {
        $this->Logo->Logo();
    }
    /**
     * Index method  *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $this->Check->chec();
        $values = $this->Authentication->getIdentity();
        if (empty($values)) {
            $this->Flash->error(__('Plese Login first'));
            return $this->redirect(['controller' => 'admin', 'action' => 'login']);
        }
        $values = $this->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        if ($admin == 2 && $status == 2) {
            $users = $this->paginate($this->Users);
            $this->set(compact('users'));
        } else {
            $this->redirect(['action' => 'login']);
            // $this->Flash->error(__(' this page is not accessible for users'));
        }
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $values = $this->Authentication->getIdentity();
    //     $admin = $values->user_type;
    //     $status = $values->status;
    //     if ($admin == 2 && $status == 2) {
    //         $user = $this->Users->get($id, [
    //             'contain' => ['Comments'],
    //         ]);
    //         $this->set(compact('user'));
    //     } else if ($admin == 1 && $status == 2) {
    //         $user = $this->Authentication->getIdentity();

    //         $id = $user->id;
    //         $this->set(compact('user'));
    //     } else {
    //         $this->Flash->error(__('Something went wrong'));
    //     }
    // }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('use');
        // $this->Users->validationErrors;
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['associated' => ['UserProfile']]);
            //    print_r($user);
            //    die;
            // $image = $this->request->getData('user_profile.profile_image');
            // $name= $image->getClientFilename();
            // debug($name);
            // exit;
// dd($user);
           
            $email = $user->email;
            // dd($this->request->getData());
            if (!$user->getErrors) {
                // dd($this->request->getData());
                $image = $this->request->getData('user_profile.profile_image');
               
                    // dd($image);
                 // $ext = '.png';
                $name = $image->getClientFilename();
                // $type = $image->getClientMediaType();
                // $name = date("y").rand(99,9999).$ext;
                $targetpath = WWW_ROOT . 'img' . DS . 'profile_images' . DS . $email . $name;
                // pr($targetpath);
                // die;
                if ($name)
                    $image->moveTo($targetpath);
                $user->user_profile->profile_image = 'profile_images/' . $email . $name;
                // dd($this->request->getData());

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'login']);
                }
            }
            
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    /**
     * Edit method
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $user = $this->Users->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $user = $this->Users->patchEntity($user, $this->request->getData());
    //         if ($this->Users->save($user)) {
    //             $this->Flash->success(__('The user has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('user'));
    // }
    /**
     * Delete method
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $values = $this->Authentication->getIdentity();
    //     $admin = $values->user_type;
    //     $status = $values->status;

    //     if ($admin == 2 && $status == 2) {
    //         $this->request->allowMethod(['post', 'delete']);
    //         $user = $this->Users->get($id);
    //         if ($this->Users->delete($user)) {
    //             $this->Flash->success(__('The user has been deleted.'));
    //         } else {
    //             $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    //         }
    //         return $this->redirect(['action' => 'index']);
    //     } else {
    //         $this->redirect(['action' => 'view', $values->id]);
    //         return $this->Flash->error(__('contact admin to change the details'));
    //     }
    // }
}
