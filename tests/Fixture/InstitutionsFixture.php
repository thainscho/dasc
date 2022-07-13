<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InstitutionsFixture
 */
class InstitutionsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'dbpedia_url' => 'Lorem ipsum dolor sit amet',
                'created' => 1653656129,
            ],
        ];
        parent::init();
    }
}
