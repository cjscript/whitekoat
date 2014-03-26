<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DrugCardView
 *
 * @ORM\Table(name="drugcardview")
 * @ORM\Entity
 */
class DrugCardView extends BaseEntity
{

    /**
     * @var string
     *
     * @ORM\Column(name="DrugName", type="string", length=255, nullable=true)
     */
    private $drugname;

    /**
     * @var string
     *
     * @ORM\Column(name="DrugBrand", type="string", length=255, nullable=true)
     */
    private $drugbrand;

    /**
     * @var string
     *
     * @ORM\Column(name="DrugClass", type="string", length=255, nullable=true)
     */
    private $drugclass;

    /**
     * @var string
     *
     * @ORM\Column(name="DrugTarget", type="string", length=255, nullable=true)
     */
    private $drugtarget;

    /**
     * @var string
     *
     * @ORM\Column(name="DrugMechanism", type="string", length=255, nullable=true)
     */
    private $drugmechanism;

    /**
     * @var string
     *
     * @ORM\Column(name="DrugTreatment", type="string", length=255, nullable=true)
     */
    private $drugtreatment;

    /**
     * @var string
     *
     * @ORM\Column(name="DrugSideEffect", type="string", length=255, nullable=true)
     */
    private $drugsideeffect;

    /**
     * @var string
     *
     * @ORM\Column(name="DrugContraInd", type="string", length=255, nullable=true)
     */
    private $drugcontraind;

    /**
     * Set drugname
     *
     * @param string $drugname;
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
     * @return string 
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
        $this->drugbrand = $drugbrand;

        return $this;
    }

    /**
     * Get drugbrand
     *
     * @return string 
     */
    public function getDrugbrand()
    {
        return $this->drugbrand;
    }

    /**
     * Set drugclass
     *
     * @param string $drugclass
     * @return DrugCardView
     */
    public function setDrugclass($drugclass)
    {
        $this->drugclass = $drugclass;

        return $this;
    }

    /**
     * Get drugclass
     *
     * @return string 
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
        $this->drugtarget = $drugtarget;

        return $this;
    }

    /**
     * Get drugtarget
     *
     * @return string 
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
        $this->drugtreatment = $drugtreatment;

        return $this;
    }

    /**
     * Get drugtreatment
     *
     * @return string 
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
        $this->drugsideeffect = $drugsideeffect;

        return $this;
    }

    /**
     * Get drugsideeffect
     *
     * @return string 
     */
    public function getDrugsideeffect()
    {
        return $this->drugsideeffect;
    }

    /**
     * Get drugcontraind
     *
     * @return string 
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
        $this->drugcontraind = $drugcontraind;

        return $this;
    }

}
