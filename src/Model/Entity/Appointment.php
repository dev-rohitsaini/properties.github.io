<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Appointment extends Entity
{
  
    protected $_accessible = [
        'date' => true,
        'slot' => true,
        'process' => true,
        'status' => true,
        'created_date' => true,
        'modified_date' => true,
        'apo_links' => true,
    ];
}
