<?php

namespace AxonMedicine\WhiteKoatBundle\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AxonMedicine\WhiteKoatBundle\Dto\StudentDrugInfoDto;
use AxonMedicine\WhiteKoatBundle\Dto\StudentDiseaseInfoDto;
use AxonMedicine\WhiteKoatBundle\Entity\DrugCardView;
use AxonMedicine\WhiteKoatBundle\Entity\DiseaseCardView;
use AxonMedicine\WhiteKoatBundle\Entity\ResultsCardView;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\Query;

/**
 * This is the main controller for student landing page and all links in menu.
 * 
 * @Route("/") 
 */
class HomepageController extends GenericController
{

    /**
     * @Route("/results", name="results_route_get" )
     * @param request the request
     * @return type
     */
    public function renderResultsPage(Request $request)
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
            //this will allow saving an URL to load with cards in place on page load
            $exactMatch =$request->query->get('exmat');
            $termParam = $request->query->get('term');
            $drugCards = array();
            $diseaseCards = array();
            $resultsCards = array();
            
            if ($termParam)
            {                
                foreach ($termParam as $p)
                {
                    $cards = $this->doDrugDiseaseQuery($p, $exactMatch);
                    foreach ($cards as $card)
                    {
                        if ($card->getCardType() === "Drug")
                        {
                            $this->setLibValHasImages($card);
                            array_push($drugCards, $card);
                        } else if ($card->getCardType() === "Disease")
                        {
                            $this->setLibValHasImages($card);
                            array_push($diseaseCards, $card);
                        } else if ($card->getCardType() === "Symptom")
                        {
                            $this->setLibValHasImages($card);
                            $value = $this->doLibValQueryById($card->getId());
                            $card->setLibValue($value);
                            array_push($resultsCards, $card);
                        }
                    }
                }
            }

