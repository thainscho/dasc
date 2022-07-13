<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LetterformatsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LetterformatsTable Test Case
 */
class LetterformatsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LetterformatsTable
     */
    protected $Letterformats;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Letterformats',
        'app.Letters',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Letterformats') ? [] : ['className' => LetterformatsTable::class];
        $this->Letterformats = $this->getTableLocator()->get('Letterformats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Letterformats);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LetterformatsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
