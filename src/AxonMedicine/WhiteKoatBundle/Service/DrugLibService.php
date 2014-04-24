<?php

namespace AxonMedicine\WhiteKoatBundle\Service;

use AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue;
use AxonMedicine\WhiteKoatBundle\Entity\Druglibraryprop;

/**
 * The drug lib service.
 *
 * @author cjscript
 */
class DrugLibService extends BaseService
{

    public function getBy($id)
    {
        $query = $this->em->createQuery('select a from AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue a where a.id=?1');
        $query->setParameter(1, $id);
        $drug = $query->getSingleResult();
        return $drug;
    }

    public function getDrugBy($name)
    {
        $sql = 'select a FROM AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue a inner join a.type b where a.type=b.id and a.name=?1 and b.name=?2 ';
        $query = $this->em->createQuery($sql);
        $query->setParameter(1, $name);
        $query->setParameter(2, 'Drugs');
        $ret = $query->getResult();

        return $ret;
    }

    public function getDrugs($generic)
    {
        $sql = 'select NEW AxonMedicine\WhiteKoatBundle\Dto\DrugDto(b.id, b.name, b.description, a.generic) '
                . '  from AxonMedicine\WhiteKoatBundle\Entity\Druglibraryprop a, AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue b, AxonMedicine\WhiteKoatBundle\Entity\Librarytype c '
                . ' where a.id=b.id and b.type=c.id and c.name=?1 ';
        if ($generic)
        {
            $sql .= ' and a.generic=?2';
        }

        $sql .= ' order by a.generic desc, b.name';

        $query = $this->em->createQuery($sql);
        $query->setParameter(1, 'Drugs');

        if ($generic)
        {
            $query->setParameter(2, $generic);
        }

        $drugs = $query->getResult();
        return $drugs;
    }

    public function save($name, $description, $generic)
    {
        $ret = $this->getIfExists('Drugs', $name);

        if ($ret == null)
        {
            $em = $this->em;

            $em->getConnection()->beginTransaction();

            try
            {
                $value = new Libraryvalue();
                $value->setName($name);
                $value->setDescription($description);
                $libTypeRepo = $em->getRepository("AxonMedicineWhiteKoatBundle:Librarytype");
                $value->setType($libTypeRepo->findOneBy(array('name' => 'Drugs')));
                $value->setVersion('1');
                $value->setCreatedby("cjscript");

                $libProp = new Druglibraryprop();
                $libProp->setId($value->getId());
                $libProp->setGeneric($generic);
                $libProp->setVersion('1');
                $libProp->setCreatedby("cjscript");

                $em->persist($libProp);
                $em->persist($value);
                $em->flush();
                $em->getConnection()->commit();

                $ret = $value;
            } catch (Exception $e)
            {
                echo "++++FAILED WHEN CREATING DRUG NAME: " . $name;
                $em->getConnection()->rollback();
                $em->close();
                throw $e;
            }
        }
        return $ret;
    }

    public function remove($id)
    {
        // should use cascade but druglib table not always mapped.
        $duv = $this->em->find("AxonMedicineWhiteKoatBundle:Druglibraryprop", $id);

        if ($duv != null)
        {
            $this->em->remove($duv);
            $this->em->flush();
        }
        // now remove the value.
        $value = $this->em->getRepository("AxonMedicineWhiteKoatBundle:Libraryvalue")->find($id);

        $this->em->remove($value);
        $this->em->flush();
    }

}
