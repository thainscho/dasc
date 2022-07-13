<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstitutionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstitutionsTable Test Case
 */
class InstitutionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InstitutionsTable
     */
    protected $Institutions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Institutions',
        'app.Receivers',
        'app.Senders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Institutions') ? [] : ['className' => InstitutionsTable::class];
        $this->Institutions = $this->getTableLocator()->get('Institutions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Institutions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\InstitutionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
