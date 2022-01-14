<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PropertyComment Entity
 *
 * @property int $id
 * @property int $property_id
 * @property int $user_id
 * @property string $comments
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime $modified_date
 *
 * @property \App\Model\Entity\Property $property
 * @property \App\Model\Entity\User $user
 */
class PropertyComment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'property_id' => true,
        'user_id' => true,
        'comments' => true,
        'created_date' => true,
        'modified_date' => true,
        'property' => true,
        'user' => true,
    ];
}
