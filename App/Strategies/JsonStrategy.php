<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 10:30
 */

namespace App\Strategies;


use App\Traits\FileManagement;

class JsonStrategy implements FileStrategyInterface
{

    use FileManagement;

    /**
     * @param string $filePath
     * @param callable $callback
     * @return mixed
     */
    public function iterateItems($filePath, $callback)
    {
        $array = json_decode($this->getFileData($filePath));

        foreach ($array as $index => $item) {
            $callback((array)$item, $index);
        }
    }
}