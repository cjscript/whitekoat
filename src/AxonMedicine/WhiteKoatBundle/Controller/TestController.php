<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AxonMedicine\WhiteKoatBundle\Entity\CardSearch;

/**
 *  Test
 *  @Route("/test") 
 */
class TestController extends GenericController
{
	/**
	 *  @Route("/")
	 */
    public function indexAction(Request $request)
    {
		$cardSearch = new CardSearch();
		$cardSearch->setSearchTerm("Text");
		
		$form = $this->createFormBuilder($cardSearch)
			->add("searchTerm", "text")
			->getForm();
		
        return $this->render('AxonMedicineWhiteKoatBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
		
		
    }
}

?>