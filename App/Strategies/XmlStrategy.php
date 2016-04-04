<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 10:29
 */

namespace App\Strategies;


use App\Traits\FileManagement;

class XmlStrategy implements FileStrategyInterface
{

    use FileManagement;

    /**
     * @param string $filePath
     * @param callable $callback
     * @return mixed
     * @internal param array $startIndex
     */
    public function iterateItems($filePath, $callback)
    {
        $xml = simplexml_load_string($this->getFileData($filePath));
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);

        /**
         * Sale string is hardcoded for simplicity but should be modifiable or implemented
         * using a more specific strategy
         * TODO add dynamic start index or something else
         */
        foreach ($array["Sale"] as $index => $item) {
            $callback($item, $index);
        }
    }
}