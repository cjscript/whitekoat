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

    public function createCardBy($diseaseId, $typeIds, $causeIds, $symptomIds, $treatmentIds)
    {
        $disease = $this->em->find('AxonMedicineWhiteKoatBundle:Libraryvalue', $diseaseId);

        if ($disease)
        {
            $types = $this->processDirectRelationship($disease, $typeIds, null, true);
            $causes = $this->processDirectRelationship($disease, $causeIds, null, true);
            $symptoms = $this->processDirectRelationship($disease, $symptomIds, null, true);
            $treatments = $this->processDirectRelationship($disease, $treatmentIds, null, false);

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
    }

}
