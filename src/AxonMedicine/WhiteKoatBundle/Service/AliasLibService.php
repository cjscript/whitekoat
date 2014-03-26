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

//    public function save($name, $description)
//    {
//        $item = $this->getIfExists('Aliases', $name);
//
//        $ret = null;
//
//        if ($item == null)
//        {
//            $repository = $this->em->getRepository("AxonMedicineWhiteKoatBundle:Librarytype");
//            $value = new Libraryvalue();
//            $value->setName($name);
//            $value->setDescription($description);
//            $value->setType($repository->findOneBy(array('name' => 'Aliases')));
//            $value->setVersion('1');
//            $value->setCreatedby("cjscript");
//            $this->em->persist($value);
//            $this->em->flush();
//            $ret = $value;
//        } else
//        {
//            $ret = $item[0];
//        }
//        return $ret;
//    }
}
