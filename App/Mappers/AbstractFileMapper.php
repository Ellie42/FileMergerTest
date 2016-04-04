<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 14:53
 */

namespace App\Mappers;


abstract class AbstractFileMapper
{
    /**
     * Takes the raw data array from a file and returns a model or array with the data
     * @param array $data
     * @return mixed
     */
    abstract public function map(array $data);
}