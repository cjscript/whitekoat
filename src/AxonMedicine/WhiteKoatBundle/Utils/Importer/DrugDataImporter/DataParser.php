<?php

namespace AxonMedicine\WhiteKoatBundle\Utils\Importer\DrugDataImporter;

/**
 * The Excel abstract importer class for WhiteKoat.
 *
 * @author cjscript
 */
define('EOL', (PHP_SAPI == 'cli') ? EOL : '<br />');
define('DEBUG_MODE', 1);
define('ERROR_MODE', 2);
define('SEVERE_MODE', 3);
define('NONE_MODE', 4);

abstract class DataParser
{

    protected $selMode = DEBUG_MODE;
    protected $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    protected function debug($input)
    {
        if ($this->selMode <= DEBUG_MODE)
        {
            echo "<font color='green'>$input</font>";
            //ob_flush();
        }
    }

    protected function error($input)
    {
        if ($this->selMode <= ERROR_MODE)
        {
            echo "<font color='red'>$input</font>";
            //ob_flush();
        }
    }

    public abstract function parse($original, $new);
}
