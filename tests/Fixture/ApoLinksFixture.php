<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApoLinksFixture
 */
class ApoLinksFixture extends TestFixture
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
                'appointment_id' => 1,
                'user_id' => 1,
                'properties_id' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'created_date' => 1640158257,
                'modified_date' => 1640158257,
            ],
        ];
        parent::init();
    }
}
