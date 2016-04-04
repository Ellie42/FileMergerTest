<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 14:53
 */

namespace App\Mappers;


use App\Models\Sales\Sale;

class SalesJsonMapper extends AbstractFileMapper
{

    public function map(array $data)
    {
        $sale = new Sale();
        $sale->name = $data["Alias"];
        $sale->product = $data["Product"];
        $sale->price = $data["Cost"];
        $sale->city = $data["City"];
        $sale->paymentType = $data["Payment_Type"];
        $sale->transactionDate = $data["Transaction_date"];
        return $sale;
    }
}