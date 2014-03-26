<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use Doctrine\ORM\EntityManager;
use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;

/**
 * The base service.
 *
 * @author cjscript
 */
class BaseService
{

    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Library value is the base table.  Get all library values.
     */
    public function getLibs()
    {
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue a order by a.name');
        $result = $query->getResult();
        return $result;
    }

    public function getIfExists($typeName, $valueName)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('a')
                ->from('AxonMedicineWhiteKoatBundle:Libraryvalue', 'a')
                ->innerJoin('a.type', 'b')
                ->where('b.name=:p1')->setParameter('p1', $typeName)
                ->andWhere('a.name=:p2')->setParameter('p2', $valueName);

        $ret = $qb->getQuery()->getResult();

        if ($ret != null)
        {
            // get single element only.
            $ret = $ret[0];
        }
        return $ret;
    }

}
