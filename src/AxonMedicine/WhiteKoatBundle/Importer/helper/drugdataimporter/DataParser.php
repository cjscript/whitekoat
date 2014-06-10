<?php

namespace helper\drugdataimporter;

/**
 * The Excel abstract importer class for WhiteKoat.
 *
 * @author cjscript
 */
define('EOL', '<br />');
define('DEBUG_MODE', 1);
define('ERROR_MODE', 2);
define('SEVERE_MODE', 3);
define('NONE_MODE', 4);

abstract class DataParser
{

    private $sqlFile;
    protected $selMode = DEBUG_MODE;
    protected $logFile;
    protected $ITEM_SPLIT_TOKEN = "+++";
    protected $REF_TOKEN_START = "{ref:";
    protected $REF_TOKEN_END = "}";
    protected $ACTION_TOKEN_START = "[";
    protected $ACTION_TOKEN_END = "]";
    protected $COL_SEPARATOR = "{{SEP}}";

    public function __construct($sqlFilePath)
    {
        $this->sqlFile = fopen($sqlFilePath, "w");
    }

    public function __destruct()
    {
        fclose($this->sqlFile);
    }

    private function logSql($sql)
    {
        if ($this->sqlFile)
        {
            fwrite($this->sqlFile, $sql);
        }
    }

    protected function saveSql($sql)
    {
        if (!empty($sql))
        {
            $sql = str_replace("'##(", "(", $sql);
            $sql = str_replace(")##'", ")", $sql);
            $sql = str_replace(") ;", ") ;" . PHP_EOL, $sql);
            $this->logSql($sql);
        }
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

    public abstract function run($fileWithPath);
}
