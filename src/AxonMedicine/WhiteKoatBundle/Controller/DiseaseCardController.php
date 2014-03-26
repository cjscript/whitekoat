<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

//use Doctrine\ORM\AbstractQuery;

/**
 * This is the main controller for home page and all links in menu.
 * 
 * @Route("/discard") 
 */
class DiseaseCardController extends GenericController
{

    /**
     * @Route("/diseasepup", name="disease_popup_route_get" )
     * @param request the request
     * @return type
     */
    public function showGenericDiseasePopup(Request $request)
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

            $diseases = $this->diseaseLibService()->getTreatments();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:disease.modal.html.twig', array('name' => $loginInfo->getUsername(), 'diseases' => $diseases));
        }
    }

    /**
     * @Route("/g", name="disease_card_route_get" )
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

            $diseasecards = $this->getDiseaseCards();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:disease.card.html.twig', array('name' => $loginInfo->getUsername(), 'cardname' => 'Disease', 'diseasecards' => $diseasecards));
        }
    }

    /**
     * @Route("/s", name="disease_card_route_save" )
     * @Method({"POST"})
     * @param request the request
     * @return type
     */
    public function saveAction(Request $request)
    {
        $session = $this->getRequest()->getSession();

        // always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            
        }
    }

    /**
     * @Route("/r", name="disease_route_remove" )
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
                
            }
            return $this->redirect($this->generateUrl('disease_card_route_get'));
        }
    }

    public function getDiseaseCards()
    {
        $diseasecards = $this->diseaseCardService()->getDiseaseCards();
        if (!$diseasecards)
        {
            $diseasecards = array();
        }
        return $diseasecards;
    }

}
