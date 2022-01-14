<?php


declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;

class CheckComponent extends Component
{

  public function chec()
  {
    $values = $this->getController()->Authentication->getIdentity();
    if (empty($values)) {
      $this->getController()->Flash->error(__('Plese Login first'));
      return $this->getController()->redirect(['controller' => 'users', 'action' => 'login']);
    }
  }
}
