<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use AxonMedicine\WhiteKoatBundle\Entity\Image;
use AxonMedicine\WhiteKoatBundle\Entity\Imagelibraryvalue;

/**
 * The type library service.
 *
 * @author cjscript
 */
class TypeLibService extends BaseService
{

    public function getTypes()
    {
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\Librarytype a');
        $result = $query->getResult();
        return $result;
    }

    public function getTypeBy($libValueName)
    {
        $ret = null;

        $qb = $this->em->createQueryBuilder();

        $qb->select('a')
                ->from('AxonMedicineWhiteKoatBundle:Libraryvalue', 'a')
                ->innerJoin('a.type', 'b')
                ->where('a.name=:p1')->setParameter('p1', $libValueName);

        $libTypes = $qb->getQuery()->getResult();

        if ($libTypes != null)
        {
            $ret = array_values($libTypes)[0];
        }
        return $ret;
    }

    public function exists($firstName, $secondName, $firstType, $secondType)
    {
        $qb = $this->em->createQueryBuilder();

        $qb->select('a')
                ->from('AxonMedicineWhiteKoatBundle:Relationship', 'a')
                ->innerJoin('a.leftside', 'b')
                ->innerJoin('a.rightside', 'c')
                ->innerJoin('b.type', 'd')
                ->innerJoin('c.type', 'e')
                ->where('b.name=:p1')->setParameter('p1', $firstName)
                ->andWhere('c.name=:p2')->setParameter('p2', $secondName)
                ->andWhere('d.name=:p3')->setParameter('p3', $firstType)
                ->andWhere('e.name=:p4')->setParameter('p4', $secondType);

        $ret = $qb->getQuery()->getResult();

        $exists = false;

        if ($ret != null)
        {
            $exists = true;
        }
        return $exists;
    }

    public function getTempLookupBy($value)
    {
        $sql = 'select a FROM AxonMedicine\WhiteKoatBundle\Entity\Templookup a where a.name = ?1 ';
        $query = $this->em->createQuery($sql);
        $query->setParameter(1, $value);
        $tempRet = $query->getResult();

        $ret = null;

        if ($tempRet != null)
        {
            $ret = $tempRet[0];
        }
        return $ret;
    }

    // TODO move to image service
    public function getImages()
    {
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\Image a');
        $result = $query->getResult();
        return $result;
    }

    // TODO move to image service
    public function getImageLibs()
    {
        $query = $this->em->createQuery('select b.id as id, b.originalfilename as originalfilename, GROUP_CONCAT(c.name) as name '
                . '  FROM AxonMedicine\WhiteKoatBundle\Entity\Imagelibraryvalue a '
                . ' INNER JOIN a.imageref b '
                . ' INNER JOIN a.libraryref c '
                . ' GROUP BY b.id '
                . ' ORDER BY b.originalfilename, c.name');
        $result = $query->getResult();
        return $result;
    }

    public function saveImage($originalName, $extension, $libIds, $creator)
    {
        // create image
        $image = new Image();
        $image->setOriginalfilename($originalName);
        $image->setOriginalfileext($extension);
        $image->setVersion('1');
        $image->setCreatedby($creator);
        $this->em->persist($image);

        // create image lib tags
        foreach ($libIds as $libId)
        {
            // get library value.
            $lib = $this->em->find('AxonMedicineWhiteKoatBundle:Libraryvalue', $libId);
            $imageLibTag = new Imagelibraryvalue();
            $imageLibTag->setImageref($image);
            $imageLibTag->setLibraryref($lib);
            $imageLibTag->setVersion('1');
            $imageLibTag->setCreatedby($creator);
            $this->em->persist($imageLibTag);
        }
        $this->em->flush();

        return $image;
    }

}
