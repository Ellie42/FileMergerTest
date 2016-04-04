<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 19:02
 */

namespace App\Strategies;


class JsonStrategyTest extends \PHPUnit_Framework_TestCase
{
    protected $strategy;

    public function setUp()
    {
        $this->strategy = new JsonStrategy();
    }

    public function test_iterateItems()
    {
        $items = [];
        $indexes = [];

        $this->strategy->iterateItems("./Tests/Data/json/sales.json",
            function ($item, $index) use (&$items, &$indexes) {
                $items[] = $item;
                $indexes[] = $index;
            }
        );

        $expectedIndexes = [0,1];

        $this->assertEquals([
            [
                "Transaction_date" => "1/27/09 11:02",
                "Product" => "Product1"
            ],
            [
                "Transaction_date" => "1/14/09 13:23",
                "Product" => "Product1"
            ]
        ], $items);
        $this->assertEquals($expectedIndexes, $indexes);
    }
}
