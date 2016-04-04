<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 18:33
 */

namespace App\Mappers;


use App\Models\Sales\Sale;

class SalesCsvMapperTest extends \PHPUnit_Framework_TestCase
{
    protected $mapper;

    public function Setup()
    {
        $this->mapper = new SalesCsvMapper();
    }

    public function test_map()
    {
        $input = [
            "Name" => "a",
            "Item" => "b",
            "Price" => 100,
            "City" => "London",
            "Payment_Type" => "apples",
            "Trans_date" => "20/11/1942"
        ];

        $result = $this->mapper->map($input);

        $expectedResult = new Sale();
        $expectedResult->name = "a";
        $expectedResult->product = "b";
        $expectedResult->price = 100;
        $expectedResult->city = "London";
        $expectedResult->transactionDate = "20/11/1942";
        $expectedResult->paymentType = "apples";

        $this->assertEquals($result,$expectedResult);
    }
}
