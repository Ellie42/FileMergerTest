<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 14:38
 */

namespace App\Strategies;


interface FileStrategyInterface
{
    /**
     * Iterate through all items stored in the file
     * @param string $filePath
     * @param callable $callback
     * @return mixed
     */
    public function iterateItems($filePath, $callback);
}