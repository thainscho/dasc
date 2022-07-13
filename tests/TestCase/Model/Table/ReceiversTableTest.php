<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReceiversTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReceiversTable Test Case
 */
class ReceiversTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReceiversTable
     */
    protected $Receivers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Receivers',
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
        $config = $this->getTableLocator()->exists('Receivers') ? [] : ['className' => ReceiversTable::class];
        $this->Receivers = $this->getTableLocator()->get('Receivers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Receivers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ReceiversTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ReceiversTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
