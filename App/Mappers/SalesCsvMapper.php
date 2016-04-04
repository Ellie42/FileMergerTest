<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 14:52
 */

namespace App\Mappers;


use App\Models\Sales\Sale;

class SalesCsvMapper extends AbstractFileMapper
{
    /**
     * @param array $data
     * @return Sale
     */
    public function map(array $data)
    {
        $sale = new Sale();
        $sale->name = $data["Name"];
        $sale->product = $data["Item"];
        $sale->price = $data["Price"];
        $sale->city = $data["City"];
        $sale->paymentType = $data["Payment_Type"];
        $sale->transactionDate = $data["Trans_date"];
        return $sale;
    }
}