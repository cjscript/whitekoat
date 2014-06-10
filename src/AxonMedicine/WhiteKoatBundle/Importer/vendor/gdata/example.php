<?php

require_once("gdata.class.php");

$gData = new gData("cjscript@gmail.com", "10000Calpers");

var_dump($gData->getStatus());

try {

	//var_dump($gData->createFolder("subtest1355"));
	//var_dump($gData->getInfoFolders());

    //var_dump($gData->getInfoFiles());
	//$gData->removeFileFolder("0B4T-Zj2neY2nNjFiNTFhMTAtMGI1MC00YTg3LWJjYjYtM2VmN2M2MjM3ZjA3");
	//$gData->getInfoFiles();

//	var_dump($gData->getFile("http://docs.google.com/feeds/download/documents/Export?docId=0AYT-Zj2neY2nZGNydDlkdzlfMGdqa3dqZGRw","tedd3.pdf","pdf"));
	var_dump($gData->getFile("https://docs.google.com/spreadsheet/ccc?key=0Ahq3wr_ujYJXdEF5Z3JjQ1ZuaXFIYWRZNnd5Y0Z4RkE&usp=sharing#gid=22","tedd3.xls","xls"));

    //var_dump($gData->uploadFile("test123.doc", "test123dddd.doc"));
  	//$gData->removeFileFolder("0B4T-Zj2neY2nZDMyNjlmNjgtY2UxMS00MzJmLWJmYTYtMzZjZWIzOWRmNDZk");
  	//$gData->moveFileToFolder("0AYT-Zj2neY2nZGNydDlkdzlfOWQ5YmI1N2M1", "0B4T-Zj2neY2nYmM0NDRkM2EtZWNlZC00N2QyLTk5ZjQtNTRjNmY4ZDU4MGY0");
} catch (Exception $e) {
    echo 'Error  : ',  $e->getMessage(), "\n";
}

$gData->closeConnection();

?>
