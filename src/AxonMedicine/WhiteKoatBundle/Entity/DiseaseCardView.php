<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiseaseCardView
 *
 * @ORM\Table(name="diseasecardview")
 * @ORM\Entity
 */
class DiseaseCardView extends BaseEntity
{

    /**
     * @var string
     *
     * @ORM\Column(name="DiseaseName", type="string", length=1024, nullable=true)
     */
    private $diseasename;

    /**
     * @var string
     *
     * @ORM\Column(name="DiseaseType", type="string", length=1024, nullable=true)
     */
    private $diseasetype;

    /**
     * @var string
     *
     * @ORM\Column(name="DiseaseCause", type="string", length=1024, nullable=true)
     */
    private $diseasecause;

    /**
     * @var string
     *
     * @ORM\Column(name="DiseaseSymptom", type="string", length=1024, nullable=true)
     */
    private $diseasesymptom;

    /**
     * @var string
     *
     * @ORM\Column(name="DiseaseTreatment", type="string", length=1024, nullable=true)
     */
    private $diseasetreatment;

    /**
     * Set diseasename
     *
     * @param string $diseasename;
     * @return DiseaseCardView
     */
    public function setDiseasename($diseasename)
    {
        $this->diseasename = $diseasename;

        return $this;
    }

    /**
     * Get diseasename
     *
     * @return string 
     */
    public function getDiseasename()
    {
        return $this->diseasename;
    }

    /**
     * Set diseasetype
     *
     * @param string $diseasetype;
     * @return DiseaseCardView
     */
    public function setDiseasetype($type)
    {
        $this->diseasetype = $type;

        return $this;
    }

    /**
     * Get diseasetype
     *
     * @return string 
     */
    public function getDiseasetype()
    {
        return $this->diseasetype;
    }

    /**
     * Set diseasecause
     *
     * @param string $diseasecause
     * @return DiseaseCardView
     */
    public function setDiseasecause($diseasecause)
    {
        $this->diseasecause = $diseasecause;

        return $this;
    }

    /**
     * Get diseasecause
     *
     * @return string 
     */
    public function getDiseasecause()
    {
        return $this->diseasecause;
    }

    /**
     * Set diseasesymptom
     *
     * @param string diseasesymptom
     * @return DiseaseCardView
     */
    public function setDiseasesymptom($diseasesymptom)
    {
        $this->diseasesymptom = $diseasesymptom;

        return $this;
    }

    /**
     * Get diseasesymptom
     *
     * @return string 
     */
    public function getDiseasesymptom()
    {
        return $this->diseasesymptom;
    }

    /**
     * Set diseasetreatment
     *
     * @param string diseasetreatment
     * @return DiseaseCardView
     */
    public function setDiseasetreatment($diseasetreatment)
    {
        $this->diseasetreatment = $diseasetreatment;

        return $this;
    }

    /**
     * Get diseasetreatment
     *
     * @return string 
     */
    public function getDiseasetreatment()
    {
        return $this->diseasetreatment;
    }

}
