<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NationalstatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NationalstatesTable Test Case
 */
class NationalstatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NationalstatesTable
     */
    protected $Nationalstates;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Nationalstates',
        'app.Addresses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Nationalstates') ? [] : ['className' => NationalstatesTable::class];
        $this->Nationalstates = $this->getTableLocator()->get('Nationalstates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Nationalstates);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NationalstatesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
