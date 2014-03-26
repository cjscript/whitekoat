<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;

/**
 * The class lib service.
 *
 * @author cjscript
 */
class ClassLibService extends BaseService
{

    public function getClasses()
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select('a')
                ->from('AxonMedicineWhiteKoatBundle:Libraryvalue', 'a')
                ->innerJoin('a.type', 'b')
                ->where('b.name=:p1')->setParameter('p1', 'Classes');

        $classes = $qb->getQuery()->getResult();

        if (!$classes)
        {
            $classes = array();
        }

        return $classes;
    }

    public function save($name, $description)
    {
        $ret = $this->getIfExists('Classes', $name);

        if ($ret == null)
        {
            $repository = $this->em->getRepository("AxonMedicineWhiteKoatBundle:Librarytype");
            $value = new Libraryvalue();
            $value->setName($name);
            $value->setDescription($description);
            $value->setType($repository->findOneBy(array('name' => 'Classes')));
            $value->setVersion('1');
            $value->setCreatedby("cjscript");
            $this->em->persist($value);
            $this->em->flush();
            $ret = $value;
        }

        return $ret;
    }

}
