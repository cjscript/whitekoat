<?php

namespace helper\drugdataimporter;

require_once('SqlFormatter.php');

/**
 * The Excel drug test data importer for WhiteKoat.
 *
 * @author cjscript
 */
class DrugDataParser extends DataParser
{

    private $SHEET_TAB_NAME = 'Full Drug Data - Steven Edits';
    private $DRUG_DATA_NAME_COUNT_MAP = array(
        "Generic Name" => false,
        "Brand Name" => false,
        "Type" => false,
        "Therapeutic Class" => false,
        "Pharmacologic Class" => false,
        "Drug Target" => false,
        "Mechanism" => false,
        "Treatment" => false,
        "Side Effect" => false,
        "Contraindication" => false
    );

    public function __construct($logFile)
    {
        parent::__construct("./drug.output.data.txt");
        $parent->logFile = $logFile;
    }

    public function run($new)
    {
        //  Read  Excel workbook
        try
        {
            $inputFileType = \PHPExcel_IOFactory::identify($new);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($new);
            echo '++++++++++++++++++++++++++++++++++' . EOL;
            echo '++++DRUG DATA IMPORT STARTING+++++' . EOL;
            $this->processData($objPHPExcel, $this->SHEET_TAB_NAME, $this->DRUG_DATA_NAME_COUNT_MAP);
        } catch (Exception $e)
        {
            die('Error loading file "' . pathinfo($new, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        echo EOL;
        echo '++++DRUG DATA IMPORT FINISHED+++++' . EOL;
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

        $relatesToDrugTarget = "Drug Target";
        $relatesToTreatment = "Treatment";
        $relatesToSideEffect = "Side Effect";
        $relatesToContraindication = "Contraindications";

        $loops = 0;
        $successCount = 0;

        for ($row = 2; $row <= $highestRow; $row++)
        {
            $drug = null;
            $brandDrugs = null;
            $classes1 = null;
            $classes2 = null;
            $targets = null;
            $mechanisms = null;
            $treatments = null;
            $sideEffects = null;
            $contraInds = null;

            //  Read a row of data into an array
            $dataRow = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $highestRow, NULL, TRUE, FALSE)[0];
            $output = "";
            foreach ($dataRow as $colkey => $colvalue)
            {
                if (!empty($colvalue))
                {
                    switch ($indexToValue[$colkey])
                    {
                        // drug data
                        case 'Generic Name':
                            $this->processRecord($colvalue, 'processGeneric', null);
                            $drug = $colvalue;
                            $this->debug('+++++++++CURRENT DRUG: ' . $drug . EOL);

                            break;

                        case 'Brand Name':
                            $brandDrugs = $this->processRecord($colvalue, 'processBrand', $drug);
                            break;
                        case 'Type':
                            break;
                        case 'Therapeutic Class':
                            $classes1 = $this->processRecord($colvalue, 'processClass', $drug);
                            break;
                        case 'Pharmacologic Class':
                            $classes2 = $this->processRecord($colvalue, 'processClass', $drug);
                            break;
                        case 'Drug Target':
                            $targets = $this->processRecord($colvalue, 'processTarget', $drug);
                            break;
                        case 'Mechanism':
                            $mechanisms = $this->processRecord($colvalue, 'processMechanism', $drug);
                            break;
                        case 'Treatment':
                            $treatments = $this->processRecord($colvalue, 'processTreatment', $drug);
                            break;
                        case 'Side Effect':
                            $sideEffects = $this->processRecord($colvalue, 'processSideEffect', $drug);
                            break;
                        case 'Contraindication':
                            $contraInds = $this->processRecord($colvalue, 'processContraInd', $drug);
                            break;

                        default:
                            break;
                    }
                }
            }

            if ($drug)
            {
                if (!$classes1)
                {
                    $classes1 = array();
                }
                if (!$classes2)
                {
                    $classes2 = array();
                }

                $classes = array_merge($classes1, $classes2);

                $classes = array_unique($classes);

//                $this->controller->drugCardService()->createDrugCardBy(
//                        $drug, $brandRet, $classArrayWithoutDups, $targetRet, $treatmentRet, $mechanismRet, $sideEffectRet, $contraRet, $relatesToDrugTarget, $relatesToTreatment, $relatesToSideEffect, $relatesToContraindication
//                );
// direct relationships
                $brands = $this->processDirectRelationship($drug, $brandDrugs, null, "Drugs");
                $classes = $this->processDirectRelationship($drug, $classes, null, "Classes");
                $targets = $this->processDirectRelationship($drug, $targets, $relatesToDrugTarget, "Molecules");
                $treatments = $this->processDirectRelationship($drug, $treatments, $relatesToTreatment, null);
                $sideEffects = $this->processDirectRelationship($drug, $sideEffects, $relatesToSideEffect, null);
                $contraInds = $this->processDirectRelationship($drug, $contraInds, $relatesToContraindication, null);

                // create drug view.
//                $this->createDrugView($drug, $brands, $classes, $targets, $treatments, $mechanism, $sideEffects, $contraInds);



                $successCount++;
            }

            $successCount++;
            $loops++;
            echo ".";
//            exit;
        }

        echo "LOOP COUNT: " . $loops;
    }

    protected function processDirectRelationship($left, $items, $relatesTo, $type)
    {
        $arr = array();

        if (!empty($items))
        {
            foreach ($items as $item)
            {
                if (!$item)
                {
                    continue;
                }

                $definedType = $type;

                // if type is empty, split into name/type
                if (empty($definedType))
                {
                    $items = explode($this->COL_SEPARATOR, $item);
                    $item = $items[0];
                    $definedType = $items[1];
                }

                $this->createRelationship($left, $item, $relatesTo, $definedType);
//                array_push($arr, $ret);
            }
        }
        return $arr;
    }

    protected function createRelationship($left, $right, $relatesTo, $type)
    {
        // can't do anything.  Left and right required.
        if (!$left || !$right)
        {
            return;
        }

        $insertStmt = \SqlFormatter::makeInsert("relationship", array(
                    "LeftSide" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $left, "Type" => \SqlFormatter::makeType("Drugs"))),
                    "RightSide" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $right, "Type" => \SqlFormatter::makeType($type))),
                    "RelatesTo" => \SqlFormatter::makeInnerSelect("templookup", array("Id"), array("Name" => $relatesTo))));
        $this->saveSql($insertStmt);

        return $insertStmt;
    }

    private function createDrugView($generic, $brand, $class, $target, $treatment, $mechanism, $sideEffect, $contraInd)
    {
        // mechanism is always a string.
        $mechanismString = null;
        if (!empty($mechanism))
        {
            $mechanismString = $mechanism[0];
        }

        $insertStmt = \SqlFormatter::makeInsert("drugcardview", array(
                    "DrugName" => $generic,
                    "DrugBrand" => $brand,
                    "DrugClass" => $class,
                    "DrugTarget" => $target,
                    "DrugMechanism" => $treatment,
                    "DrugTreatment" => $mechanismString,
                    "DrugSideEffect" => $sideEffect,
                    "DrugContraInd" => $contraInd));

        $this->saveSql($insertStmt);
    }

    private function processRecord($input, $callback, $drug)
    {
        // processed in the order below:
        // 1) Items - Separated by '+++'
        // 2) Aliases - Separated by {}

        $items = explode($this->ITEM_SPLIT_TOKEN, $input);

        $retItems = array();

        foreach ($items as $item)
        {
            $item = mysql_real_escape_string($item);

            // create the record.
            $ret = call_user_func_array(array($this, $callback), array($item, $drug));

            array_push($retItems, $ret);
        }

        return $retItems;
    }

    private function processGeneric($input, $drug)
    {
        $name = $input;

        $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                    \SqlFormatter::makeType("Drugs")));

        $this->saveSql($insertStmt);

        $insertStmt = \SqlFormatter::makeInsert("druglibraryprop", array(
                    "Id" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $name,
                        "Type" => \SqlFormatter::makeType("Drugs")
                    )),
                    "Generic" => "1"));

        $this->saveSql($insertStmt);

        $this->debug($insertStmt . EOL);

        return $name;
    }

    private function processBrand($input, $drug)
    {
        $this->debug('===>brand item: ' . $input . EOL);

        $name = $input;

        $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                    \SqlFormatter::makeType("Drugs")));

        $insertStmt .= \SqlFormatter::makeInsert("druglibraryprop", array(
                    "Id" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $name,
                        "Type" => \SqlFormatter::makeType("Drugs")
                    )),
                    "Generic" => "0"));

        $this->saveSql($insertStmt);

        $this->debug($insertStmt . EOL);

        return $name;
    }

    private function processClass($input, $drug)
    {
        $this->debug('===>class item: ' . $input . EOL);

        $name = $input;

        $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                    \SqlFormatter::makeType("Classes")));

        $this->saveSql($insertStmt);

        $this->debug($insertStmt . EOL);

        return $name;
    }

    private function processTarget($input, $drug)
    {
        // Each drug can perform an action on a target - Separated by []
        $action = null;

        $input = $this->parseActions($input, $action);

        $name = $input;

        $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                    \SqlFormatter::makeType("Molecules")));

        $this->debug('target/molecule lib ' . $name . ' saved.' . EOL);

        if ($action)
        {
            $insertStmt .= \SqlFormatter::makeInsert("drugs_actions", array(
                        "Drug" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $drug, "Type" => \SqlFormatter::makeType("Drugs"))),
                        "Action" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $action, "Type" => \SqlFormatter::makeType("Actions"))),
                        "Receiver" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $name, "Type" => \SqlFormatter::makeType("Molecules")))));
        }

        $this->saveSql($insertStmt);

        return $name;
    }

    private function processMechanism($input, $drug)
    {
        // current does nothing.  Depends on drug card view.
        $this->debug("===>Drug mechanism name: " . $input . EOL);

        return $input;
    }

    private function processTreatment($input, $drug)
    {
        // Action - Separated by []
        $action = null;

        $insertStmt = "";

        $this->debug("===>Treatment item action: " . $input . EOL);

        $input = $this->parseActions($input, $action);

        $type = null;

        $ret = $this->processRefType($input, $type);

        $name = $ret;

        if (!$type)
        {
            $this->error("Missing treatment reference for '$input'. Defaulting to Symptom Type" . EOL);
//            $ret = $this->controller->symptomLibService()->save($input, null);
            $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                        \SqlFormatter::makeType("Symptoms")));

            $type = "Symptoms";

            $this->saveSql($insertStmt);
        }

        $this->debug("===>Treatment created: " . $input . " reference: " . EOL);

        if ($action)
        {
            // create drug action receiver
            //$drugAction = $this->controller->actionLibService()->createDrugActionReceiver($drug, $action, $ret);
            $insertStmt .= \SqlFormatter::makeInsert("drugs_actions", array(
                        "Drug" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $drug, "Type" => \SqlFormatter::makeType("Drugs"))),
                        "Action" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $action, "Type" => \SqlFormatter::makeType("Actions"))),
                        "Receiver" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $name, "Type" => \SqlFormatter::makeType($type)))));

            $this->saveSql($insertStmt);
        }

        $nameWithType = $name . "{{SEP}}" . $type;

        return $nameWithType;
    }

    private function processSideEffect($input, $drug)
    {
        // Action - Separated by []
        $action = null;

        $insertStmt = "";

        $this->debug("===>Side effect item action: " . $input . EOL);

        $input = $this->parseActions($input, $action);

        $type = null;

        $ret = $this->processRefType($input, $type);

        $name = $ret;

        if (!$type)
        {
            $this->debug("Missing side effect symptom reference for '$input'. Defaulting to Symptom Type" . EOL);
            //$ret = $this->controller->symptomLibService()->save($input, null);

            $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                        \SqlFormatter::makeType("Symptoms")));

            $type = "Symptoms";

            $this->saveSql($insertStmt);
        }

        if ($action)
        {
            // create drug action receiver
            //$drugAction = $this->controller->actionLibService()->createDrugActionReceiver($drug, $action, $ret);
            $insertStmt .= \SqlFormatter::makeInsert("drugs_actions", array(
                        "Drug" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $drug, "Type" => \SqlFormatter::makeType("Drugs"))),
                        "Action" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $action, "Type" => \SqlFormatter::makeType("Actions"))),
                        "Receiver" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $name, "Type" => \SqlFormatter::makeType($type)))));

            $this->saveSql($insertStmt);
        }

        $nameWithType = $name . "{{SEP}}" . $type;

        return $nameWithType;
    }

    private function processContraInd($input, $drug)
    {
        // Action - Separated by []
        $action = null;

        $this->debug("===>Contra-ind item action: " . $input . EOL);

        $input = $this->parseActions($input, $action);

        $type = null;

        $ret = $this->processRefType($input, $type);

        $name = $ret;

        if (!$type)
        {
            $this->debug("Missing side effect symptom reference for '$input'. Defaulting to Symptom Type" . EOL);
            //$ret = $this->controller->symptomLibService()->save($input, null);

            $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                        \SqlFormatter::makeType("Symptoms")));

            $type = "Symptoms";

            $this->saveSql($insertStmt);
        }

        if ($action)
        {
            // create drug action receiver
            //$drugAction = $this->controller->actionLibService()->createDrugActionReceiver($drug, $action, $ret);
            $insertStmt .= \SqlFormatter::makeInsert("drugs_actions", array(
                        "Drug" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $drug, "Type" => \SqlFormatter::makeType("Drugs"))),
                        "Action" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $action, "Type" => \SqlFormatter::makeType("Actions"))),
                        "Receiver" => \SqlFormatter::makeInnerSelect("libraryvalue", array("Id"), array("Name" => $name, "Type" => \SqlFormatter::makeType($type)))));

            $this->saveSql($insertStmt);
        }

        $nameWithType = $name . "{{SEP}}" . $type;

        return $nameWithType;
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

    private function processRefType($input, &$type)
    {
        // find the reference
        $posStart = strrpos($input, $this->REF_TOKEN_START);

        $name = $input;

        if ($posStart)
        {
            $posEnd = strrpos($input, $this->REF_TOKEN_END);

            $ref = substr($input, $posStart + 1, $posEnd - ($posStart + 1));

            $name = substr($input, 0, $posStart);

            switch ($ref)
            {
                case "ref:symptom":
                    //$ret = $this->controller->symptomLibService()->save($name, $name);
                    $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                                \SqlFormatter::makeType("Symptoms")));

                    $this->saveSql($insertStmt);

                    $type = "Symptoms";
                    break;
                case "ref:disease":
//                    $ret = $this->controller->diseaseLibService()->save($name, $name, 'Diseases');
                    $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                                \SqlFormatter::makeType("Diseases")));

                    $this->saveSql($insertStmt);
                    $type = "Diseases";
                    break;
                case "ref:drug":
//                    $ret = $this->controller->drugLibService()->save($name, $name, 'Drugs');
                    $insertStmt = \SqlFormatter::makeInsert("libraryvalue", array("Name" => $name, "Description" => "", "Type" =>
                                \SqlFormatter::makeType("Drugs")));

                    $this->saveSql($insertStmt);
                    $type = "Drugs";
                    break;
            }
        }
        return $name;
    }

}
