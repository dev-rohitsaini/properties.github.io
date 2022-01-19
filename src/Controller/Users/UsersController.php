<?php

declare(strict_types=1);

namespace App\Controller;

namespace App\Controller\Users;
use Cake\Auth\DefaultPasswordHasher;
use App\Controller\AppController;
use Cake\Mailer\Mailer;
use Cake\Datasource\ConnectionManager;



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
        $this->connection = ConnectionManager::get('default');
   
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
   
    public function add()
    {
        $this->viewBuilder()->setLayout('use');
        // $this->Users->validationErrors;
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['associated' => ['UserProfile']]);
            
           
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
    public function forget(){
        if($this->request->is('post')){
            $email=   $this->request->getData();
           $hello = $this->Users->find('All')->where(['email'=>implode($email)])->toList();
        //    dd($hello);
   if(!empty($hello)){
   $token = rand(111111 ,999999);
   $data = $this->connection->update("users", [ "token" => $token ],
   [ "email" => implode($email) ]);
   if($data){
       $this->redirect(['action'=>'reset']);
   }
   
   
   
   }else{
       return $this->Flash->error("The given email is not registred");
   }
        
       
       }
       }
       public function sendMail($token=null){
           $a= "";
           $message = "your Appointment is booked on  $a requested time our agent get in touch with you shortly";            
           $mailer = new Mailer();
           $mailer->setTransport('mail');
           $mailer->setFrom(['tqmassociate@gmail.com' => '88Acers'])
           ->setTo('rohi699t@gmail.com')
           ->setSubject('Test')
           ->deliver($message);
           return $this->redirect(['action'=>'reset',$token]);
       }
       public function reset(){
          
           if($this->request->is('post')){
               $user = $this->request->getData();
   
               $token =  $user['token'];
               $password =  $user['password'];
             
   $hasher = new DefaultPasswordHasher();
   $password = $hasher->hash($password);
   // dd($password);
               $data = $this->connection->update ("users", [ "password" => $password ],
   [ "token" => $token ]);
   if($data){
   
       $this->Flash->success("The Password has been updated");
      return $this->redirect(['action'=>'login']);
   }
          
   // dd($token, $password);
   
           }
   
       }
    
}
