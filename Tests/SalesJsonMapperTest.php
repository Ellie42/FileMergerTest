<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 18:42
 */

namespace App\Mappers;


use App\Models\Sales\Sale;

class SalesJsonMapperTest extends \PHPUnit_Framework_TestCase
{
    protected $mapper;

    public function Setup()
    {
        $this->mapper = new SalesJsonMapper();
    }

    public function test_map()
    {
        $input = [
            "Alias" => "a",
            "Product" => "b",
            "Cost" => 100,
            "City" => "London",
            "Payment_Type" => "apples",
            "Transaction_date" => "20/11/1942"
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
