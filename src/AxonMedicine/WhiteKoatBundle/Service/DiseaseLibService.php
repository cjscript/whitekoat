<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;

/**
 * The disease lib service.
 *
 * @author cjscript
 */
class DiseaseLibService extends BaseService
{

    public function getTreatments()
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select('a')
                ->from('AxonMedicineWhiteKoatBundle:Libraryvalue', 'a')
                ->innerJoin('a.type', 'b')
                ->where('b.name=:p1')->setParameter('p1', 'Diseases');

        $diseases = $qb->getQuery()->getResult();

        if (!$diseases)
        {
            $diseases = array();
        }

        usort($diseases, array($this, 'cardSortByName'));

        return $diseases;
    }

    public function save($name, $description, $libType)
    {
        $ret = $this->getIfExists($libType, $name);

        if ($ret == null)
        {
            $repository = $this->em->getRepository("AxonMedicineWhiteKoatBundle:Librarytype");
            $value = new Libraryvalue();
            $value->setName($name);
            $value->setDescription($description);
            $value->setType($repository->findOneBy(array('name' => $libType)));
            $value->setVersion('1');
            $value->setCreatedby("cjscript");
            $this->em->persist($value);
            $this->em->flush();
            $ret = $value;
        }
        return $ret;
    }

}
