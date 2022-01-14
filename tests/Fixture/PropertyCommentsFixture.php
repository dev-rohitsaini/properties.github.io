<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropertyCommentsFixture
 */
class PropertyCommentsFixture extends TestFixture
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
                'property_id' => 1,
                'user_id' => 1,
                'comments' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2021-11-30 05:43:36',
                'modified_date' => '2021-11-30 05:43:36',
            ],
        ];
        parent::init();
    }
}
