<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use AxonMedicine\WhiteKoatBundle\Entity\Relationship;

/**
 * The relationship service.
 *
 * @author cjscript
 */
class RelationshipService extends BaseService
{

    protected function processDirectRelationship($left, $items, $relatesTo, $create)
    {
        $arr = array();

        if (!empty($items))
        {
            foreach ($items as $item)
            {
                $ret = $this->em->find('AxonMedicineWhiteKoatBundle:Libraryvalue', $item);
                if ($create)
                {
// TODO remove when relationship no longer needed
//                    $this->createRelationship($left, $ret, $relatesTo);
                }
                array_push($arr, $ret);
            }
        }
        return $arr;
    }

    protected function createRelationship($left, $right, $relatesTo)
    {
        // generic drug relationship
        $relationship = new Relationship();
        $relationship->setLeftside($left);
        $relationship->setRelatesto($relatesTo);
        $relationship->setRightside($right);
        $relationship->setVersion('1');
        $relationship->setCreatedby("cjscript");
        $this->em->persist($relationship);
    }

    public function getBy($leftSide, $displayName)
    {
        $query = $this->em->createQuery(
                ' select distinct b.name as first, c.name as second, d.name as third, e.name as fourth ' .
                '   from AxonMedicine\WhiteKoatBundle\Entity\Relationship a ' .
                '  inner join a.leftside b ' .
                '  inner join a.rightside c ' .
                '  inner join c.type d ' .
                '  inner join a.relatesto e ' .
                '  where b.name=?1 and e.displayname=?2 order by b.name, c.name ');
        $query->setParameter(1, $leftSide);
        $query->setParameter(2, $displayName);
        $ret = $query->getResult();
        return $ret;
    }

    public function getByFull($leftSideType, $rightSideType, $rightSideValue, $lookupName)
    {
        $query = $this->em->createQuery(
                ' select a from AxonMedicine\WhiteKoatBundle\Entity\Relationship a ' .
                '  inner join a.leftside b ' .
                '  inner join b.type c ' .
                '  inner join a.rightside d ' .
                '  inner join d.type e ' .
                '  inner join a.relatesto f ' .
                '  where c.name=?1 and e.name=?2 and d.id=?3 and f.name=?4');
        $query->setParameter(1, $leftSideType);
        $query->setParameter(2, $rightSideType);
        $query->setParameter(3, $rightSideValue);
        $query->setParameter(4, $lookupName);
        $ret = $query->getResult();

        return $ret;
    }

}
