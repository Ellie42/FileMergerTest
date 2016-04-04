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
        $this->setFilePath($filePathString);
        $this->setStrategy($strategy);
    }

    /**
     * Set the file strategy for parsing different file types
     * @param FileStrategyInterface $strategy
     */
    protected function setStrategy(FileStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * Set the mapper
     * @param AbstractFileMapper $mapper
     */
    public function setMapper(AbstractFileMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getItems()
    {
        $items = [];

        //Iterate all items stored in the file and add a populated model to the items list
        $this->strategy->iterateItems($this->filePath, function ($itemArray) use (&$items) {
            $items[] = $this->mapper->map($itemArray);
        });

        return $items;
    }
}