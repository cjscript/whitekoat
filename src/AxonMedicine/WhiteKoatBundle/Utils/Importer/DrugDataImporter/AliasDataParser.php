<?php

namespace AxonMedicine\WhiteKoatBundle\Utils\Importer\DrugDataImporter;

use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;
use AxonMedicine\WhiteKoatBundle\Dto\ProcessInfoDto;

/**
 * The Excel alias data parser for WhiteKoat.
 *
 * @author cjscript
 */
class AliasDataParser extends DataParser
{

    private $ITEM_SPLIT_TOKEN = "+++";
    private $ALIAS_DATA_NAME_COUNT_MAP = array(
        "Default Name" => -1,
        "Aliases" => -1
    );
    private $ALIAS_DATA_IDX_NAME_MAP = array(
        0 => "Default Name",
        1 => "Aliases"
    );

    public function __construct($controller)
    {
        parent::__construct($controller);
    }

    public function parse($original, $new)
    {
        //  Read your Excel workbook
        try
        {
            $inputFileType = \PHPExcel_IOFactory::identify($new);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($new);
            echo '++++++++++++++++++++++++++++++++++' . EOL;
            echo '++++ALIAS DATA IMPORT STARTING+++++' . EOL;
            $this->processData($objPHPExcel, 'Alias', $this->ALIAS_DATA_NAME_COUNT_MAP, $this->ALIAS_DATA_IDX_NAME_MAP);
        } catch (Exception $e)
        {
            die('Error loading file "' . pathinfo($new, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        echo EOL;
        echo '++++ALIAS DATA IMPORT FINISHED+++++' . EOL;
        echo '++++++++++++++++++++++++++++++++++' . EOL . EOL;
    }

    private function processData($objPHPExcel, $sheetName, $colToCountArray, $indexToNameArray)
    {
        $processInfo = new ProcessInfoDto();

        $sheet = $objPHPExcel->getSheetByName($sheetName);
        $highestColumn = $sheet->getHighestColumn();

        $sheetHeaderRow = $sheet->rangeToArray('A1:' . $highestColumn . '1', NULL, TRUE, FALSE)[0];

        if ($sheetHeaderRow == null)
        {
            die("Must contain valid data");
        }
        $index = 0;

        foreach ($sheetHeaderRow as $headerRowItem)
        {
            if (array_key_exists($headerRowItem, $colToCountArray))
            {
                $colToCountArray[$headerRowItem] = $index;
            }
            $index++;
        }

        foreach ($colToCountArray as $key => $value)
        {
            if ($value == -1)
            {
                print "Invalid import file.  Please check header for correct columns.  Currently supported:" . EOL;
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
            $aliasNameRet = null;
            $aliasValueRet = null;

            //  Read a row of data into an array
            $dataRow = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $highestRow, NULL, TRUE, FALSE)[0];
            $output = "";
            foreach ($dataRow as $colkey => $colvalue)
            {
                if (array_key_exists($colkey, $indexToNameArray) && !empty($colvalue))
                {
                    try
                    {
                        switch ($indexToNameArray[$colkey])
                        {
                            case 'Default Name':
                                $aliasNameRet = $this->processRecord($colvalue, 'processDefaultName', 'StringType', 'empty');
                                break;
                            case 'Aliases':
                                $aliasValueRet = $this->processRecord($colvalue, 'processAlias', 'StringType', $aliasNameRet);
                                break;
                            default:
                                break;
                        }
                    } catch (\Exception $e)
                    {
                        $this->error("Exception caught: " . $e->getMessage() . EOL);
                    }

                    $output .= "col name: " . $indexToNameArray[$colkey] . EOL;
                }
            }
            $successCount++;
            $loops++;
            echo ".";
        }
        $processInfo->setLoops($loops);
        $processInfo->setSuccessCount($successCount);
        return $processInfo;
    }

    private function processRecord($input, $callback, $type, $name)
    {
        // Processed in the order below:
        // 1) Items - Separated by '+++'
        // 2) Aliases - Separated by {}

        if (empty($input))
        {
            $this->error('Missing alias data' . EOL);
            return null;
        }

        if (empty($name))
        {
            $this->error('Missing alias data for ' . $input . EOL);
            return null;
        }

        $items = explode($this->ITEM_SPLIT_TOKEN, $input);

        $arrItems = array();

        foreach ($items as $item)
        {
            // create the record.
            $retFromFunc = call_user_func_array(array($this, $callback), array($item, $name));

            if ($retFromFunc != null)
            {
//                        print ('+' . substr($item, 0, 6) . '+' . EOL);
                if ($retFromFunc instanceof Libraryvalue)
                {
                    array_push($arrItems, $retFromFunc->getId());
                } else if ($type == 'StringType')
                {
                    array_push($arrItems, $retFromFunc);
                }
            }
//            echo 'item created: ' . $item . EOL;
        }
        $ret = implode(":", $arrItems);
        return $ret;
    }

    private function processDefaultName($input, $nothing)
    {
        $this->debug("===>Aliased default name: " . $input . EOL);

        return $input;
    }

    private function processAlias($alias, $original)
    {
        $this->debug("===>Alias: " . $alias . EOL);

        $ret = $this->controller->aliasLibService()->create($original, $alias);
        return $ret->getAlias();
    }

}
