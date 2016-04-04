<?php
/**
 * This script takes any number of files with varying file types but containing
 * similar or the same data structure, turns them into an array of Models defined in the
 * Mappers and combines them all together for a single array of all data.
 *
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 08:47
 */

use App\FileCombiner;
use App\Mappers\SalesCsvMapper;
use App\Mappers\SalesJsonMapper;
use App\Mappers\SalesXmlMapper;
use App\Models\Files\File;
use App\Strategies\CsvStrategy;
use App\Strategies\JsonStrategy;
use App\Strategies\XmlStrategy;

require_once "./bootstrap.php";

$combiner = new FileCombiner();

//CSV
$salesCsv = new File(new CsvStrategy(), "./Data/csv/sales.csv");
$salesCsv->setMapper(new SalesCsvMapper());

//JSON
$salesJson = new File(new JsonStrategy(), "./Data/json/sales.json");
$salesJson->setMapper(new SalesJsonMapper());

//XML
$salesXml = new File(new XmlStrategy(), "./Data/xml/sales.xml");
$salesXml->setMapper(new SalesXmlMapper());

$combiner->addFile($salesCsv)
    ->addFile($salesJson)
    ->addFile($salesXml);

var_dump($combiner->toArray());

