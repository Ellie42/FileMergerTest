<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 10:28
 */

namespace App\Strategies;


use App\Traits\FileManagement;

class CsvStrategy implements FileStrategyInterface
{
    use FileManagement;

    public function iterateItems($filePath, $callback)
    {
        $fileHandle = $this->tryOpenFile($filePath);
        $headings = [];

        /**
         * Iterate all the lines in the csv file and call the callback, this assumes that the first line is a
         * list of the field headings
         */
        $this->iterateLines($fileHandle, function ($line, $index) use (&$headings, &$callback) {
            //First line headings
            if ($index === 0) {
                $headings = explode(",", $line);
                return;
            }

            $itemArray = explode(",", $line);

            //Combines the headings with the value array to form an associative array
            $formattedArray = $this->formatArrayWithHeadings($itemArray, $headings);
            $callback($formattedArray,$index);
        });

        $this->closeFile($fileHandle);
    }

    /**
     * @param array $itemArray
     * @param array $headings
     * @return array
     */
    private function formatArrayWithHeadings(array $itemArray, array $headings)
    {
        $formattedArray = [];

        foreach ($itemArray as $key => $value) {
            //Add $heading => $value to formatted array while trimming whitespace
            $formattedArray[trim($headings[$key])] = trim($value);
        }

        return $formattedArray;
    }
}