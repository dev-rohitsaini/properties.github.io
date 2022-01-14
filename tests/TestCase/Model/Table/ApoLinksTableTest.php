<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApoLinksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApoLinksTable Test Case
 */
class ApoLinksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ApoLinksTable
     */
    protected $ApoLinks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ApoLinks',
        'app.Appointments',
        'app.Users',
        'app.Properties',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ApoLinks') ? [] : ['className' => ApoLinksTable::class];
        $this->ApoLinks = $this->getTableLocator()->get('ApoLinks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ApoLinks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ApoLinksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ApoLinksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
