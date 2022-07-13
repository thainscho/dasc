<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ManifestationsFixture
 */
class ManifestationsFixture extends TestFixture
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
                'pages' => 1,
                'includingEnvelope' => 1,
                'draft' => 1,
                'isSent' => 1,
                'writingstyle' => 'Lorem ipsum dolor sit amet',
                'writingstyle_other' => 'Lorem ipsum dolor sit amet',
                'archive_id' => 1,
                'archive_info' => 'Lorem ipsum dolor sit amet',
                'created' => 1657367389,
            ],
        ];
        parent::init();
    }
}
