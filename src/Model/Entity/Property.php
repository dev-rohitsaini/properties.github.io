<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property string $property_title
 * @property string $property_description
 * @property int $property_categories_id
 * @property string $property_image
 * @property string $property_tags
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime $modified_date
 *
 * @property \App\Model\Entity\PropertyCategory $property_category
 * @property \App\Model\Entity\PropertyComment[] $property_comments
 */
class Property extends Entity
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
        'property_title' => true,
        'property_description' => true,
        'property_categories_id' => true,
        'property_image' => true,
        'property_tags' => true,
        'status' => true,
        'created_date' => true,
        'modified_date' => true,
        'property_category' => true,
        'property_comments' => true,
    ];
}
