<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tag Entity
 *
 * @property int $id
 * @property int $properties_id
 * @property string $tags_name
 *
 * @property \App\Model\Entity\Property $property
 * @property \App\Model\Entity\PropertyTag[] $property_tags
 */
class Tag extends Entity
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
        'properties_id' => true,
        'tags_name' => true,
        'property' => true,
        'property_tags' => true,
    ];
}
