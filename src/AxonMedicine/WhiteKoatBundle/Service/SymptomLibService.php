<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;

/**
 * The symptom lib service.
 *
 * @author cjscript
 */
class SymptomLibService extends BaseService
{

    public function getSymptoms()
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select('a')
                ->from('AxonMedicineWhiteKoatBundle:Libraryvalue', 'a')
                ->innerJoin('a.type', 'b')
                ->where('b.name=:p1')->setParameter('p1', 'Symptoms');

        $symptoms = $qb->getQuery()->getResult();
        if (!$symptoms)
        {
            $symptoms = array();
        }
        return $symptoms;
    }

    public function save($name, $description)
    {
        $ret = $this->getIfExists('Symptoms', $name);

        if ($ret == null)
        {
            $repository = $this->em->getRepository("AxonMedicineWhiteKoatBundle:Librarytype");
            $value = new Libraryvalue();
            $value->setName($name);
            $value->setDescription($description);
            $value->setType($repository->findOneBy(array('name' => 'Symptoms')));
            $value->setVersion('1');
            $value->setCreatedby("cjscript");
            $this->em->persist($value);
            $this->em->flush();
            $ret = $value;
        }
        return $ret;
    }

}
