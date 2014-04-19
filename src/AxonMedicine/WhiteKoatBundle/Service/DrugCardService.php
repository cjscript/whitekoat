<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use Doctrine\ORM\EntityManager;
use AxonMedicine\WhiteKoatBundle\Entity\DrugCardView;
use AxonMedicine\WhiteKoatBundle\Dto\StudentDrugInfoDto;

/**
 * The drug card service.
 *
 * @author cjscript
 */
class DrugCardService extends RelationshipService
{

    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getDrugCards()
    {
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\DrugCardView a order by a.drugname');
        $drugcards = $query->getResult();
        if (!$drugcards)
        {
            $drugcards = array();
        }
        return $drugcards;
    }
	
	public function getDrugCardViews()
	{
		$repo = $this->em->getRepository('AxonMedicineWhiteKoatBundle:DrugCardView');
		$drugCards = $repo->findAll();
		$drugCardViews = array();
		
		foreach ($drugCards as $drugCard)
		{
			$name = $drugCard->getDrugname()->getName();
			$brands = $this->splice($drugCard->getDrugbrand());
			$classes = $this->splice($drugCard->getDrugbrand());
			$targets = $this->splice($drugCard->getDrugtarget());
			$mechanism = $drugCard->getDrugmechanism();
			$treatments = $this->splice($drugCard->getDrugtreatment());
			$sideEffects = $this->splice($drugCard->getDrugsideeffect());
			$contrainds = $this->splice($drugCard->getDrugcontraind());
			
			$drugDTO = new StudentDrugInfoDto($drugCard->getId(), $name, $brands, $classes, $targets, $treatments, $mechanism, $sideEffects, $contrainds);
			array_push($drugCardViews, $drugDTO);
		}
		
		return $drugCardViews;
	}
	
	private function splice($values) 
	{
		$stringArr = array();
		foreach ($values as $value)
		{
			array_push($stringArr, $value->getName());
		}
		return implode(", ", $stringArr);
	}	

    public function getStudentDrugCardBy($name)
    {
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\DrugCardView a where a.drugname=?1 ');
        $query->setParameter(1, $name);
        $result = $query->getResult();
        $drugcard = null;
        if ($result != null)
        {
            $drugcard = $result[0];
        }
        return $drugcard;
    }

    public function getDrugCardBy($id)
    {
        $drugValue = $this->em->find('AxonMedicineWhiteKoatBundle:Libraryvalue', $id);

        $repo = $this->em->getRepository('AxonMedicineWhiteKoatBundle:Relationship');

        $drugRel = $repo->findOneBy(array('leftside' => $drugValue));

        return $drugRel;
    }

    public function getDrugClasses()
    {
        $classes = $this->getGenericValue('Classes');

        return $classes;
    }

    public function getDrugTargets()
    {
        $molecules = $this->getGenericValue('Molecules');

        return $molecules;
    }

    public function getDrugTreatments()
    {
        $diseases = $this->getGenericValue('Diseases');

        return $diseases;
    }

    public function getDrugMechanisms()
    {
        return null;
    }

    private function getGenericValue($libraryType)
    {
        $qb = $em->createQueryBuilder();

        $qb->select('a')
                ->from('AxonMedicineWhiteKoatBundle:Libraryvalue', 'a')
                ->innerJoin('a.type', 'b')
                ->where('b.name=:p1')->setParameter('p1', $libraryType);

        $classes = $qb->getQuery()->getResult();
        if (!$classes)
        {
            $classes = array();
        }
    }

    public function createDrugCardBy($genericDrugId, $brandDrugIds, $drugClassIds, $drugTargetIds, $drugTreatmentIds, $mechanism, $drugSideEffectIds, $drugContraIndIds, $relatesToDrugTarget, $relatesToTreatment, $relatesToSideEffect, $relatesToContraindication)
    {
        $genericDrug = $this->em->find('AxonMedicineWhiteKoatBundle:Libraryvalue', $genericDrugId);
		echo $genericDrugId."\n\n\n";

        if ($genericDrug)
        {
            // direct relationships
            $brands = $this->processDirectRelationship($genericDrug, $brandDrugIds, null, true);
            $classes = $this->processDirectRelationship($genericDrug, $drugClassIds, null, true);
            $targets = $this->processDirectRelationship($genericDrug, $drugTargetIds, $relatesToDrugTarget, true);
            $treatments = $this->processDirectRelationship($genericDrug, $drugTreatmentIds, $relatesToTreatment, true);
            $sideEffects = $this->processDirectRelationship($genericDrug, $drugSideEffectIds, $relatesToSideEffect, true);
            $contraInds = $this->processDirectRelationship($genericDrug, $drugContraIndIds, $relatesToContraindication, true);

            // create drug view.
            $this->createDrugView($genericDrug, $brands, $classes, $targets, $treatments, $mechanism, $sideEffects, $contraInds);

            $this->em->flush();
        }
        return $genericDrug;
    }

    private function createDrugView($generic, $brand, $class, $target, $treatment, $mechanism, $sideEffect, $contraInd)
    {
        $drugView = new DrugCardView();
        $drugView->setDrugname($generic);
        $drugView->setDrugbrand($brand);
        $drugView->setDrugclass($class);
        $drugView->setDrugtarget($target);
        $drugView->setDrugtreatment($treatment);
        $drugView->setDrugmechanism($mechanism);
        $drugView->setDrugsideeffect($sideEffect);
        $drugView->setDrugcontraind($contraInd);
        $drugView->setVersion('1');
        $drugView->setCreatedby("cjscript");
        $this->em->persist($drugView);
    }

}