            //TODO: results card on first page load?
            return $this->render('AxonMedicineWhiteKoatBundle:Default:homepage.main.html.twig', array('name' => $loginInfo->getUsername(), 'drugCards' => $drugCards, 'diseaseCards' => $diseaseCards, 'resultsCards' => $resultsCards));
        }
    }

    /**
     * @Route("/home/autocomplete/",defaults={"_format"="json"}, name="homepage_autocomplete" )
     * @param request the request
     * @return type
     */
    public function getAutocompleteResults(Request $request)
    {
        
        $session = $this->getRequest()->getSession();

        $searchTerm = $request->query->get('term');

// always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $autocompleteCardValues = $this->doAutocompleteSearch($searchTerm);
            $autocompleteCardValues = $this->formatCardsAsStringArray($autocompleteCardValues);
            $response = new JsonResponse();
            $response->setData($autocompleteCardValues);
            return $response;
        }
    }

    /**
     * @Route("/home", name="homepage_route_get" )
     * @param request the request
     * @return type
     */
    public function renderStudentHome(Request $request)
    {
        $session = $this->getRequest()->getSession();

        $searchTerm = $request->query->get('term');

// always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $loginInfo = $session->get('logininfo');
            return $this->render('AxonMedicineWhiteKoatBundle:Default:studenthome.html.twig', array('name' => $loginInfo->getUsername()));
        }
    }

    /**
     * @Route("/home/cardByName/",defaults={"_format"="json"}, name="homepage_namedCard" )
     * @param request the request
     * @return type
     */
    public function addCardByName(Request $request)
    {
        $session = $this->getRequest()->getSession();

// always check session.
        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $param = $request->query->get('term');
            if ($param)
            {
                $libVal = $this->doLibValQueryByName($param);
                //$drugCard = $this->findDrugCardByName($libVal);
                $drugCard = $this->doDrugDiseaseQuery($param);
                if ($drugCard)
                {
                    $drugCard = $drugCard[0];
                    $this->setLibValHasImages($drugCard);
                    $card = $drugCard;
                }
                //search drug cards
                //if not a drug card:
                //   search disease cards
                //if not a diseaese card:
                //   search results cards?
            }
            $response = new Jsonresponse();
            $response->setData(array('id' => $card->getId(), 'type' => $card->getCardType()));
            return $response;
            //return $this->render('AxonMedicineWhiteKoatBundle:Default:drugCard.html.twig', array('card' => $drugCard));
        }
    }

    /**
     * @Route("/home/drugCard/",defaults={"_format"="json"}, name="homepage_drugCard" )
     * @param request the request
     * @return type
     */
    public function renderDrugCard(Request $request)
    {
        $session = $this->getRequest()->getSession();
        $id = $request->query->get('id');

        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $card = $this->getDrugCardById($id);
            $this->setLibValHasImages($card);
            //$cardStrings = $this->formatCardsAsStringArray($card);
            //$cardStrings = $cardStrings[0];
            return $this->render('AxonMedicineWhiteKoatBundle:Default:drugCard.html.twig', array('card' => $card));
        }
    }

    /**
     * @Route("/home/diseaseCard/",defaults={"_format"="json"}, name="homepage_diseaseCard" )
     * @param request the request
     * @return type
     */
    public function renderDiseaseCard(Request $request)
    {
        $session = $this->getRequest()->getSession();
        $id = $request->query->get('id');

        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $card = $this->getDiseaseCardById($id);
            $this->setLibValHasImages($card);
            return $this->render('AxonMedicineWhiteKoatBundle:Default:diseaseCard.html.twig', array('card' => $card));
            //$cardStrings = $this->formatCardsAsStringArray($card);
            //$cardStrings = $cardStrings[0];
            //return $this->render('AxonMedicineWhiteKoatBundle:Default:diseaseCard.html.twig', $cardStrings);
        }
    }

    /**
     * @Route("/home/resultsCard/",defaults={"_format"="json"}, name="homepage_resultsCard" )
     * @param request the request
     * @return type
     */
    public function renderResultsCard(Request $request)
    {
        $session = $this->getRequest()->getSession();
        $id = $request->query->get('id');

        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $value = $this->doLibValQueryById($id);

            //if the libvalue is a drug that has a card, render a drug card
            $card = $this->findDrugCardByName($value);
            if ($card)
            {
                return $this->render('AxonMedicineWhiteKoatBundle:Default:drugCard.html.twig', array('card' => $card));
            }
            //if the libvalue is a disease that has a card, render a disease card
            $card = $this->findDiseaseCardByName($value);
            if ($card)
            {
                return $this->render('AxonMedicineWhiteKoatBundle:Default:diseaseCard.html.twig', array('card' => $card));
            }

            $relatedDrugCards = $this->searchAllDrugCardFieldsByLibVal($value);
            $relatedDiseaseCards = $this->searchAllDiseaseCardFieldsByLibVal($value);
            
            return $this->render('AxonMedicineWhiteKoatBundle:Default:resultsCard.html.twig', array('libValue' => $value, 'diseases' => $relatedDiseaseCards['diseaseCards'], 'drugs' => $relatedDrugCards['drugCards']));
        }
    }

    /**
     * @Route("/home/libValueCard/",defaults={"_format"="json"}, name="homepage_valueCard" )
     * @param request the request
     * @return type
     */
    public function renderLibValueCard(Request $request)
    {
        $session = $this->getRequest()->getSession();
        $id = $request->query->get('id');

        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $value = $this->doLibValQueryById($id);
            //$images = $this->getImagesLinkedToLibValue($value);
            //find image(s) associated with 

            return $this->render('AxonMedicineWhiteKoatBundle:Default:libValBubble.html.twig', array('card' => $value)); //, 'images' => $images));
        }
    }

    /**
     * @Route("/home/imageCard/",defaults={"_format"="json"}, name="homepage_imageCard" )
     * @param request the request
     * @return type
     */
    public function renderImageCard(Request $request)
    {
        $session = $this->getRequest()->getSession();
        $id = $request->query->get('id');

        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $value = $this->doLibValQueryById($id);
            $images = $this->getImagesLinkedToLibValue($value);

            return $this->render('AxonMedicineWhiteKoatBundle:Default:imageCard.html.twig', array('libValue' => $value, 'images' => $images));
            ;
        }
    }

    /**
     * @Route("/home/libValueDescription/",defaults={"_format"="json"}, name="homepage_libValDesc" )
     * @param request the request
     * @return type
     */
    public function getLibValueDescriptionById(Request $request)
    {
        $session = $this->getRequest()->getSession();
        $id = $request->query->get('id');

        if (!$session->has('logininfo'))
        {
            $session->clear();
            return $this->redirect($this->generateUrl('login_route'));
        } else
        {
            $value = $this->doLibValQueryById($id);
            $response = new JsonResponse();
            $response->setData(array('description', $value->getDescription()));
            return $response;
        }
    }

    private function getImagesLinkedToLibValue($libVal)
    {

        $repo = $this->getDoctrine()->getRepository('AxonMedicineWhiteKoatBundle:Imagelibraryvalue');
        $images = $repo->findBy(array('libraryref' => $libVal));
        if (!$images)
        {
            $images = array();
        }
        return $images;
    }

    private function doAutocompleteSearch($searchTerm)
    {
        //$em = $this->getDoctrine()->getManager();

        $cards = $this->doDrugDiseaseQuery($searchTerm);
        //$diseaseQuery = $this->doDiseaseQuery($em, $searchTerm);
        //$result = array();
        //$result = array_merge($result, $drugQuery, $diseaseQuery);
        return $cards;
        //return $result;
    }

    private function doDrugDiseaseQuery($searchTerm, $exactMatch = false)
    {
        $em = $this->getDoctrine()->getManager();
        $drugType = $this->typeQuery('Drugs');
        $diseaseType = $this->typeQuery('Diseases');
        $symptomType = $this->typeQuery('Symptoms');
        
        if (!$exactMatch)
        {
            $searchTerm = '%' . $searchTerm . '%';
        }

        $drugDiseaseSymptomQuery = $em->createQuery(
                        'SELECT distinct value
	        FROM AxonMedicineWhiteKoatBundle:LibraryValue value
			WHERE value.type IN(:drugType, :diseaseType, :symptomType) AND value.name LIKE :searchTerm
			ORDER BY value.name ASC'
                )->setParameter('drugType', $drugType->getId())
                ->setParameter('diseaseType', $diseaseType->getId())
                ->setParameter('symptomType', $symptomType->getId())
                ->setParameter('searchTerm', $searchTerm);
        $result = $drugDiseaseSymptomQuery->getResult();
// TODO change from cards to dtos
        $cards = array();
        $drugRepo = $this->getDoctrine()->getRepository('AxonMedicineWhiteKoatBundle:DrugCardView');
        $diseaseRepo = $this->getDoctrine()->getRepository('AxonMedicineWhiteKoatBundle:DiseaseCardView');
        foreach ($result as $d)
        {
            $card = null;

            if ($d->getType() == $drugType)
            {
                $card = $drugRepo->findOneBy(array('drugname' => $d->getId()));
            } else if ($d->getType() == $diseaseType)
            {
                $card = $diseaseRepo->findOneBy(array('diseasename' => $d->getId()));
            } else if ($d->getType() == $symptomType)
            {
                // get the related drug/disease cards.
                $relatedDrugCards = $this->searchAllDrugCardFieldsByLibVal($d);
                $relatedDiseaseCards = $this->searchAllDiseaseCardFieldsByLibVal($d);
                
                // create results card view that stores data for the view.
                $card = new ResultsCardView();
                $card->setId($d->getId());
                $card->setName($d->getName());
                $card->setSearchTerm($searchTerm);
                $card->setRelatedDrugCards($relatedDrugCards['drugCards']);
                $card->setRelatedDiseases($relatedDiseaseCards['diseaseCards']);
            }
            if ($card)
            {
                array_push($cards, $card);
            }
        }
        return $cards;
    }

    private function findDrugCardByName($libVal)
    {
        $repo = $this->getDoctrine()->getRepository('AxonMedicineWhiteKoatBundle:DrugCardView');
        /* $query = $repo->createQueryBuilder('card')
          ->distinct('card.id')
          ->where('card.drugname = :name')
          ->setParameter('name', $libVal)
          ->getQuery(); */
        //$card = $query->getResult();
        $card = $repo->findOneBy(array('drugname' => $libVal));
        return $card;
    }

    private function findDiseaseCardByName($libVal)
    {
        $repo = $this->getDoctrine()->getRepository('AxonMedicineWhiteKoatBundle:DiseaseCardView');
        $card = $repo->findOneBy(array('diseasename' => $libVal));
        return $card;
    }

    private function doDiseaseQuery($em, $searchTerm)
    {
        $diseaseQuery = $em->createQuery(
                        'SELECT card
	        FROM AxonMedicineWhiteKoatBundle:DiseaseCardView card
			WHERE card.diseasename LIKE :searchTerm
			ORDER BY card.diseasename ASC'
                )->setParameter('searchTerm', '%' . $searchTerm . '%');
        $diseaseResult = $diseaseQuery->getResult();
        return $diseaseResult;
    }

    private function doLibValQueryById($id)
    {
        return $this->doLibValQueryBy('id', $id);
    }

    private function doLibValQueryByName($name)
    {
        return $this->doLibValQueryBy('name', $name);
    }

    private function doLibValQueryBy($libValField, $value)
    {
        $repo = $this->getDoctrine()->getRepository('AxonMedicineWhiteKoatBundle:LibraryValue');
        $libVal = $repo->findOneBy(array($libValField => $value));
        return $libVal;
    }

    private function searchAllDrugCardFieldsByLibVal($val)
    {
        $repo = $this->getDoctrine()->getRepository('AxonMedicineWhiteKoatBundle:DrugCardView');
        $query = $repo->createQueryBuilder('card')
                ->where(':val MEMBER OF card.drugbrand')
                ->orWhere(':val MEMBER OF card.drugclass')
                ->orWhere(':val MEMBER OF card.drugtarget')
                ->orWhere(':val MEMBER OF card.drugtreatment')
                ->orWhere(':val MEMBER OF card.drugsideeffect')
                ->orWhere(':val MEMBER OF card.drugcontraind')
                ->setParameter('val', $val)
                ->getQuery();
        $drugCards = $query->getResult();

        $diseaseCardResult = array();
        return array('drugCards' => $drugCards, 'diseaseCards' => $diseaseCardResult);
    }

    private function searchAllDiseaseCardFieldsByLibVal($val)
    {
        $repo = $this->getDoctrine()->getRepository('AxonMedicineWhiteKoatBundle:DiseaseCardView');
        $query = $repo->createQueryBuilder('card')
                ->where(':val MEMBER OF card.diseasetype')
                ->orWhere(':val MEMBER OF card.diseasecause')
                ->orWhere(':val MEMBER OF card.diseasesymptom')
                ->orWhere(':val MEMBER OF card.diseasetreatment')
                ->setParameter('val', $val)
                ->getQuery();
        $diseaseCardResult = $query->getResult();

        $drugCards = array();
        return array('drugCards' => $drugCards, 'diseaseCards' => $diseaseCardResult);
    }

    private function typeQuery($typeTerm)
    {
        $repo = $this->getDoctrine()->getRepository('AxonMedicineWhiteKoatBundle:librarytype');
        $type = $repo->findOneBy(array('name' => $typeTerm));
        return $type;
    }

    private function formatCardsAsStringArray($cards)
    {
        $array = array();

        //jquery ui autocomplete requires a 'label' field in json
        //also pass an id to retrieve the entire card
        //also also pass card type (drug or disease)
        foreach ($cards as $card)
        {
            $array[] = array('label' => $card->getName(),
                'cardType' => $card->getCardType(),
                'cardId' => $card->getId());
        }

        usort($array, function($a, $b) {
            return (strcmp($a['label'], ($b['label'])));
        });

        return $array;
    }

    private function getDrugCardById($id)
    {
        $repo = $this->getDoctrine()->getRepository('AxonMedicineWhiteKoatBundle:DrugCardView');
        $card = $repo->findOneById($id);
        return $card;
    }

    private function getDiseaseCardById($id)
    {
        $repo = $this->getDoctrine()->getRepository('AxonMedicineWhiteKoatBundle:DiseaseCardView');
        $card = $repo->findOneById($id);
        return $card;
    }

    private function getDiseaseCard($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
                        'SELECT card
				FROM AxonMedicineWhiteKoatBundle:DiseaseCardView card
				WHERE card.id = :id')
                ->setParameter('id', $id);
        $result = $query->getResult();
        return $result;
    }

    private function setLibValHasImages($card)
    {
        if ($card == null)
        {
            return;
        }
        //echo $card;
        if ($card->getCardType() == "Drug")
        {
            foreach ($card->getDrugbrand() as $brand)
            {
                if ($this->getImagesLinkedToLibValue($brand))
                {
                    $brand->setImages(true);
                } else
                {
                    $brand->setImages(false);
                }
            }

            foreach ($card->getDrugclass() as $class)
            {
                if ($this->getImagesLinkedToLibValue($class))
                {
                    $class->setImages(true);
                } else
                {
                    $class->setImages(false);
                }
            }

            foreach ($card->getDrugtarget() as $target)
            {
                if ($this->getImagesLinkedToLibValue($target))
                {
                    $target->setImages(true);
                } else
                {
                    $target->setImages(false);
                }
            }

            foreach ($card->getDrugtreatment() as $treatment)
            {
                if ($this->getImagesLinkedToLibValue($treatment))
                {
                    $treatment->setImages(true);
                } else
                {
                    $treatment->setImages(false);
                }
            }

            foreach ($card->getDrugsideeffect() as $sideeffect)
            {
                if ($this->getImagesLinkedToLibValue($sideeffect))
                {
                    $sideeffect->setImages(true);
                } else
                {
                    $sideeffect->setImages(false);
                }
            }

            foreach ($card->getDrugcontraind() as $contraind)
            {
                if ($this->getImagesLinkedToLibValue($contraind))
                {
                    $contraind->setImages(true);
                } else
                {
                    $contraind->setImages(false);
                }
            }
        } else if ($card->getCardType() == "Disease")
        {
            
        }
    }

}
