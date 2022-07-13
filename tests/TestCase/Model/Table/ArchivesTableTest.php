<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArchivesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArchivesTable Test Case
 */
class ArchivesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArchivesTable
     */
    protected $Archives;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Archives',
        'app.Addresses',
        'app.Manifestations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Archives') ? [] : ['className' => ArchivesTable::class];
        $this->Archives = $this->getTableLocator()->get('Archives', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Archives);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ArchivesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ArchivesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
