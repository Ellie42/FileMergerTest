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
    }
}