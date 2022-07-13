<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SendersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SendersTable Test Case
 */
class SendersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SendersTable
     */
    protected $Senders;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Senders',
        'app.Letters',
        'app.Persons',
        'app.Institutions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Senders') ? [] : ['className' => SendersTable::class];
        $this->Senders = $this->getTableLocator()->get('Senders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Senders);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SendersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SendersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
