<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AxonMedicineWhiteKoatBundle:Default:index.html.twig', array('name' => $name));
    }
}
