<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;

//use Doctrine\ORM\AbstractQuery;

/**
 * This is the main controller for home page and all links in menu.
 * 
 * @Route("/mlc") 
 */
class MoleculeLibController extends GenericController
{

    /**
     * @Route("/g", name="mlc_route_get" )
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
            $em = $this->getDoctrine()->getManager();
            $qb = $em->createQueryBuilder();

            $qb->select('a')
                    ->from('AxonMedicineWhiteKoatBundle:Libraryvalue', 'a')
                    ->innerJoin('a.type', 'b')
                    ->where('b.name=:p1')->setParameter('p1', 'Molecules');

            $molecules = $qb->getQuery()->getResult();
            if (!$molecules)
            {
                $classes = array();
            }

            return $this->render('AxonMedicineWhiteKoatBundle:Default:molecule.lib.html.twig', array('name' => $loginInfo->getUsername(), 'molecules' => $molecules));
        }
    }

    /**
     * @Route("/s", name="mlc_route_save" )
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
            $value->setType($repository->findOneBy(array('name' => 'Molecules')));
            $value->setVersion('1');
            $value->setCreatedby("cjscript");
            $this->getDoctrine()->getManager()->persist($value);
            $em->flush();
            $session->getFlashBag()->add('notice', 'Molecule ' . $name . ' successfully added to library');
            return $this->redirect($this->generateUrl('mlc_route_get'));
        }
    }

    /**
     * @Route("/r", name="mlc_route_remove" )
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
            return $this->redirect($this->generateUrl('mlc_route_get'));
        }
    }

}
