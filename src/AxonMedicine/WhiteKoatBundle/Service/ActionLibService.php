<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;

/**
 * The action lib service.
 *
 * @author cjscript
 */
class ActionLibService extends BaseService
{

    public function getActions()
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select('a')
                ->from('AxonMedicineWhiteKoatBundle:Libraryvalue', 'a')
                ->innerJoin('a.type', 'b')
                ->where('b.name=:p1')->setParameter('p1', 'Actions');

        $actions = $qb->getQuery()->getResult();

        if (!$actions)
        {
            $actions = array();
        }

        return $actions;
    }

    public function save($name, $description)
    {
        $item = $this->getIfExists('Actions', $name);

        $retId = null;

        if ($item == null)
        {
            $repository = $this->em->getRepository("AxonMedicineWhiteKoatBundle:Librarytype");
            $value = new Libraryvalue();
            $value->setName($name);
            $value->setDescription($description);
            $value->setType($repository->findOneBy(array('name' => 'Actions')));
            $value->setVersion('1');
            $value->setCreatedby("cjscript");
            $this->em->persist($value);
            $this->em->flush();
            $retId = $value->getId();
        }

        return $retId;
    }

}
