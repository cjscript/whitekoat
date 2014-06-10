<?php

/*
 * A PHP file for testing the Simple Google Spreadsheet API
 */
date_default_timezone_set('UTC');

/* ------------------------------------------------------------------------
 * Start Configuration
 * ------------------------------------------------------------------------
 */

// Where's Zend's Loader.php
define('SGS_ZEND_LOADER', dirname(__FILE__) . "./Zend/Loader.php");

// Define our connection info. Should use OAuth, but
// for the sake of simplicity, using an explicit username/password.
// May need to visit: https://accounts.google.com/DisplayUnlockCaptcha
// to allow your usename/password to work.
define('SGS_USERNAME', 'cjscript@gmail.com');
define('SGS_PASSWORD', '10000Calpers');

// Lifted from the URL of Google Doc I want to work with
define('SGS_SHEET_ID', '0Ahq3wr_ujYJXdEF5Z3JjQ1ZuaXFIYWRZNnd5Y0Z4RkE');

// Include the API
require_once('./example2_api.php');

/* ------------------------------------------------------------------------
 * End Configuration
 * ------------------------------------------------------------------------
 */

function add_last_accessed($data)
{
    $data['notes'] = "Last accessed " . date('r');
    return $data;
}

foreach (sgs_list("") as $row)
{
    echo "Drug Name: " . $row['Generic Name'];
}


?>