<?php

declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;

class AutheComponent extends Component
{

    public function user()
    {
        $values = $this->getController()->Authentication->getIdentity();
        $admin = $values->user_type;
        $status = $values->status;
        // $id = $values->id;


        
          if ($admin == 1 && $status == 2) {

            return $this->getController()->redirect(['controller' => 'Properties', 'action' => 'index']);
            
            $this->Authentication->addUnauthenticatedActions(['view', 'edit']);
        } else if ($admin == 1 && $status == 1) {
            $this->getController()->redirect(['controller' => 'Users', 'action' => 'logout']);

            return $this->Flash->error(__('this email is not verified contact admin to change the details'));
        } else {
            return $this->Flash->error(__('do not contact to anybody you are just a ghost'));
        }
    }
}
