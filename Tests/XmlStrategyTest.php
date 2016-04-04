<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 19:05
 */

namespace App\Strategies;


class XmlStrategyTest extends \PHPUnit_Framework_TestCase
{
    protected $strategy;

    public function setUp()
    {
        $this->strategy = new XmlStrategy();
    }

    public function test_iterateItems()
    {
        $items = [];
        $indexes = [];

        $this->strategy->iterateItems("./Tests/Data/xml/sales.xml",
            function ($item, $index) use (&$items, &$indexes) {
                $items[] = $item;
                $indexes[] = $index;
            }
        );

        $expectedIndexes = [0, 1];

        $this->assertEquals([
            [
                "Transaction_date" => "1/26/09 10:24",
                "Product" => "Product1"
            ],
            [
                "Transaction_date" => "1/26/09 8:58",
                "Product" => "Product1"
            ]
        ], $items);
        $this->assertEquals($expectedIndexes, $indexes);
    }
}
