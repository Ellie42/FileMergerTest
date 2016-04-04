<?php
/**
 * Created by PhpStorm.
 * User: sophie
 * Date: 04/04/16
 * Time: 08:47
 */

use App\FileCombiner;
use App\Mappers\SalesCsvMapper;
use App\Mappers\SalesJsonMapper;
use App\Models\Files\File;
use App\Strategies\CsvStrategy;
use App\Strategies\JsonStrategy;

require_once "./bootstrap.php";

$combiner = new FileCombiner();

$salesCsv = new File(new CsvStrategy(),"./Data/csv/sales.csv");
$salesCsv->setMapper(new SalesCsvMapper());

$salesJson = new File(new JsonStrategy(),"./Data/json/sales.json");
$salesJson->setMapper(new SalesJsonMapper());

$combiner->addFile($salesCsv);

$combiner->combine();

