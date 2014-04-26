<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;
use AxonMedicine\WhiteKoatBundle\Entity\DrugsActions;

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
        $ret = $this->getIfExists('Actions', $name);

        if ($ret == null)
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
            $ret = $value;
        }

        return $ret;
    }

    public function saveDrugActionReceiver($drug, $action, $receiver)
    {
        $value = new DrugsActions();
        $value->setDrug($drug);
        $value->setAction($action);
        $value->setReceiver($receiver);
        $value->setVersion('1');
        $value->setCreatedby("cjscript");
        $this->em->persist($value);
        $this->em->flush();
        $ret = $value;
        return $ret;
    }

    public function getDrugActionBy($drug, $action, $receiver)
    {
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\DrugsActions a where a.drug=?1 and a.action=?2 and a.receiver=?3');
        $query->setParameter(1, $drug);
        $query->setParameter(2, $action);
        $query->setParameter(3, $receiver);
        $ret = $query->getResult();

        $drugAction = null;

        if ($ret != null)
        {
            $drugAction = $ret[0];
        }

        return $drugAction;
    }

    public function getDrugActions()
    {
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\DrugsActions a inner join a.drug b inner join a.action c inner join a.receiver d order by b.name, c.name, d.name');
        $ret = $query->getResult();
        if (!$ret)
        {
            $ret = array();
        }
        return $ret;
    }

    public function createDrugActionReceiver($drug, $action, $receiver)
    {
        $drugAction = $this->getDrugActionBy($drug, $action, $receiver);

        if ($drugAction == null)
        {
            $drugAction = $this->saveDrugActionReceiver($drug, $action, $receiver);
        }
        return $drugAction;
    }

}
