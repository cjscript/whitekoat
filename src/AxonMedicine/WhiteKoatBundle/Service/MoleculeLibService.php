<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;

/**
 * The class lib service.
 *
 * @author cjscript
 */
class MoleculeLibService extends BaseService
{

    public function getTargets()
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select('a')
                ->from('AxonMedicineWhiteKoatBundle:Libraryvalue', 'a')
                ->innerJoin('a.type', 'b')
                ->where('b.name=:p1')->setParameter('p1', 'Molecules');

        $molecules = $qb->getQuery()->getResult();

        if (!$molecules)
        {
            $molecules = array();
        }

        return $molecules;
    }

    public function save($name, $description)
    {
        $ret = $this->getIfExists('Molecules', $name);

        if ($ret == null)
        {
            $repository = $this->em->getRepository("AxonMedicineWhiteKoatBundle:Librarytype");
            $value = new Libraryvalue();
            $value->setName($name);
            $value->setDescription($description);
            $value->setType($repository->findOneBy(array('name' => 'Molecules')));
            $value->setVersion('1');
            $value->setCreatedby("cjscript");
            $this->em->persist($value);
            $this->em->flush();
            $ret = $value;
        }
        return $ret;
    }

}
