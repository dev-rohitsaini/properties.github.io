<?php

declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;

class AutheComponent extends Component
{

    public function auths()
    {
        $values = $this->getController()->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        // $id = $values->id;


        if ($admin == 2 && $status == 2) {

            return $this->getController()->redirect(['controller' => 'Users', 'action' => 'index']);
            // AuthComponent::allow($actions = null);
            // $this->Auth->allow('view');


            // $redirect = $this->request->getQuery('redirect', [
            //     'controller' => 'users',
            //     'action' => 'index',
            // ]);
        
        } else {
            
            return $this->Flash->error(__('details are Not Valid '));
        }
    }
}
