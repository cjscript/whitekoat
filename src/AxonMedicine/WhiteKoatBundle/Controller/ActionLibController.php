<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;

/**
 * This is the main controller for home page and all links in menu.
 * 
 * @Route("/actc") 
 */
class ActionLibController extends GenericController
{

    /**
     * @Route("/g", name="actc_route_get" )
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

            $actions = $this->actionLibService()->getActions();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:action.lib.html.twig', array('name' => $loginInfo->getUsername(), 'actions' => $actions));
        }
    }

    /**
     * @Route("/s", name="actc_route_save" )
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
            $name = $request->get('itemname');
            $description = $request->get('itemdescription');

            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository("AxonMedicineWhiteKoatBundle:Librarytype");

            $value = new Libraryvalue();
            $value->setName($name);
            $value->setDescription($description);
            $value->setType($repository->findOneBy(array('name' => 'Actions')));
            $value->setVersion('1');
            $value->setCreatedby("cjscript");
            $em->persist($value);
            $em->flush();
            $session->getFlashBag()->add('notice', 'Action ' . $name . ' successfully added to library');
            return $this->redirect($this->generateUrl('actc_route_get'));
        }
    }

    /**
     * @Route("/r", name="actc_route_remove" )
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
                $value = $em->getRepository("AxonMedicineWhiteKoatBundle:Libraryvalue")->find($id);
                $em->remove($value);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('actc_route_get'));
        }
    }

}
