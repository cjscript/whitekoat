<?php

namespace AxonMedicine\WhiteKoatBundle\Utils\Importer\DrugDataImporter;

use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;
use AxonMedicine\WhiteKoatBundle\Dto\ProcessInfoDto;

/**
 * The Excel drug test data importer for WhiteKoat.
 *
 * @author cjscript
 */
class MicroDataParser extends DataParser
{

    private $ITEM_SPLIT_TOKEN = "+++";
    private $REF_TOKEN_START = "{ref:";
    private $REF_TOKEN_END = "}";
    private $ACTION_TOKEN_START = "[";
    private $ACTION_TOKEN_END = "]";
    private $SHEET_TAB_NAME = 'Full Drug Data - Steven Edits';
    private $DRUG_DATA_NAME_COUNT_MAP = array(
        "Species" => -1,
    );
    private $DRUG_DATA_IDX_NAME_MAP = array(
        0 => "Species"
    );

    public function __construct($controller)
    {
        parent::__construct($controller);
    }

    public function run($original, $new)
    {
        //  Read  Excel workbook
        try
        {
            $inputFileType = \PHPExcel_IOFactory::identify($new);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($new);
            echo '++++++++++++++++++++++++++++++++++' . EOL;
            echo '++++MICRO DATA IMPORT STARTING+++++' . EOL;
            $this->processMicroData($objPHPExcel, $this->SHEET_TAB_NAME, $this->DRUG_DATA_NAME_COUNT_MAP, $this->DRUG_DATA_IDX_NAME_MAP);
        } catch (Exception $e)
        {
            die('Error loading file "' . pathinfo($new, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        echo EOL;
        echo '++++MICRO DATA IMPORT FINISHED+++++' . EOL;
        echo '++++++++++++++++++++++++++++++++++' . EOL . EOL;
    }

    private function processMicroData($objPHPExcel, $sheetName, $colToCountArray, $indexToNameArray)
    {
/**        $processInfo = new ProcessInfoDto();

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
//        $relatesToDrugTarget = $this->controller->typeLibService()->getTempLookupBy("Drug Target");

        $loops = 0;
        $successCount = 0;

        for ($row = 2; $row <= $highestRow; $row++)
        {
            $species = null;

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
                            case 'Species':
                                $species = $this->processRecord($colvalue, 'processGeneric', 'Species', null);
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

            $this->controller->microCardService()->createCardBy($species);
            $successCount++;

            $loops++;
        }

        $processInfo->setLoops($loops);
        $processInfo->setSuccessCount($successCount);
        return $processInfo;
 */
    }

    private function processRecord($input, $callback, $type, $drug)
    {
        // Processed in the order below:
        // 1) Items - Separated by '+++'
        // 2) Aliases - Separated by {}

        $items = explode($this->ITEM_SPLIT_TOKEN, $input);

        $arrItems = array();

        foreach ($items as $item)
        {
            // create the record.
            $retFromFunc = call_user_func_array(array($this, $callback), array($item, $drug));

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
                    echo 'no defined type: ' . $input . ' return: ' . $retFromFunc;
                }
            }
        }

        try
        {
            // remove duplicates
            return array_unique($arrItems);
        } catch (\Exception $e)
        {
            echo 'exception with input: ' . $input;
            die;
        }
    }

    private function processGeneric($input, $drug)
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

    private function processBrand($input, $drug)
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

    private function processClass($input, $drug)
    {
        $this->debug("===>Drug class name: " . $input . EOL);

        $name = $input;
        $desc = null;

        // create generic record
        $ret = $this->controller->classLibService()->save($name, $desc);
        $this->debug('class lib ' . $name . ' saved.' . EOL);
        return $ret;
    }

    private function processTarget($input, $drug)
    {
        // Each drug can perform an action on a target - Separated by []
        $action = null;

        $input = $this->parseActions($input, $action);

        $name = $input;
        $desc = null;

        // create target/molecule record
        $ret = $this->controller->moleculeLibService()->save($name, $desc);

        if ($ret)
        {
            $this->debug('target/molecule lib ' . $name . ' saved.' . EOL);

            if ($action)
            {
                // create drug action receiver
                $drugAction = $this->controller->actionLibService()->createDrugActionReceiver($drug, $action, $ret);
                $this->debug('drug/action/receiver created:  ' . $drugAction->getDrug()->getName() . '/' . $drugAction->getAction()->getName() . '/' . $drugAction->getReceiver()->getName() . ' saved.' . EOL);
            }
        }


        return $ret;
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

        $this->debug("===>Treatment item action: " . $input . EOL);

        $input = $this->parseActions($input, $action);

        $ret = $this->processRefType($input);

        if (!$ret)
        {
            $this->error("Missing treatment reference for '$input'.  Defaulting to Symptom Type" . EOL);
            $ret = $this->controller->symptomLibService()->save($input, null);
            if ($ret == null)
            {
                $this->error("Problem creating symptom: " . $input);
                exit;
            }
        }

        if ($ret)
        {
            $this->debug("===>Treatment created: " . $input . " reference: " . EOL);

            if ($action)
            {
                // create drug action receiver
                $drugAction = $this->controller->actionLibService()->createDrugActionReceiver($drug, $action, $ret);
                $this->debug('drug/action/receiver created:  ' . $drugAction->getDrug()->getName() . '/' . $drugAction->getAction()->getName() . '/' . $drugAction->getReceiver()->getName() . ' saved.' . EOL);
            }
        }

        return $ret;
    }

    private function processSideEffect($input, $drug)
    {
        // Action - Separated by []
        $action = null;

        $this->debug("===>Side effect item action: " . $input . EOL);

        $input = $this->parseActions($input, $action);

        $ret = $this->processRefType($input);

        if (!$ret)
        {
            $this->debug("Missing side effect symptom reference for '$input'.  Defaulting to Symptom Type" . EOL);
            $ret = $this->controller->symptomLibService()->save($input, null);
            if ($ret == null)
            {
                $this->debug("Problem with side effect: " . $input);
            }
        }

        if ($ret)
        {
            $this->debug("===>Side effect created: " . $input . " reference: " . EOL);
            if ($action)
            {
                // create drug action receiver
                $drugAction = $this->controller->actionLibService()->createDrugActionReceiver($drug, $action, $ret);
                $this->debug('drug/action/receiver created:  ' . $drugAction->getDrug()->getName() . '/' . $drugAction->getAction()->getName() . '/' . $drugAction->getReceiver()->getName() . ' saved.' . EOL);
            }
        }

        return $ret;
    }

    private function processContraInd($input, $drug)
    {
        // Action - Separated by []
        $action = null;

        $this->debug("===>Contra-ind item action: " . $input . EOL);

        $input = $this->parseActions($input, $action);

        $ret = $this->processRefType($input);

        if (!$ret)
        {
            $this->error("Missing contra-ind effect symptom reference for '$input'.  Defaulting to Symptom Type" . EOL);
            $ret = $this->controller->symptomLibService()->save($input, null);
            if ($ret == null)
            {
                $this->error("Problem with contra-ind: " . $input);
            }
        }

        if ($ret)
        {
            $this->debug("===>Contra-ind created: " . $input . " reference: " . EOL);

            if ($action)
            {
                // create drug action
                $drugAction = $this->controller->actionLibService()->createDrugActionReceiver($drug, $action, $ret);
                $this->debug('drug/action/receiver created:  ' . $drugAction->getDrug()->getName() . '/' . $drugAction->getAction()->getName() . '/' . $drugAction->getReceiver()->getName() . ' saved.' . EOL);
            }
        }

        return $ret;
    }

    private function parseActions($input, &$action)
    {
        $actionToExclude = "";

        if (preg_match('/\[(.*)\]/s', $input, $action))
        {
            $actionRet = $action[1];

            $actionToExclude = $this->ACTION_TOKEN_START . $actionRet . $this->ACTION_TOKEN_END;

            $name = $actionRet;

            $desc = null;

            $action = $this->controller->actionLibService()->save($name, $desc);
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
