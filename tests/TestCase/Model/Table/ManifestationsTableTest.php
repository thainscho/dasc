<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManifestationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManifestationsTable Test Case
 */
class ManifestationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ManifestationsTable
     */
    protected $Manifestations;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Manifestations',
        'app.Letters',
        'app.Archives',
        'app.Annotations',
        'app.Signatures',
        'app.Languages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Manifestations') ? [] : ['className' => ManifestationsTable::class];
        $this->Manifestations = $this->getTableLocator()->get('Manifestations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Manifestations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ManifestationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ManifestationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
