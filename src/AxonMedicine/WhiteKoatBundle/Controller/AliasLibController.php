<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;

/**
 * This is the main controller for home page and all links in menu.
 * 
 * @Route("/alic") 
 */
class AliasLibController extends GenericController
{

    /**
     * @Route("/g", name="alic_route_get" )
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

            $aliases = $this->aliasLibService()->getAliases();

            return $this->render('AxonMedicineWhiteKoatBundle:Default:alias.lib.html.twig', array('name' => $loginInfo->getUsername(), 'aliases' => $aliases));
        }
    }

    /**
     * @Route("/s", name="alic_route_save" )
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
            $aliasforname = $request->get('aliasforname');

            $this->aliasLibService()->create($name, $description, $aliasforname, 'aliases');

            $session->getFlashBag()->add('notice', 'Alias ' . $name . ' successfully added to library');
            return $this->redirect($this->generateUrl('alic_route_get'));
        }
    }

    /**
     * @Route("/r", name="alic_route_remove" )
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
            return $this->redirect($this->generateUrl('alic_route_get'));
        }
    }

}
