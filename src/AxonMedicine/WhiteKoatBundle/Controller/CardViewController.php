<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AxonMedicine\WhiteKoatBundle\Dto\StudentDrugInfoDto;
use AxonMedicine\WhiteKoatBundle\Dto\StudentDiseaseInfoDto;

/**
 * This is the main controller for student landing page and all links in menu.
 * 
 * @Route("/search") 
 */
class CardViewController extends GenericController
{


    /**
     * @Route("/", name="homepage_search" )
	 * @param request the request
     * @return type
     */
    public function doSearch(Request $request)
    {
        $session = $this->getRequest()->getSession();

// always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $loginInfo = $session->get('logininfo');

			$searchValue = $request->get('q');

            $ret = null;
			

            if (!empty($selectedDrugOption))
            {
                $values = explode(':::', $selectedDrugOption);
                $displayName = $values[0];
                $drugName = $values[1];
                $ret = $this->doDrugSearch($displayName, $drugName);
                return $this->render('AxonMedicineWhiteKoatBundle:Default:student.drug.search.html.twig', array('name' => $loginInfo->getUsername(), 'drugSearchOutput' => $ret, 'selOption' => $displayName));
            } else
            {
                $values = explode(':::', $selectedDiseaseOption);
                $libType = $values[0];
                $diseaseName = $values[1];
                $ret = $this->doDiseaseSearch($libType, $diseaseName);
                return $this->render('AxonMedicineWhiteKoatBundle:Default:student.disease.search.html.twig', array('name' => $loginInfo->getUsername(), 'diseaseinfo' => $ret, 'selOption' => $libType));
            }
        }
    }

    private function doDrugSearch($displayName, $drugName)
    {

        $ret = null;

        switch ($displayName)
        {
            case "Indications":
            case "Contraindications":
            case "Side Effects":
//                $ret = $this->convertDrugToStringArray($this->relationshipService()->getBy($drugName, $displayName));
                $ret = $this->relationshipService()->getBy($drugName, $displayName);

                break;
            case "Mechanism":

                $drug = $this->drugCardService()->getStudentDrugCardBy($drugName);

                $ret = array(array("first" => $drugName, "second" => $drug->getDrugmechanism()));
        }
        return $ret;
    }

    private function convertDrugToStringArray($input)
    {
        $output = array();
        foreach ($input as $item)
        {
            $line = $item['first'] . ' ' . $item['second'] . ' ' . $item['third'] . $item['fourth'];

            array_push($output, $line);
        }

        return array_unique($output);
    }

    private function doDiseaseSearch($libType, $diseaseName)
    {

        $ret = null;

        switch ($libType)
        {
            case "Treatments":
                $diseases = $this->diseaseCardService()->getStudentDiseaseCardBy($diseaseName);
                $output = array();
                foreach ($diseases as $dis)
                {
                    array_push($output, $dis->getDiseasetreatment());
                }

                $ret = array_unique($output);

                break;
            case "Mechanism":
//                    $drug = $this->drugCardService()->getStudentDrugCardBy($drugName);
                //                  $ret = array($drug->getDrugmechanism());
                $ret = array("None currently");

                break;
            case "Symptoms":
                $diseases = $this->diseaseCardService()->getStudentDiseaseCardBy($diseaseName);
                $output = array();
                if ($diseases != null)
                {
                    foreach ($diseases as $disease)
                    {
                        array_push($output, $disease->getDiseasesymptom());
                    }
                }
                $ret = array_unique($output);

                break;
        }
        return $ret;
    }

    private function getLibTypes()
    {
        $types = $this->typeLibService()->getTypes();
        return $types;
    }

    /**
     * @Route("/card", name="sc_card_route_search" )
     * @param request the request
     * @return type
     */
    public function searchCardAction(Request $request)
    {
        $ret = null;
        $session = $this->getRequest()->getSession();

// always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $loginInfo = $session->get('logininfo');
// get the id.
            $itemName = $request->query->get('dn');

            $card = $this->typeLibService()->getTypeBy($itemName);

            switch ($card->getType()->getName())
            {
                case 'Drugs':
                case 'DiseaseTreatments':
                    $ret = $this->searchDrugCard($loginInfo->getUsername(), $card->getName());
                    break;
                case 'Diseases':
                    $ret = $this->searchDiseaseCard($loginInfo->getUsername(), $card->getName());
                    break;

                default:
                    echo 'problem with card type';
            }
        }
        return $ret;
    }

    private function searchDrugCard($username, $drugname)
    {
// get the drug info.
        $drugCard = $this->drugCardService()->getStudentDrugCardBy($drugname);

        $drugInfo = new StudentDrugInfoDto('unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown');
        if ($drugCard != null)
        {
            $id = $drugCard->getId();
            $generic = $drugCard->getDrugname();
            $brands = $drugCard->getDrugbrand();
            $classes = $drugCard->getDrugclass();
            $targets = $drugCard->getDrugtarget();
            $treatments = $this->formatDrugCard($drugCard->getDrugName(), $drugCard->getDrugtreatment(), 'Diseases');
            $mechanism = $drugCard->getDrugmechanism();
            $sideeffects = $drugCard->getDrugsideeffect();
            $contrainds = $drugCard->getDrugcontraind();

            $drugInfo = new StudentDrugInfoDto($id, $generic, $brands, $classes, $targets, $treatments, $mechanism, $sideeffects, $contrainds);
        }
        return $this->render('AxonMedicineWhiteKoatBundle:Default:student.drug.card.html.twig', array('name' => $username, 'druginfo' => $drugInfo));
    }

    private function searchDiseaseCard($username, $diseasename)
    {
        $diseaseCard = $this->diseaseCardService()->getStudentDiseaseCardBy($diseasename);

        $id = "1";
        $diseaseInfo = new StudentDiseaseInfoDto('', '', '', '', '', '');
        if ($diseaseCard != null)
        {
            $disease = $diseaseCard->getDiseasename();
//            $drug = $diseaseCard->getDrugname();
            $type = $diseaseCard->getDiseasetype();
            $symptom = $diseaseCard->getDiseasesymptom();
            $cause = $diseaseCard->getDiseasecause();
            $treatment = $this->formatDiseaseCard($diseaseCard->getDiseasetreatment(), 'Drugs');
            $diseaseInfo->setDisease($disease);
            $diseaseInfo->setType($type);
            $diseaseInfo->setSymptom($symptom);
            $diseaseInfo->setCause($cause);
            $diseaseInfo->setTreatment($treatment);
        } else
        {
            
        }
        return $this->render('AxonMedicineWhiteKoatBundle:Default:student.disease.card.html.twig', array('name' => $username, 'diseaseinfo' => $diseaseInfo));
    }

    private function formatDrugCard($drugName, $input, $otherType)
    {
        $values = explode(',', $input);
        $ret = '';
        foreach ($values as $value)
        {
            $value = trim($value);

            $treatmentType = $this->typeLibService()->getTypeBy($value);

            if ($treatmentType != null && $treatmentType->getType()->getName() === 'Diseases')
            {
                // check if disease relationship data available.
                $exists = $this->typeLibService()->exists($drugName, $value, 'Drugs', $otherType);

                if ($exists)
                {
                    $windowName = 'DiseaseCard_' . preg_replace('/\s+/', '', $value);
                    $ret .= "<a onclick=\"showCard('card?dn=" . $value . "', '" . $windowName . "', '325', (screen.height / 2) - (600 / 2));\">" . $value . "</a><br />";
                } else
                {
                    $ret .= $value . '<br />';
                }
            } else
            {
                $ret .= $value . '<br />';
            }
        }
        return $ret;
    }

    private function formatDiseaseCard($input, $otherType)
    {
        $values = explode(',', $input);
        $ret = '';
        foreach ($values as $value)
        {
            $value = trim($value);

            $treatmentType = $this->typeLibService()->getTypeBy($value);

            if ($treatmentType != null && $treatmentType->getType()->getName() === 'Drugs')
            {
                $windowName = 'DrugCard_' . preg_replace('/\s+/', '', $value);
                $ret .= "<a onclick=\"showCard('card?dn=" . $value . "', '" . $windowName . "', 10, (screen.height / 2) - (600 / 2));\">" . $value . "</a><br />";
            } else
            {
                $ret .= $value . '<br />';
            }
        }
        return $ret;
    }

}
