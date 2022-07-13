<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AnnotationsFixture
 */
class AnnotationsFixture extends TestFixture
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
                'manifestation_id' => 1,
                'receiver_id' => 1,
                'sender_id' => 1,
            ],
        ];
        parent::init();
    }
}
