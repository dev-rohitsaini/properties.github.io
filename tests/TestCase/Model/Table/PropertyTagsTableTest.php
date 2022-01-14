<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropertyTagsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropertyTagsTable Test Case
 */
class PropertyTagsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PropertyTagsTable
     */
    protected $PropertyTags;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PropertyTags',
        'app.Tags',
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
        $config = $this->getTableLocator()->exists('PropertyTags') ? [] : ['className' => PropertyTagsTable::class];
        $this->PropertyTags = $this->getTableLocator()->get('PropertyTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PropertyTags);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PropertyTagsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PropertyTagsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
