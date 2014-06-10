<?php

	define('ZEND_LOADER', dirname(__FILE__) . "./Zend/Loader.php");

    require_once(ZEND_LOADER);
    set_include_path(get_include_path() . PATH_SEPARATOR . dirname(ZEND_LOADER));
    Zend_Loader::loadClass('Zend_Http_Client');
    Zend_Loader::loadClass('Zend_Gdata');
	Zend_Loader::loadClass('Zend_Gdata_Docs');
	Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
    Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');


	$user = 'AXONMedicine@gmail.com';
	$pass = 'DoctorCJK2';
    $service = Zend_Gdata_Docs::AUTH_SERVICE_NAME;
    $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
    $docs = new Zend_Gdata_Docs($client);
    $feed = $docs->getDocumentListFeed();


foreach ($feed->entries as $row)
{
echo 'link' . $row->getLink()[1]->getHref() . '\r\n';

}


?>