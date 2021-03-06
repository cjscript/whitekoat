<?php

namespace AxonMedicine\WhiteKoatBundle\Utils\Importer\DrugDataImporter;

use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;
use AxonMedicine\WhiteKoatBundle\Dto\ProcessInfoDto;

/**
 * The Excel disease test data importer for WhiteKoat.
 *
 * @author cjscript
 */
class DiseaseDataParser extends DataParser
{

    private $ITEM_SPLIT_TOKEN = "+++";
    private $ACTION_TOKEN_START = "[";
    private $ACTION_TOKEN_END = "]";
    private $DISEASE_DATA_NAME_COUNT_MAP = array(
        "Disease Name" => -1,
        "DiseaseType" => -1,
        "Organ System" => -1,
        "Structure" => -1,
        "Cause" => -1,
        "Symptom" => -1);
    private $DISEASE_DATA_IDX_NAME_MAP = array(
        0 => "Disease Name",
        1 => "DiseaseType",
        2 => "Organ System",
        3 => "Structure",
        4 => "Cause",
        5 => "Symptom");

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
            echo '++++DISEASE DATA IMPORT STARTING+++++' . EOL;
            $this->processData($objPHPExcel, 'FULL Disease Data', $this->DISEASE_DATA_NAME_COUNT_MAP, $this->DISEASE_DATA_IDX_NAME_MAP);
        } catch (Exception $e)
        {
            die('Error loading file "' . pathinfo($new, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        echo EOL;
        echo '++++DISEASE DATA IMPORT FINISHED+++++' . EOL;
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

        $loops = 0;
        $successCount = 0;
        $errorCount = 0;


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

        $targetseen = false;

        for ($row = 2; $row <= $highestRow; $row++)
        {
            $diseaseRet = null;
            $disease = null;
            $typeRet = null;
            $causeRet = null;
            $symptomRet = null;
            $output = "";

            //  Read a row of data into array
            $dataRow = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $highestRow, NULL, TRUE, FALSE)[0];
            foreach ($dataRow as $colkey => $colvalue)
            {
                if (array_key_exists($colkey, $indexToNameArray))
                {
                    if (!empty($colvalue))
                    {
                        try
                        {
                            switch ($indexToNameArray[$colkey])
                            {
                                // disease data
                                case "Disease Name":
                                    $diseaseRet = $this->processRecord($colvalue, 'processDisease', 'Diseases', null);
                                    $disease = $this->controller->diseaseLibService()->getLibBy($diseaseRet);
                                    break;
                                case "DiseaseType":
                                    $typeRet = $this->processRecord($colvalue, 'processDiseaseType', 'Types', $disease);
                                    break;
                                case "Cause":
                                    $causeRet = $this->processRecord($colvalue, 'processCause', 'Causes', $disease);
                                    break;
                                case "Symptom":
                                    $symptomRet = $this->processRecord($colvalue, 'processSymptom', 'Symptoms', $disease);
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
            }

            if ($diseaseRet)
            {
                $this->controller->diseaseCardService()
                        ->createCardBy($disease, $typeRet, $causeRet, $symptomRet);
                $successCount++;
            }
            $loops++;
            echo ".";
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
                } else if ($type == 'StringType')
                {
                    array_push($arrItems, $retFromFunc);
                }
            }
        }

        return array_unique($arrItems);
    }

    private function processDisease($input, $generic)
    {
        $actions = null;

        $input = $this->processActions($input, $actions);

        if ($actions != null)
        {
            $this->debug("===>disease name action: " . implode(', ', $actions) . EOL);
        }

        $name = $input;
        $desc = null;

        // create record
        $ret = $this->controller->diseaseLibService()->save($name, $desc, 'Diseases');
        $this->debug("===>Disease name: " . $input . EOL);
        return $ret;
    }

    private function processDiseaseType($input, $generic)
    {
        $actions = null;

        $input = $this->processActions($input, $actions);

        if ($actions != null)
        {
            $this->debug("===>disease type action: " . implode(', ', $actions) . EOL);
        }

        $name = $input;
        $desc = null;

        // create generic record
        $ret = $this->controller->diseaseLibService()->save($name, $desc, 'DiseaseTypes');
        $this->debug("===>Disease type: " . $input . EOL);
        return $ret;
    }

    private function processCause($input, $generic)
    {
        $actions = null;

        $input = $this->processActions($input, $actions);

        if ($actions != null)
        {
            $this->debug("===>disease cause action: " . implode(', ', $actions) . EOL);
        }

        $name = $input;
        $desc = null;

        // create disease cause
        $ret = $this->controller->diseaseLibService()->save($name, $desc, 'Molecules');

        $this->debug("===>Disease cause: " . $input . EOL);

        return $ret;
    }

    private function processSymptom($input, $generic)
    {
        $actions = null;

        $input = $this->processActions($input, $actions);

        if ($actions != null)
        {
            $this->debug("===>disease symptom action: " . implode(', ', $actions) . EOL);
        }

        $name = $input;
        $desc = null;

        // create disease symptom
        $ret = $this->controller->diseaseLibService()->save($name, $desc, 'Symptoms');

        $this->debug("===>Disease symptom: " . $input . EOL);

        return $ret;
    }

    private function processTreatment($input)
    {
        // find all related drug treatments for the current disease.
        $this->debug("===>Treatments processed" . EOL);


        $leftSideType = 'Drugs';
        $rightSideType = 'Diseases';
        $rightSideValue = $input;
        $lookupName = 'Treatment';

//        echo 'input: ' . $input . EOL;

        $rels = $this->controller->relationshipService()->getByFull($leftSideType, $rightSideType, $rightSideValue, $lookupName);

        // get library values from relationships.
        $arrItems = array();

        if ($rels != null)
        {
            foreach ($rels as $rel)
            {
                array_push($arrItems, $rel->getLeftside()->getId());
            }
        }
        $ret = implode(":", $arrItems);

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
                $this->controller->actionLibService()->save($name, $desc);
                $this->debug('Action lib ' . $name . ' saved.' . EOL);
            }
        }

        $newInput = str_replace($actionToExclude, "", $input);

        return $newInput;
    }

}
