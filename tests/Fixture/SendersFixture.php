<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SendersFixture
 */
class SendersFixture extends TestFixture
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
                'letter_id' => 1,
                'person_id' => 1,
                'institution_id' => 1,
            ],
        ];
        parent::init();
    }
}
