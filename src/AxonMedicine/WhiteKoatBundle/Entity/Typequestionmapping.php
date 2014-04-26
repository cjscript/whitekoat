<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typequestionmapping
 *
 * @ORM\Table(name="typequestionmapping")
 * @ORM\Entity
 */
class Typequestionmapping
{
    /**
     * @var string
     *
     * @ORM\Column(name="Id", type="string", length=32, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Display", type="string", length=1024, nullable=false)
     */
    private $display;

    /**
     * @var string
     *
     * @ORM\Column(name="DiseaseType", type="string", length=1024, nullable=false)
     */
    private $diseasetype;

    /**
     * @var string
     *
     * @ORM\Column(name="DiseaseCause", type="string", length=1024, nullable=false)
     */
    private $diseasecause;

    /**
     * @var string
     *
     * @ORM\Column(name="DiseaseSymptom", type="string", length=1024, nullable=false)
     */
    private $diseasesymptom;

    /**
     * @var string
     *
     * @ORM\Column(name="DiseaseTreatment", type="string", length=1024, nullable=false)
     */
    private $diseasetreatment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Inactive", type="boolean", nullable=true)
     */
    private $inactive = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="Version", type="integer", nullable=false)
     */
    private $version;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Created", type="datetime", nullable=false)
     */
    private $created = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Modified", type="datetime", nullable=false)
     */
    private $modified = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedBy", type="string", length=64, nullable=false)
     */
    private $createdby = 'cjscript';

    /**
     * @var string
     *
     * @ORM\Column(name="ModifiedBy", type="string", length=64, nullable=true)
     */
    private $modifiedby;


}
