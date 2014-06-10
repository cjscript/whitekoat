<?php

// add required dependencies
require './vendor/phpexcel/PHPExcel.php';
require_once('db/InitDb.php');
require_once('helper/drugdataimporter/DataParser.php');
require_once('helper/drugdataimporter/AliasDataParser.php');
require_once('helper/drugdataimporter/DrugDataParser.php');
require_once('helper/drugdataimporter/DiseaseDataParser.php');

// import classes
use db\InitDb;
use helper\drugdataimporter\AliasDataParser;
use helper\drugdataimporter\DrugDataParser;
use helper\drugdataimporter\DiseaseDataParser;

// init database
$database = new InitDb();

//$database->init();
// create log file
$logFile = fopen("./importer.output.log", "w");
$fileWithPath = "./doc.to.import/wkdata.xls";

// alias parser
$aliasParser = new AliasDataParser($logFile);
$aliasParser->run($fileWithPath);
// drug data parser...
//$drugParser = new DrugDataParser($logFile);
//$drugParser->run($fileWithPath);
// disease data parser...
$diseaseParser = new DiseaseDataParser($logFile);
$diseaseParser->run($fileWithPath);





fclose($logFile);

