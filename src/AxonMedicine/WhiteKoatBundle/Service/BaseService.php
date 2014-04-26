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

    public function getLibBy($id)
    {
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue a where a.id=?1');
        $query->setParameter(1, $id);
        $ret = $query->getSingleResult();
        return $ret;
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

    function cardSort($a, $b)
    {
        return strcasecmp($a->getSortValue(), $b->getSortValue());
    }

    function cardSortByName($a, $b)
    {
        return strcasecmp($a->getName(), $b->getName());
    }

}
