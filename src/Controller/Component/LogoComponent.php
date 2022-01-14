<?php

declare(strict_types=1);


namespace App\Controller\Component;

use Cake\Controller\Component;


class LogoComponent extends Component
{

    public function Logo()
    {
$result = $this->getController()->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->getController()->Authentication->logout();
            return $this->getController()->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }}

?>