<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonsFixture
 */
class PersonsFixture extends TestFixture
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
                'dbpedia_url' => 'Lorem ipsum dolor sit amet',
                'firstname' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'gender' => 'Lorem ipsum dolor sit amet',
                'dayofbirth' => 1,
                'monthofbirth' => 1,
                'yearofbirth' => 'Lorem ipsum dolor sit amet',
                'yearofbirthUpper' => 'Lorem ipsum dolor sit amet',
                'monthofdeath' => 1,
                'dayofdeath' => 1,
                'yearofdeath' => 'Lorem ipsum dolor sit amet',
                'yearofdeathUpper' => 'Lorem ipsum dolor sit amet',
                'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => 1657724975,
            ],
        ];
        parent::init();
    }
}
