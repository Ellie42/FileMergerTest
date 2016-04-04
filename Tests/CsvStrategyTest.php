<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 18:45
 */

namespace App\Strategies;


use App\Models\Sales\Sale;

class CsvStrategyTest extends \PHPUnit_Framework_TestCase
{
    protected $strategy;

    public function setUp()
    {
        $this->strategy = new CsvStrategy();
    }

    public function test_iterateItems()
    {
        $items = [];
        $indexes = [];

        $this->strategy->iterateItems("./Tests/Data/csv/sales.csv",
            function ($item, $index) use (&$items, &$indexes) {
                $items[] = $item;
                $indexes[] = $index;
            }
        );

        $expectedIndexes = [1,2];

        $this->assertEquals([
            [
                "Trans_date" => "1/2/09 6:17",
                "Item" => "Product1"
            ],
            [
                "Trans_date" => "1/2/09 6:18",
                "Item" => "Product1"
            ]
        ], $items);
        $this->assertEquals($expectedIndexes, $indexes);
    }
}
