<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DrugCardView
 *
 * @ORM\Table(name="drugcardview")
 * @ORM\Entity
 */
class DrugCardView extends BaseEntity implements GenericCard
{

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToOne(targetEntity="Libraryvalue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="DrugName", referencedColumnName="Id")
     * })
     */
    private $drugname;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToMany(targetEntity="Libraryvalue")
     * @ORM\JoinTable(name="drugs_brands",
     * 		joinColumns={@ORM\JoinColumn(name="DrugBrand", referencedColumnName="Id")},
     * 		inverseJoinColumns={@ORM\JoinColumn(name="Id", referencedColumnName="Id")}
     * )
     */
    private $drugbrand;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToMany(targetEntity="Libraryvalue")
     * @ORM\JoinTable(name="drugs_classes",
     * 		joinColumns={@ORM\JoinColumn(name="DrugClass", referencedColumnName="Id")},
     * 		inverseJoinColumns={@ORM\JoinColumn(name="Id", referencedColumnName="Id")}
     * )
     */
    private $drugclass;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToMany(targetEntity="Libraryvalue")
     * @ORM\JoinTable(name="drugs_targets",
     * 		joinColumns={@ORM\JoinColumn(name="DrugTarget", referencedColumnName="Id")},
     * 		inverseJoinColumns={@ORM\JoinColumn(name="Id", referencedColumnName="Id")}
     * )
     */
    private $drugtarget;

    /**
     * @var string
     *
     * @ORM\Column(name="DrugMechanism", type="string", length=255, nullable=true)
     */
    private $drugmechanism;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToMany(targetEntity="Libraryvalue")
     * @ORM\JoinTable(name="drugs_treatments",
     * 		joinColumns={@ORM\JoinColumn(name="DrugTreatment", referencedColumnName="Id")},
     * 		inverseJoinColumns={@ORM\JoinColumn(name="Id", referencedColumnName="Id")}
     * )
     */
    private $drugtreatment;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToMany(targetEntity="Libraryvalue")
     * @ORM\JoinTable(name="drugs_sideeffects",
     * 		joinColumns={@ORM\JoinColumn(name="DrugSideEffect", referencedColumnName="Id")},
     * 		inverseJoinColumns={@ORM\JoinColumn(name="Id", referencedColumnName="Id")}
     * )
     */
    private $drugsideeffect;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToMany(targetEntity="Libraryvalue")
     * @ORM\JoinTable(name="drugs_contrainds",
     * 		joinColumns={@ORM\JoinColumn(name="DrugContraInd", referencedColumnName="Id")},
     * 		inverseJoinColumns={@ORM\JoinColumn(name="Id", referencedColumnName="Id")}
     * )
     */
    private $drugcontraind;

    public function __construct()
    {
        parent::__construct();
        $this->drugbrand = new \Doctrine\Common\Collections\ArrayCollection();
        $this->drugclass = new \Doctrine\Common\Collections\ArrayCollection();
        $this->drugtarget = new \Doctrine\Common\Collections\ArrayCollection();
        $this->drugtreatment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->drugsideefect = new \Doctrine\Common\Collections\ArrayCollection();
        $this->drugcontraind = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set drugname
     *
     * @param Libraryvalue $drugname;
     * @return DrugCardView
     */
    public function setDrugname($drugname)
    {
        $this->drugname = $drugname;

        return $this;
    }

    /**
     * Get drugname
     *
     * @return Libraryvalue 
     */
    public function getDrugname()
    {
        return $this->drugname;
    }

    /**
     * Set drugbrand
     *
     * @param string $drugbrand;
     * @return DrugCardView
     */
    public function setDrugbrand($drugbrand)
    {
        $this->drugbrand = new \Doctrine\Common\Collections\ArrayCollection($drugbrand);

        return $this;
    }

    /**
     * Get drugbrand
     *
     * @return Libraryvalue 
     */
    public function getDrugbrand()
    {
        return $this->drugbrand;
    }

    public function getDrugBrandValuesString()
    {
        return implode(", ", $this->getDrugBrandValues());
    }

    /**
     * Set drugclass
     *
     * @param string $drugclass
     * @return DrugCardView
     */
    public function setDrugclass($drugclass)
    {
        $this->drugclass = new \Doctrine\Common\Collections\ArrayCollection($drugclass);

        return $this;
    }

    /**
     * Get drugclass
     *
     * @return Libraryvalue 
     */
    public function getDrugclass()
    {
        return $this->drugclass;
    }

    /**
     * Set drugtarget
     *
     * @param string $drugtarget
     * @return DrugCardView
     */
    public function setDrugtarget($drugtarget)
    {
        $this->drugtarget = new \Doctrine\Common\Collections\ArrayCollection($drugtarget);

        return $this;
    }

    /**
     * Get drugtarget
     *
     * @return Libraryvalue 
     */
    public function getDrugtarget()
    {
        return $this->drugtarget;
    }

    /**
     * Set drugmechanism
     *
     * @param string $drugmechanism
     * @return DrugCardView
     */
    public function setDrugmechanism($drugmechanism)
    {
        $this->drugmechanism = $drugmechanism;

        return $this;
    }

    /**
     * Get drugmechanism
     *
     * @return string 
     */
    public function getDrugmechanism()
    {
        return $this->drugmechanism;
    }

    /**
     * Set drugtreatment
     *
     * @param string drugtreatment
     * @return DrugCardView
     */
    public function setDrugtreatment($drugtreatment)
    {
        $this->drugtreatment = new \Doctrine\Common\Collections\ArrayCollection($drugtreatment);

        return $this;
    }

    /**
     * Get drugtreatment
     *
     * @return Libraryvalue 
     */
    public function getDrugtreatment()
    {
        return $this->drugtreatment;
    }

    /**
     * Set drugsideeffect
     *
     * @param string drugsideeffect
     * @return DrugCardView
     */
    public function setDrugsideeffect($drugsideeffect)
    {
        $this->drugsideeffect = new \Doctrine\Common\Collections\ArrayCollection($drugsideeffect);

        return $this;
    }

    /**
     * Get drugsideeffect
     *
     * @return Libraryvalue 
     */
    public function getDrugsideeffect()
    {
        return $this->drugsideeffect;
    }

    /**
     * Get drugcontraind
     *
     * @return Libraryvalue 
     */
    public function getDrugcontraind()
    {
        return $this->drugcontraind;
    }

    /**
     * Set drugcontraind
     *
     * @param string drugcontraind
     * @return DrugCardView
     */
    public function setDrugcontraind($drugcontraind)
    {
        $this->drugcontraind = new \Doctrine\Common\Collections\ArrayCollection($drugcontraind);

        return $this;
    }

    public function getName()
    {
        return $this->getDrugname()->getName();
    }

    public function getCardType()
    {
        return "Drug";
    }

    public function getStringArray()
    {
        $array = array(
            'id' => $this->id,
            'label' => $this->getName(),
            'brandName' => $this->drugbrand,
            'target' => $this->drugtarget,
            'mechanism' => $this->drugmechanism,
            'treatment' => $this->drugtreatment,
            'sideEffects' => $this->drugsideeffect,
            'contraind' => $this->drugcontraind,
            'cardType' => $this->getCardType(),
            'class' => $this->drugclass);






        return $array;
    }

}
