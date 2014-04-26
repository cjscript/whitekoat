<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use AxonMedicine\WhiteKoatBundle\Entity\Alias;

/**
 * The alias lib service.
 *
 * @author cjscript
 */
class AliasLibService extends BaseService
{

    public function getAliases()
    {
//        $qb = $this->em->createQueryBuilder();

        $query = $this->em->createQuery('select a.id, a.original, GROUP_CONCAT(a.alias) as alias FROM AxonMedicine\WhiteKoatBundle\Entity\Alias a group by a.original order by a.original');

        $aliases = $query->getResult();

        if (!$aliases)
        {
            $aliases = array();
        }

        return $aliases;
    }

    public function create($originalName, $aliasName)
    {
        // create alias.
        $alias = new Alias();
        $alias->setOriginal($originalName);
        $alias->setAlias($aliasName);
        $alias->setVersion('1');
        $alias->setCreatedby("cjscript");
        $this->em->persist($alias);
        $this->em->flush();
        $ret = $alias;
        return $ret;
    }

}
