<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CartFixture
 */
class CartFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cart';
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
                'userid' => 1,
                'productid' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'quentity' => 1,
                'address' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
