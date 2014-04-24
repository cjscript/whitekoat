<?php

namespace AxonMedicine\WhiteKoatBundle\Utils\Importer\DrugDataImporter;

use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;
use AxonMedicine\WhiteKoatBundle\Dto\ProcessInfoDto;

/**
 * The Excel drug test data importer for WhiteKoat.
 *
 * @author cjscript
 */
class DrugDataParser extends DataParser
{

    private $ITEM_SPLIT_TOKEN = "+++";
    private $REF_TOKEN_START = "{ref:";
    private $REF_TOKEN_END = "}";
    private $ACTION_TOKEN_START = "[";
    private $ACTION_TOKEN_END = "]";
    private $SHEET_TAB_NAME = 'Full Drug Data - Steven Edits';
    private $DRUG_DATA_NAME_COUNT_MAP = array(
        "Generic Name" => -1,
        "Brand Name" => -1,
        "Type" => -1,
        "Therapeutic Class" => -1,
        "Pharmacologic Class" => -1,
        "Drug Target" => -1,
        "Mechanism" => -1,
        "Treatment" => -1,
        "Side Effect" => -1,
        "Contraindication" => -1
    );
    private $DRUG_DATA_IDX_NAME_MAP = array(
        0 => "Generic Name",
        1 => "Brand Name",
        2 => "Type",
        3 => "Therapeutic Class",
        4 => "Pharmacologic Class",
        5 => "Drug Target",
        6 => "Mechanism",
        7 => "Treatment",
        8 => "Side Effect",
        9 => "Contraindication"
    );

    public function __construct($controller)
    {
        parent::__construct($controller);
    }

