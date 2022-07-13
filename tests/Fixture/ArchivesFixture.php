<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArchivesFixture
 */
class ArchivesFixture extends TestFixture
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
                'address_id' => 1,
                'website' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
