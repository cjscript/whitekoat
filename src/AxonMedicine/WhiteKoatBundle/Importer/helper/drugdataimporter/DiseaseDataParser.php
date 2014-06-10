<?php

namespace helper\drugdataimporter;

require_once('SqlFormatter.php');

/**
 * The Excel disease test data importer for WhiteKoat.
 *
 * @author cjscript
 */
class DiseaseDataParser extends DataParser
{

    private $SHEET_TAB_NAME = 'FULL Disease Data';
    private $DISEASE_DATA_NAME_COUNT_MAP = array(
        "Disease Name" => false,
        "DiseaseType" => false,
        "Organ System" => false,
        "Structure" => false,
        "Cause" => false,
        "Symptom" => false);

    public function __construct($logFile)
    {
        parent::__construct("./disease.output.data.txt");
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
            echo '++++DISEASE DATA IMPORT STARTING+++++' . EOL;
            $this->processData($objPHPExcel, $this->SHEET_TAB_NAME, $this->DISEASE_DATA_NAME_COUNT_MAP);
        } catch (Exception $e)
        {
            die('Error loading file "' . pathinfo($new, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        echo EOL;
        echo '++++DISEASE DATA IMPORT FINISHED+++++' . EOL;
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

        for ($row = 2; $row <= $highestRow; $row++)
        {
            $disease = null;
            $type = null;
            $cause = null;
            $symptom = null;

            //  Read a row of data into array
            $dataRow = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $highestRow, NULL, TRUE, FALSE)[0];
            $output = "";
            foreach ($dataRow as $colkey => $colvalue)
            {
                if (!empty($colvalue))
                {
                    switch ($indexToValue[$colkey])
                    {
                        // disease data
                        case "Disease Name":
                            $this->processRecord($colvalue, 'processDisease', null);
                            $disease = $colvalue;
                            break;
                        case "DiseaseType":
                            $this->processRecord($colvalue, 'processDiseaseType', $disease);
                            $type = $colvalue;
                            break;
                        case "Cause":
                            $this->processRecord($colvalue, 'processCause', $disease);
                            $cause = $colvalue;
                            break;
                        case "Symptom":
                            $this->processRecord($colvalue, 'processSymptom', $disease);
                            $symptom = $colvalue;
                            break;
                        default:
                            break;
                    }
                }
            }

            if ($disease)
            {
//                $this->controller->diseaseCardService()
//                        ->createCardBy($disease, $typeRet, $causeRet, $symptomRet);
//                $successCount++;
            }
            $loops++;
            echo ".";
        }
    }

    private function processRecord($input, $callback, $type, $generic)
    {
        // Processed in the order below:
        // 1) Items - Separated by '+++'
        // 2) Aliases - Separated by {}

        $items = explode($this->ITEM_SPLIT_TOKEN, $input);

        $retItems = array();

        foreach ($items as $item)
        {
            $item = mysql_real_escape_string($item);

            // create the record.
            $ret = call_user_func_array(array($this, $callback), array($item, $generic));

            array_push($retItems, $ret);
        }

        return $retItems;
    }

    private function processDisease($input, $generic)
    {
        $action = null;

        $input = $this->parseActions($input, $action);

        $name = $input;

        $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                    \SqlFormatter::makeType("Diseases")));

        $this->saveSql($insertStmt);

        $this->debug($insertStmt . EOL);

        return $name;
    }

    private function processDiseaseType($input, $generic)
    {
        $action = null;

        $input = $this->parseActions($input, $action);

        $name = $input;

        $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                    \SqlFormatter::makeType("DiseaseTypes")));

        $this->saveSql($insertStmt);

        $this->debug($insertStmt . EOL);
    }

    private function processCause($input, $generic)
    {
        $action = null;

        $input = $this->parseActions($input, $action);

        $name = $input;

        $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                    \SqlFormatter::makeType("Molecules")));

        $this->saveSql($insertStmt);

        $this->debug($insertStmt . EOL);

        return $name;
    }

    private function processSymptom($input, $generic)
    {
        $actions = null;

        $input = $this->parseActions($input, $actions);

        $name = $input;

        $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                    \SqlFormatter::makeType("Symptoms")));

        $this->saveSql($insertStmt);

        $this->debug($insertStmt . EOL);

        return $name;
    }

    private function processTreatment($input)
    {
        $leftSideType = 'Drugs';
        $rightSideType = 'Diseases';
        $rightSideValue = $input;
        $lookupName = 'Treatment';

//        echo 'input: ' . $input . EOL;
//        $rels = $this->controller->relationshipService()->getByFull($leftSideType, $rightSideType, $rightSideValue, $lookupName);
//
//        // get library values from relationships.
//        $arrItems = array();
//
//        if ($rels != null)
//        {
//            foreach ($rels as $rel)
//            {
//                array_push($arrItems, $rel->getLeftside()->getId());
//            }
//        }
//        $ret = implode(":", $arrItems);
//
//        return $ret;

        return "";
    }

    private function parseActions($input, &$action)
    {
        $actionToExclude = "";

        if (preg_match('/\[(.*)\]/s', $input, $action))
        {
            $action = $action[1];

            $actionToExclude = $this->ACTION_TOKEN_START . $action . $this->ACTION_TOKEN_END;

            $name = $action;

            $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                        \SqlFormatter::makeType("Actions")));

            $this->saveSql($insertStmt);

            $this->debug($insertStmt . EOL);
            //$action = $this->controller->actionLibService()->save($name, $desc);
        }

        $newInput = str_replace($actionToExclude, "", $input);

        return $newInput;
    }

}
