<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiseaseCardView
 *
 * @ORM\Table(name="diseasecardview")
 * @ORM\Entity
 */
class DiseaseCardView extends BaseEntity implements GenericCard
{

    
	/**
     * @var \Libraryvalue
     *
     * @ORM\ManyToOne(targetEntity="Libraryvalue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DiseaseName", referencedColumnName="Id")
     * })
     */
    private $diseasename;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToMany(targetEntity="Libraryvalue")
     * @ORM\JoinTable(name="diseases_types",
	 *		joinColumns={@ORM\JoinColumn(name="DiseaseType", referencedColumnName="Id")},
	 *		inverseJoinColumns={@ORM\JoinColumn(name="Id", referencedColumnName="Id")}
     * )
     */
    private $diseasetype;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToMany(targetEntity="Libraryvalue")
     * @ORM\JoinTable(name="diseases_causes",
	 *		joinColumns={@ORM\JoinColumn(name="DiseaseCause", referencedColumnName="Id")},
	 *		inverseJoinColumns={@ORM\JoinColumn(name="Id", referencedColumnName="Id")}
     * )
     */
    private $diseasecause;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToMany(targetEntity="Libraryvalue")
     * @ORM\JoinTable(name="diseases_symptoms",
	 *		joinColumns={@ORM\JoinColumn(name="DiseaseSymptom", referencedColumnName="Id")},
	 *		inverseJoinColumns={@ORM\JoinColumn(name="Id", referencedColumnName="Id")}
     * )
     */
    private $diseasesymptom;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToMany(targetEntity="Libraryvalue")
     * @ORM\JoinTable(name="diseases_treatments",
	 *		joinColumns={@ORM\JoinColumn(name="DiseaseTreatment", referencedColumnName="Id")},
	 *		inverseJoinColumns={@ORM\JoinColumn(name="Id", referencedColumnName="Id")}
     * )
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
	
	public function getName()
	{
		return $this->getDiseasename()->getName();
	}
	
	public function getCardType()
	{
		return "Disease";
	}
	
	public function getStringArray()
	{
		$array = array('label' => $this->getName(),
		   'id' => $this->id,
		   'cardType' => $this->getCardType(),
		   'type' => $this->diseasetype,
		   'cause' => $this->diseasecause,
		   'symptoms' => $this->diseasesymptom,
		   'treatment' => $this->diseasetreatment,
		);
		//TODO: get id var linked to db, add as value field
		return $array;
	}
	
	public function __toString() {
		return $this->getName();
	}
}
