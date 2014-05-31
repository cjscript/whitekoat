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
class MicroCardService extends RelationshipService
{

    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createCardBy($species)
    {
        $microView = new MicroCardView();
        $microView->setSpecies($species);
        $microView->setVersion('1');
        $microView->setCreatedby("cjscript");
        $this->em->persist($microView);
        $this->em->flush();
        $this->em->clear();
        
    }

}
