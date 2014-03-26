<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * This is the main controller for home page and all links in menu.
 * 
 * @Route("/dlc") 
 */
class DrugLibController extends GenericController
{

    /**
     * @Route("/g", name="dlc_route_get" )
     * @param request the request
     * @return type
     */
    public function retrieveAction(Request $request)
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

            $drugs = $this->getDrugs();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:drug.lib.html.twig', array('name' => $loginInfo->getUsername(), 'drugs' => $drugs));
        }
    }

    public function getDrugs()
    {
        $drugs = $this->drugLibService()->getDrugs(null);

        if (!$drugs)
        {
            $drugs = array();
        }
        return $drugs;
    }

    /**
     * @Route("/s", name="dlc_route_save" )
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
            $name = $request->get('itemname');
            $description = $request->get('itemdescription');
            $generic = $request->get('isgeneric') == "on" ? true : false;

            $this->save($name, $description, $generic);

            $session->getFlashBag()->add('notice', 'Drug ' . $name . ' successfully added to library');

            return $this->redirect($this->generateUrl('dlc_route_get'));
        }
    }

    public function save($name, $description, $generic)
    {
        $this->drugLibService()->save($name, $description, $generic);
    }

    /**
     * @Route("/r", name="dlc_route_remove" )
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
                $this->drugLibService()->remove($id);
            }
            return $this->redirect($this->generateUrl('dlc_route_get'));
        }
    }

    /*     * public function getTotalTypes()
      {
      $em = $this->getDoctrine()->getManager();
      $countQuery = $em->createQueryBuilder()
      ->select('Count(a)')
      ->from('AxonMedicineWhiteKoat:Librarytype', 'a');
      $finalQuery = $countQuery->getQuery();
      $total = $finalQuery->getSingleScalarResult();
      return $total;
      }
     */
}
