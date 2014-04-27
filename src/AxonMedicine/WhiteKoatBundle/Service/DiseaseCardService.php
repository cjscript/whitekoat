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
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\DiseaseCardView a inner join a.diseasename b order by n.name ');
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
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\DiseaseCardView a inner join a.diseasename b where a.diseasename=?1 order by n.name ');
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

            // create drug view.
            $this->createView($disease, $types, $causes, $symptoms);

            $this->em->flush();
        } else
        {
            echo 'doesn\t exist!';
            die;
        }
        return $disease;
    }

    private function createView($disease, $types, $causes, $symptoms)
    {
        $diseaseView = new DiseaseCardView();
        $diseaseView->setDiseasename($disease);
        $diseaseView->setDiseasetype($types);
        $diseaseView->setDiseasecause($causes);
        $diseaseView->setDiseasesymptom($symptoms);
//        $diseaseView->setDiseasetreatment($treatments);
        $diseaseView->setVersion('1');
        $diseaseView->setCreatedby("cjscript");
        $this->em->persist($diseaseView);
    }

}
