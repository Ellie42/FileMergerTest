<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 10:21
 */

namespace App\Models\Files;


use App\Mappers\AbstractFileMapper;
use App\Strategies\FileStrategyInterface;

class AbstractFile
{
    protected $strategy;
    protected $mapper;
    protected $filePath;

    public function __construct(FileStrategyInterface $strategy, $filePathString)
    {
        $this->setStrategy($strategy);
        $this->setFilePath($filePathString);
    }

    protected function setStrategy(FileStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setMapper(AbstractFileMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @param mixed $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }
}