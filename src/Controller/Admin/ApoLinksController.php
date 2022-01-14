<?php

declare(strict_types=1);


namespace App\Controller;
namespace App\Controller\Admin;
use App\Controller\AppController;
class ApoLinksController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
   
        $this->viewBuilder()->setLayout('new');
        
    }


    public function index()
    {
        $this->fetchTable('ApoLinks');

       

        $hello = $this->ApoLinks->get_properties();
//         foreach($hello as $users){
//         $name=$this->fetchTable('UserProfile')->find('all')->where(['User_id'=>$users->user_id])->toArray();
//         foreach($name as $user){
//             $comm[$user['id']]=$user->user_profile->first_name.' '.$user->user_profile->last_name;
//         }
        
//     }

// dd($hello);

        $this->set(compact(['hello']));
    }


    // public function Watch
    
    
    public function status($id = null, $status)

    {
        // print_r($status);
        // die;
        $this->request->allowMethod(['post']);
        $hello = $this->ApoLinks->get($id);
        if ($status == 2)
            $hello->status = 1;
        else
            $hello->status = 2;
        if ($this->ApoLinks->save($hello)) {
            $this->Flash->success(__('The user  status has been changed.'));
        }
        return $this->redirect(['action' => 'index',$id]);
    }

   
}
