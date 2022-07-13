<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LettersFixture
 */
class LettersFixture extends TestFixture
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
                'letterdate_day' => 1,
                'letterdate_month' => 1,
                'letterdate_year' => 'Lorem ipsum dolor sit amet',
                'datemin_day' => 1,
                'datemin_month' => 1,
                'datemin_year' => 'Lorem ipsum dolor sit amet',
                'letterdatecorrected_day' => 1,
                'letterdatecorrected_month' => 1,
                'letterdatecorrected_year' => 'Lorem ipsum dolor sit amet',
                'datemax_day' => 1,
                'datemax_month' => 1,
                'datemax_year' => 'Lorem ipsum dolor sit amet',
                'letterformat_id' => 1,
                'address_from_id' => 1,
                'address_from_assumed' => 1,
                'address_to_id' => 1,
                'address_to_assumed' => 1,
                'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => 1657446308,
            ],
        ];
        parent::init();
    }
}
