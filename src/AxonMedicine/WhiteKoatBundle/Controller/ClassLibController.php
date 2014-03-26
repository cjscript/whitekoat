<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

//use Doctrine\ORM\AbstractQuery;

/**
 * This is the main controller for home page and all links in menu.
 * 
 * @Route("/clc") 
 */
class ClassLibController extends GenericController
{

    /**
     * @Route("/g", name="clc_route_get" )
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
            $classes = $this->classLibService()->getClasses();
            return $this->render('AxonMedicineWhiteKoatBundle:Default:class.lib.html.twig', array('name' => $loginInfo->getUsername(), 'classes' => $classes));
        }
    }

    /**
     * @Route("/s", name="clc_route_save" )
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

            $classes = $this->classLibService()->save($name, $description);

            $session->getFlashBag()->add('notice', 'Class ' . $name . ' successfully added to library');
            return $this->redirect($this->generateUrl('clc_route_get'));
        }
    }

    /**
     * @Route("/r", name="clc_route_remove" )
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
            return $this->redirect($this->generateUrl('clc_route_get'));
        }
    }

}