    public function parse($original, $new)
    {
        //  Read  Excel workbook
        try
        {
            $inputFileType = \PHPExcel_IOFactory::identify($new);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($new);
            $this->processDrugData($objPHPExcel, $this->SHEET_TAB_NAME, $this->DRUG_DATA_NAME_COUNT_MAP, $this->DRUG_DATA_IDX_NAME_MAP);
        } catch (Exception $e)
        {
            die('Error loading file "' . pathinfo($new, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        echo '++++DRUG DATA IMPORT FINISHED+++++' . EOL . EOL;
    }

    private function processDrugData($objPHPExcel, $sheetName, $colToCountArray, $indexToNameArray)
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

        // prime the lookup values.
        $relatesToDrugTarget = $this->controller->typeLibService()->getTempLookupBy("Drug Target");
        $relatesToTreatment = $this->controller->typeLibService()->getTempLookupBy("Treatment");
        $relatesToSideEffect = $this->controller->typeLibService()->getTempLookupBy("Side Effect");
        $relatesToContraindication = $this->controller->typeLibService()->getTempLookupBy("Contraindication");

        $loops = 0;
        $successCount = 0;

        for ($row = 2; $row <= $highestRow; $row++)
        {
            $genericRet = null;
            $brandRet = null;
            $classRet1 = null;
            $classRet2 = null;
            $targetRet = null;
            $treatmentRet = null;
            $mechanismRet = null;
            $sideEffectRet = null;
            $contraRet = null;

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
                            // drug data
                            case 'Generic Name':
                                $genericRet = $this->processRecord($colvalue, 'processGeneric', 'Drugs', null);
                                break;
                            case 'Brand Name':
                                $brandRet = $this->processRecord($colvalue, 'processBrand', 'Drugs', $genericRet);
                                break;
                            case 'Type':
                                break;
                            case 'Therapeutic Class':
                                $classRet1 = $this->processRecord($colvalue, 'processClass', 'Classes', $genericRet);
                                break;
                            case 'Pharmacologic Class':
                                $classRet2 = $this->processRecord($colvalue, 'processClass', 'Classes', $genericRet);
                                break;
                            case 'Drug Target':
                                $targetRet = $this->processRecord($colvalue, 'processTarget', 'Molecules', $genericRet);
                                break;
                            case 'Mechanism':
                                $mechanismRet = $this->processRecord($colvalue, 'processMechanism', 'Mechanism', $genericRet);
                                break;
                            case 'Treatment':
                                $treatmentRet = $this->processRecord($colvalue, 'processTreatment', 'Diseases', $genericRet);
                                break;
                            case 'Side Effect':
                                $sideEffectRet = $this->processRecord($colvalue, 'processSideEffect', 'SideEffects', $genericRet);
                                break;
                            case 'Contraindication':
                                $contraRet = $this->processRecord($colvalue, 'processContraInd', 'ContraInd', $genericRet);
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

            if ($genericRet)
            {
                $classArr = array();
                if (!empty($classRet1))
                {
                    array_push($classArr, $classRet1);
                }
                if (!empty($classRet2))
                {
                    array_push($classArr, $classRet2);
                }
                $classRet = implode(":", $classArr);

                $this->controller->drugCardService()->createDrugCardBy(
                        $genericRet, $brandRet, $classRet, $targetRet, $treatmentRet, $mechanismRet, $sideEffectRet, $contraRet, $relatesToDrugTarget, $relatesToTreatment, $relatesToSideEffect, $relatesToContraindication
                );
                $successCount++;
            }

            $loops++;
        }

        $processInfo->setLoops($loops);
        $processInfo->setSuccessCount($successCount);
        return $processInfo;
    }

    private function processRecord($input, $callback, $type, $generic)
    {
        // Processed in the order below:
        // 1) Items - Separated by '+++'
        // 2) Aliases - Separated by {}

        $items = explode($this->ITEM_SPLIT_TOKEN, $input);

        $arrItems = array();

        foreach ($items as $item)
        {
            // create the record.
            $retFromFunc = call_user_func_array(array($this, $callback), array($item, $generic));

            if ($retFromFunc != null)
            {
                if ($retFromFunc instanceof Libraryvalue)
                {
                    array_push($arrItems, $retFromFunc->getId());
                } else if (is_string($retFromFunc))
                {
                    array_push($arrItems, $retFromFunc);
                } else
                {
                    echo 'no defined tpye: ' . $input . ' return: ' . $retFromFunc;
                }
            }
        }

        try
        {
            echo 'drug item with dups: ';
            print_r($arrItems);
            echo EOL;

            // remove duplicates
            $arrItemsWithoutDups = array_unique($arrItems);

            echo 'drug item without dups: ';
            print_r($arrItemsWithoutDups);
            echo EOL;




            $ret = implode(":", $arrItemsWithoutDups);
        } catch (\Exception $e)
        {
            echo 'exception with input: ' . $input;
            die;
        }
        return $ret;
    }

    private function processGeneric($input, $generic)
    {
        $this->debug("===>Generic drug name: " . $input . EOL);

        $name = $input;
        $desc = null;
        $generic = true;

        // create generic record
        $ret = $this->controller->drugLibService()->save($name, $desc, $generic);
        $this->debug('drug ' . $name . ' saved.' . EOL);

        return $ret;
    }

    private function processBrand($input, $generic)
    {
        $this->debug('===>brand item: ' . $input . EOL);

        $name = $input;
        $desc = null;
        $generic = false;

        // create generic record
        $ret = $this->controller->drugLibService()->save($name, $desc, $generic);

        $this->debug('drug ' . $name . ' saved.' . EOL);
        return $ret;
    }

    private function processClass($input, $generic)
    {
        $this->debug("===>Drug class name: " . $input . EOL);

        $name = $input;
        $desc = null;

        // create generic record
        $ret = $this->controller->classLibService()->save($name, $desc);
        $this->debug('class lib ' . $name . ' saved.' . EOL);
        return $ret;
    }

    private function processTarget($input, $generic)
    {
        // Each drug can perform an action on a target - Separated by []
        $actions = null;

        $input = $this->processActions($input, $actions);

        if ($actions != null)
        {
            $this->debug("===>target item action: " . implode(', ', $actions) . EOL);
        }

        $name = $input;
        $desc = null;

        // create target/molecule record
        $ret = $this->controller->moleculeLibService()->save($name, $desc);

        $this->debug('target/molecule lib ' . $name . ' saved.' . EOL);

        return $ret;
    }

    private function processMechanism($input, $generic)
    {
        // current does nothing.  Depends on drug card view.
        $this->debug("===>Drug mechanism name: " . $input . EOL);

        return $input;
    }

    private function processTreatment($input, $generic)
    {
        // Action - Separated by []
        $actions = null;

        $this->debug("===>Treatment item action: " . $input . EOL);

        $input = $this->processActions($input, $actions);

        $ret = $this->processRefType($input);

        if (!$ret)
        {
            $this->error("Missing treatment reference for '$input'.  Defaulting to Symptom Type" . EOL);
            $ret = $this->controller->symptomLibService()->save($input, $input);
            if ($ret == null)
            {
                $this->error("Problem creating symptom: " . $input);
            } else
            {
                $this->debug("===>Treatment created: " . $input . " reference: " . EOL);
            }
        }

        return $ret;
    }

    private function processSideEffect($input, $generic)
    {
        // Action - Separated by []
        $actions = null;

        $this->debug("===>Side effect item action: " . $input . EOL);

        $input = $this->processActions($input, $actions);

        $ret = $this->processRefType($input);

        if (!$ret)
        {
            $this->debug("Missing side effect symptom reference for '$input'.  Defaulting to Symptom Type" . EOL);
            $ret = $this->controller->symptomLibService()->save($input, $input);
            if ($ret == null)
            {
                $this->debug("Problem with side effect: " . $input);
            }
        }

        if ($ret != null)
        {
            $this->debug("===>Side effect name: " . $ret->getName() . EOL);
        }


        return $ret;
    }

    private function processContraInd($input, $generic)
    {
        // Action - Separated by []
        $actions = null;

        $this->debug("===>Contra-ind item action: " . $input . EOL);

        $input = $this->processActions($input, $actions);

        $ret = $this->processRefType($input);

        if (!$ret)
        {
            $this->error("Missing side effect symptom reference for '$input'.  Defaulting to Symptom Type" . EOL);
            $ret = $this->controller->symptomLibService()->save($input, $input);
            if ($ret == null)
            {
                $this->error("Problem with contra-ind: " . $input);
            }
        }

        if ($ret != null)
        {
            $this->debug("===>Contra-ind name: " . $ret->getName() . EOL);
        }


        return $ret;
    }

    private function processActions($input, &$actions)
    {
        $actionToExclude = "";

        if (preg_match('/\[(.*)\]/s', $input, $action))
        {
            $actionRet = $action[1];

            $actionToExclude = $this->ACTION_TOKEN_START . $actionRet . $this->ACTION_TOKEN_END;

            $actions = explode($this->ITEM_SPLIT_TOKEN, $actionRet);

            foreach ($actions as $action)
            {
                $name = $action;
                $desc = null;

                // create action record
                //                try
                //                {
                // save if doesn't exist.

                $this->controller->actionLibService()->save($name, $desc);
                $this->debug('Action lib ' . $name . ' saved.' . EOL);

                /**                } catch (\Exception $e)
                  {
                  echo 'Already exists: ' . $name . EOL;
                  break;
                  } */
            }
        }

        $newInput = str_replace($actionToExclude, "", $input);

        return $newInput;
    }

    private function processRefType($input)
    {
        $ret = null;
        // find the reference
        $posStart = strrpos($input, $this->REF_TOKEN_START);

        if ($posStart)
        {
            $posEnd = strrpos($input, $this->REF_TOKEN_END);

            $ref = substr($input, $posStart + 1, $posEnd - ($posStart + 1));

            $name = substr($input, 0, $posStart);

            switch ($ref)
            {
                case "ref:symptom":
                    $ret = $this->controller->symptomLibService()->save($name, $name);

                    break;
                case "ref:disease":
                    $ret = $this->controller->diseaseLibService()->save($name, $name, 'Diseases');

                    break;
                case "ref:drug":
                    $ret = $this->controller->drugLibService()->save($name, $name, 'Drugs');

                    break;
            }
        }
        return $ret;
    }

}
