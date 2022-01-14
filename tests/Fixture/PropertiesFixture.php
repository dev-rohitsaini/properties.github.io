<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropertiesFixture
 */
class PropertiesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'property_title' => 'Lorem ipsum dolor sit amet',
                'property_description' => 'Lorem ipsum dolor sit amet',
                'property_categories_id' => 1,
                'property_image' => 'Lorem ipsum dolor sit amet',
                'property_tags' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2021-11-30 05:43:18',
                'modified_date' => '2021-11-30 05:43:18',
            ],
        ];
        parent::init();
    }
}
