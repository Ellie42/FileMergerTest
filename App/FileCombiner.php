<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 08:50
 */

namespace App;

use App\Models\Files\AbstractFile;

class FileCombiner
{
    protected $files;

    public function addFile(AbstractFile $file){
        $this->files[] = $file;
        return $this;
    }

    /**
     * Gets the data from all the files and merges them together as a single array
     * @return array
     */
    public function toArray()
    {
        $dataArray = [];
        foreach($this->files as $file){
            $dataArray = array_merge($file->getItems(),$dataArray);
        }
        return $dataArray;
    }
}