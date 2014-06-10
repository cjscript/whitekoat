<?php

global $_sgs_client;
$_sgs_client = null;

function sgs_client()
{
    global $_sgs_client;

    if ($_sgs_client != null)
    {
        return $_sgs_client;
    }

    if (!defined('SGS_USERNAME') || !defined('SGS_PASSWORD') || !defined('SGS_SHEET_ID') || !defined('SGS_ZEND_LOADER'))
    {
        trigger_error("You must setup the environment before you can use SGS", E_USER_ERROR);
    }

    require_once(SGS_ZEND_LOADER);
    set_include_path(get_include_path() . PATH_SEPARATOR . dirname(SGS_ZEND_LOADER) . '/../');
    Zend_Loader::loadClass('Zend_Http_Client');
    Zend_Loader::loadClass('Zend_Gdata');
    Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
    Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');

    $authService = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
    $httpClient = Zend_Gdata_ClientLogin::getHttpClient(SGS_USERNAME, SGS_PASSWORD, $authService);
    $_sgs_client = new Zend_Gdata_Spreadsheets($httpClient);

    return $_sgs_client;
}

function sgs_feed($ws_name)
{
    $gd_client = sgs_client();
    $ws_id = false;
    $ws_query = new Zend_Gdata_Spreadsheets_DocumentQuery();
    $ws_query->setSpreadsheetKey(SGS_SHEET_ID);
    $ws_feed = $gd_client->getWorksheetFeed($ws_query);
    foreach ($ws_feed->entries as $entry)
    {
        if ($entry->title->text == $ws_name)
        {
            $ws_url_chunks = explode('/', $entry->id->text);
            $ws_id = $ws_url_chunks[8];
            break;
        }
    }

    if (!$ws_id)
    {
        trigger_error("No worksheet found named $ws_name.");
        return null;
    }


    $query = new Zend_Gdata_Spreadsheets_ListQuery();
    $query->setSpreadsheetKey(SGS_SHEET_ID);
    $query->setWorksheetId($ws_id);
    return $gd_client->getListFeed($query);
}

function sgs_list($ws_name)
{
    $data = array();
    $feed = sgs_feed($ws_name);
    foreach ($feed as $row)
    {
        $entry = array();
        foreach ($row->getCustom() as $c)
        {
            $entry[$c->getColumnName()] = $c->getText();
        }
        $data[] = $entry;
    }

    return $data;
}

?>