<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnnotationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnnotationsTable Test Case
 */
class AnnotationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AnnotationsTable
     */
    protected $Annotations;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Annotations',
        'app.Manifestations',
        'app.Persons',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Annotations') ? [] : ['className' => AnnotationsTable::class];
        $this->Annotations = $this->getTableLocator()->get('Annotations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Annotations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AnnotationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AnnotationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
