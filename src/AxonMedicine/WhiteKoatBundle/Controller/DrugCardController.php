<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AxonMedicine\WhiteKoatBundle\Dto\DiseaseDto;

//use Doctrine\ORM\AbstractQuery;

/**
 * This is the main controller for home page and all links in menu.
 * 
 * @Route("/dcard") 
 */
class DrugCardController extends GenericController
{

    /**
     * @Route("/drugpup", name="drug_popup_route_get" )
     * @param request the request
     * @return type
     */
    public function showGenericDrugPopup(Request $request)
    {
        $session = $request->getSession();

// always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $loginInfo = $session->get('logininfo');

            $generic = $request->get('generic');

            $drugNames = $this->getDrugs($generic);

            if ($generic)
            {
                return $this->render('AxonMedicineWhiteKoatBundle:Default:drug.generic.modal.html.twig', array('name' => $loginInfo->getUsername(), 'drugNames' => $drugNames));
            } else
            {
                return $this->render('AxonMedicineWhiteKoatBundle:Default:drug.brand.modal.html.twig', array('name' => $loginInfo->getUsername(), 'drugNames' => $drugNames));
            }
        }
    }

    /**
     * @Route("/drdispup", name="drugdisease_popup_route_get" )
     * @param request the request
     * @return type
     */
    public function showDrugDiseasePopup(Request $request)
    {
        $session = $request->getSession();

// always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $loginInfo = $session->get('logininfo');

            $generic = $request->get('generic');

            $drugs = $this->getDrugs($generic);

            $diseases = $this->diseaseLibService()->getTreatments();

            $drugdiseasenames = $this->merge($drugs, $diseases);

            return $this->render('AxonMedicineWhiteKoatBundle:Default:drug.disease.modal.html.twig', array('name' => $loginInfo->getUsername(), 'drugdiseasenames' => $drugdiseasenames));
        }
    }

    private function merge($drugs, $diseases)
    {
        $merged = array();

        foreach ($drugs as $drug)
        {
            $dto = new DiseaseDto($drug->getId(), $drug->getName(), $drug->getDescription());
            array_push($merged, $dto);
        }

        foreach ($diseases as $disease)
        {
            $dto = new DiseaseDto($disease->getId(), $disease->getName(), $disease->getDescription());
            array_push($merged, $dto);
        }


        return $merged;
    }

    /**
     * @Route("/dcpup", name="drug_class_popup_route_get" )
     * @param request the request
     * @return type
     */
    public function showDrugClassPopup(Request $request)
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

            $drugClasses = $this->getDrugClasses();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:drug.class.modal.html.twig', array('name' => $loginInfo->getUsername(), 'drugClasses' => $drugClasses));
        }
    }

    /**
     * @Route("/tgtpup", name="drug_target_popup_route_get" )
     * @param request the request
     * @return type
     */
    public function showDrugTargetPopup(Request $request)
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

            $molecules = $this->getDrugTargets();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:drug.target.modal.html.twig', array('name' => $loginInfo->getUsername(), 'molecules' => $molecules));
        }
    }

    /**
     * @Route("/ttmtpup", name="drug_treatment_popup_route_get" )
     * @param request the request
     * @return type
     */
    public function showDrugTreatmentPopup(Request $request)
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

            $treatments = $this->getDrugTreatments();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:drug.treatment.modal.html.twig', array('name' => $loginInfo->getUsername(), 'treatments' => $treatments));
        }
    }

    /**
     * @Route("/seffpup", name="drug_sideeffect_popup_route_get" )
     * @param request the request
     * @return type
     */
    public function showDrugSideEffectPopup(Request $request)
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

            $sideeffects = $this->getDrugSideEffects();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:drug.sideeffects.modal.html.twig', array('name' => $loginInfo->getUsername(), 'sideeffects' => $sideeffects));
        }
    }

    /**
     * @Route("/cindpup", name="drug_contraind_popup_route_get" )
     * @param request the request
     * @return type
     */
    public function showContraIndicationPopup(Request $request)
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

            $contrainds = $this->getDrugContraInd();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:drug.contraind.modal.html.twig', array('name' => $loginInfo->getUsername(), 'contrainds' => $contrainds));
        }
    }

    public function getDrugs($generic)
    {
        $drugs = $this->drugLibService()->getDrugs($generic);

        return $drugs;
    }

    public function getDrugClasses()
    {
        $classes = $this->classLibService()->getClasses();

        return $classes;
    }

    public function getDrugTargets()
    {
        $molecules = $this->moleculeLibService()->getTargets();

        return $molecules;
    }

    public function getDrugTreatments()
    {
        $treatments = $this->diseaseLibService()->getTreatments();

        return $treatments;
    }

    public function getDrugSideEffects()
    {
        // diseases(treatments) and symptoms.
        $treatments = $this->diseaseLibService()->getTreatments();
        $symptoms = $this->symptomLibService()->getSymptoms();

        $sideeffects = array_merge($treatments, $symptoms);

        return $sideeffects;
    }

    public function getDrugContraInd()
    {
        // drugs, diseases, and symptoms.
        $drugs = $this->drugLibService()->getDrugs(null);
        $treatments = $this->diseaseLibService()->getTreatments();
        $symptoms = $this->symptomLibService()->getSymptoms();
        $contrainds = array_merge($drugs, $treatments, $symptoms);
        return $contrainds;
    }

    /**
     * @Route("/g", name="drug_card_route_get" )
     * @param request the request
     * @return type
     */
    public function retrieveAction(Request $request)
    {
        $session = $request->getSession();

// always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $loginInfo = $session->get('logininfo');

            $drugcards = $this->drugCardService()->getDrugCardViews();

            $drugactions = $this->actionLibService()->getDrugActions();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:drug.card.html.twig', array('name' => $loginInfo->getUsername(), 'cardname' => 'Drug', 'drugcards' => $drugcards, 'drugactions' => $drugactions));
        }
    }

    /**
     * @Route("/s", name="drug_card_route_save" )
     * @Method({"POST"})
     * @param request the request
     * @return type
     */
    public function saveAction(Request $request)
    {
        $session = $request->getSession();

        // always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $loginInfo = $session->get('logininfo');

            $genericDrugId = $request->get('genericdrugnameid');

            $brandDrugIds = $request->get('branddrugnameids');

            $drugClassIds = $request->get('drugclassnameids');

            $drugTargetIds = $request->get('drugtargetnameids');

            $drugTreatmentIds = $request->get('drugtreatmentnameids');

            $drugMechanism = $request->get('drugmechanismid');

            $drugSideEffectIds = $request->get('drugsideeffectnameids');

            $drugContraIndIds = $request->get('drugcontraindnameids');

            $createdDrug = $this->drugCardService()->createDrugCardBy($genericDrugId, $brandDrugIds, $drugClassIds, $drugTargetIds, $drugTreatmentIds, $drugMechanism, $drugSideEffectIds, $drugContraIndIds, null, null, null, null);

            if (!$createdDrug)
            {
                $session->getFlashBag()->add('error', 'Drug card already exists.  Must delete first if want to add again.');
            } else
            {
                $session->getFlashBag()->add('notice', 'Drug card created successfully.');
            }

            $drugcards = $this->getDrugCards();

            return $this->redirect($this->generateUrl('drug_card_route_get'));
//            return $this->render('AxonMedicineWhiteKoatBundle:Default:drug.card.html.twig', );
        }
    }

    public function getDrugCards()
    {
        $drugcards = $this->drugCardService()->getDrugCards();
        if (!$drugcards)
        {
            $drugcards = array();
        }
        return $drugcards;
    }

    /**
     * @Route("/r", name="drug_route_remove" )
     * @param request the request
     * @return type
     */
    public function removeAction(Request $request)
    {
        $session = $this->getRequest()->getSession();

// always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {

            $id = $request->get('id');

            if ($id)
            {
                $em = $this->getDoctrine()->getManager();
                // remove drug view
                $value = $em->getRepository("AxonMedicineWhiteKoatBundle:DrugCardView")->find($id);
                $em->remove($value);

                // remove relationships...
                $drugnamerequest = $request->get('drugname');
                $query = $em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue a where a.name=?1');
                $query->setParameter(1, $drugnamerequest);
                $drugitem = $query->getSingleResult();

                $query = $em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\Relationship a where a.leftside=?1');
                $query->setParameter(1, $drugitem->getId());
                $relationships = $query->getResult();

                foreach ($relationships as $relationship)
                {
                    $em->remove($relationship);
                }
                $em->flush();
            }
            return $this->redirect($this->generateUrl('drug_card_route_get'));
        }
    }

}
