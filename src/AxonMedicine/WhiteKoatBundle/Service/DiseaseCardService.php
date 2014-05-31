<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use Doctrine\ORM\EntityManager;
use AxonMedicine\WhiteKoatBundle\Entity\DiseaseCardView;

/**
 * The disease card service.
 *
 * @author cjscript
 */
class DiseaseCardService extends RelationshipService
{

    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getDiseaseCards()
    {
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\DiseaseCardView a order by a.diseasename');
        $diseasecards = $query->getResult();

        if (!$diseasecards)
        {
            $diseasecards = array();
        }

        usort($diseasecards, array($this, 'cardSortByName'));

        return $diseasecards;
    }

    public function getStudentDiseaseCardBy($name)
    {
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\DiseaseCardView a where a.diseasename=?1 ');
        $query->setParameter(1, $name);
        $result = $query->getResult();
        $diseasecard = null;
        if ($result != null)
        {
            $diseasecard = $result[0];
        }
        return $diseasecard;
    }

    public function getDiseaseCardBy($id)
    {
        $repo = $this->em->getRepository('AxonMedicineWhiteKoatBundle:Relationship');

        $diseaseValue = $this->em->find('AxonMedicineWhiteKoatBundle:Libraryvalue', $id);

        $diseaseRel = $repo->findOneBy(array('leftside' => $diseaseValue));

        return $diseaseRel;
    }

    public function getDiseaseDrugs()
    {
        $drugs = $this->getGenericValue('Drugs');

        return $drugs;
    }

    public function getDrugTargets()
    {
        $molecules = $this->getGenericValue('Molecules');

        return $molecules;
    }

    public function createCardBy($disease, $types, $causes, $symptoms)
    {
        $disease = $this->em->find('AxonMedicineWhiteKoatBundle:Libraryvalue', $disease);

        if ($disease)
        {
            $types = $this->processDirectRelationship($disease, $types, null, true);
            $causes = $this->processDirectRelationship($disease, $causes, null, true);
            $symptoms = $this->processDirectRelationship($disease, $symptoms, null, true);

            // treatments are derived from drug card/ref:treatment
            $treatments = $this->getTreatments($disease);

            if ($treatments)
            {
                echo 'Drug treatments for disease ' . $disease->getName() . EOL;
                foreach ($treatments as $treatment)
                {
                    echo '   ==>' . $treatment->getName() . EOL;
                }
            }
            // create drug view.
            $this->createView($disease, $types, $causes, $symptoms, $treatments);

            $this->em->flush();
        } else
        {
            echo 'doesn\t exist!';
            die;
        }
        return $disease;
    }

    public function getTreatments($disease)
    {
        $query = $this->em->createQuery('select dcv from AxonMedicine\WhiteKoatBundle\Entity\DrugCardView dcv inner join dcv.drugtreatment dt inner join dcv.drugname dn where dt.name=?1 ');

        $query->setParameter(1, $disease->getName());

        $drugCardViews = $query->getResult();

        $drugsThatTreatDisease = array();

        if ($drugCardViews)
        {
            foreach ($drugCardViews as $drugCardView)
            {
                $drugName = $drugCardView->getDrugname();
                array_push($drugsThatTreatDisease, $drugName);
            }
        }
//        usort($drugsThatTreatDisease, array($this, 'cardSortByName'));
        return array_unique($drugsThatTreatDisease, SORT_REGULAR);
    }

    private function createView($disease, $types, $causes, $symptoms, $treatments)
    {
        $diseaseView = new DiseaseCardView();
        $diseaseView->setDiseasename($disease);
        $diseaseView->setDiseasetype($types);
        $diseaseView->setDiseasecause($causes);
        $diseaseView->setDiseasesymptom($symptoms);
        $diseaseView->setDiseasetreatment($treatments);
        $diseaseView->setVersion('1');
        $diseaseView->setCreatedby("cjscript");
        $this->em->persist($diseaseView);
        $this->em->flush();
    }

}
