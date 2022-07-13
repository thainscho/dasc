<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AddressesFixture
 */
class AddressesFixture extends TestFixture
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
                'addressline' => 'Lorem ipsum dolor sit amet',
                'street' => 'Lorem ipsum dolor sit amet',
                'streetnumber' => 'Lorem ipsum dolor sit amet',
                'postalcode' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'nationalstate_id' => 1,
                'created' => 1656679108,
            ],
        ];
        parent::init();
    }
}
