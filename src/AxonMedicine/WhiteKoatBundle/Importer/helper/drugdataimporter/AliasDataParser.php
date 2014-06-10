<?php

namespace helper\drugdataimporter;

require_once('SqlFormatter.php');

/**
 * The Excel alias data parser for WhiteKoat.
 *
 * @author cjscript
 */
class AliasDataParser extends DataParser
{

    private $ALIAS_DATA_NAME_COUNT_MAP = array(
        "Default Name" => false,
        "Aliases" => false
    );

    public function __construct($logFile)
    {
        parent::__construct("./alias.output.data.txt");
        $parent->logFile = $logFile;
    }

    public function run($new)
    {
        //  Read your Excel workbook
        try
        {
            $inputFileType = \PHPExcel_IOFactory::identify($new);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($new);
            echo '++++++++++++++++++++++++++++++++++' . EOL;
            echo '++++ALIAS DATA IMPORT STARTING+++++' . EOL;
            $this->processData(
                    $objPHPExcel, 'Alias', $this->ALIAS_DATA_NAME_COUNT_MAP);
        } catch (Exception $e)
        {
            die('Error loading file "' . pathinfo($new, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        echo EOL;
        echo '++++ALIAS DATA IMPORT FINISHED+++++' . EOL;
        echo '++++++++++++++++++++++++++++++++++' . EOL . EOL;
    }

    private function processData($objPHPExcel, $sheetName, $colToCountArray)
    {

        $sheet = $objPHPExcel->getSheetByName($sheetName);
        $highestColumn = $sheet->getHighestColumn();

        $sheetHeaderRow = $sheet->rangeToArray('A1:' . $highestColumn . '1', NULL, TRUE, FALSE)[0];

        if ($sheetHeaderRow == null)
        {
            die("Must contain valid data");
        }

        $index = 0;

        $indexToValue = array();

        foreach ($sheetHeaderRow as $headerRowItem)
        {
            if (array_key_exists($headerRowItem, $colToCountArray))
            {
                $colToCountArray[$headerRowItem] = true;
            }
            $indexToValue[$index++] = $headerRowItem;
        }

        foreach ($colToCountArray as $key => $value)
        {
            if (!$value)
            {
                print "Invalid import file.  Please check header for required columns.  Currently supported:" . EOL;
                print_r(array_keys($colToCountArray));
                exit;
            }
        }

//  Loop through each row of the worksheet in turn
        $highestRow = $sheet->getHighestRow();

        $loops = 0;
        $successCount = 0;
        $errorCount = 0;


        for ($row = 2; $row <= $highestRow; $row++)
        {
            $aliasName = null;
            $aliasValue = null;

            //  Read a row of data into an array
            $dataRow = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $highestRow, NULL, TRUE, FALSE)[0];
            $output = "";
            foreach ($dataRow as $colkey => $colvalue)
            {
                if (!empty($colvalue))
                {
                    switch ($indexToValue[$colkey])
                    {
                        case 'Default Name':
                            $this->processRecord($colvalue, 'processDefaultName', 'empty');
                            $aliasName = $colvalue;
                            break;
                        case 'Aliases':
                            $this->processRecord($colvalue, 'processAlias', $aliasName);
                            $aliasValue = $colvalue;
                            break;
                        default:
                            break;
                    }
                }
            }
            $successCount++;
            $loops++;
            echo ".";
        }
//        $processInfo->setLoops($loops);
//        $processInfo->setSuccessCount($successCount);
//        return $processInfo;
    }

    private function processRecord($input, $callback, $name)
    {
        // Processed in the order below:
        // 1) Items - Separated by '+++'
        // 2) Aliases - Separated by {}

        if (empty($input))
        {
            $this->error('Missing alias data with value: ' . $input . EOL);
            exit;
            return null;
        }

        if (empty($name))
        {
            $this->error('Missing alias data for ' . $input . EOL);
            exit;
            return null;
        }

        $items = explode($this->ITEM_SPLIT_TOKEN, $input);

        $retItems = array();

        $name = mysql_real_escape_string($name);

        foreach ($items as $item)
        {
            $item = mysql_real_escape_string($item);

            // create the record.
            $ret = call_user_func_array(array($this, $callback), array($item, $name));

            array_push($retItems, $ret);
        }

        return $retItems;
    }

    private function processDefaultName($input, $nothing)
    {
//        $this->debug("===>Aliased default name: " . $input . EOL);

        return "";
    }

    private function processAlias($alias, $original)
    {
//        $this->debug("===>Alias: " . $alias . EOL);

        $insertStmt = \SqlFormatter::makeInsert('Alias', array('Alias' => $alias, 'Original' => $original));

        $this->saveSql($insertStmt);

        $this->debug($insertStmt . EOL);

        return $insertStmt;
    }

}
