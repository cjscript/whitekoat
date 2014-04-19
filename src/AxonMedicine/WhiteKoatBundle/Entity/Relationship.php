<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relationship
 *
 * @ORM\Table(name="relationship")
 * @ORM\Entity
 */
class Relationship extends BaseEntity
{

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToOne(targetEntity="Libraryvalue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="LeftSide", referencedColumnName="Id")
     * })
     */
    private $leftside;
    /**
     * @var \Templookup
     *
     * @ORM\ManyToOne(targetEntity="Templookup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RelatesTo", referencedColumnName="Id")
     * })
     */
    private $relatesto;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToOne(targetEntity="Libraryvalue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RightSide", referencedColumnName="Id")
     * })
     */
    private $rightside;

    /**
     * Set leftside
     *
     * @param \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $leftside
     * @return Relationship
     */
    public function setLeftside(\AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $leftside)
    {
        $this->leftside = $leftside;

        return $this;
    }

    /**
     * Get leftside
     *
     * @return \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue 
     */
    public function getLeftside()
    {
        return $this->leftside;
    }

    /**
     * Set relatesto
     *
     * @param \AxonMedicine\WhiteKoatBundle\Entity\Templookup $relatesto
     * @return Relationship
     */
    public function setRelatesto($relatesto)
    {
        $this->relatesto = $relatesto;

        return $this;
    }

    /**
     * Get relatesto
     *
     * @return \AxonMedicine\WhiteKoatBundle\Entity\Templookup
     */
    public function getRelatesto()
    {
        return $this->relatesto;
    }

    /**
     * Set rightside
     *
     * @param \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $rightside
     * @return Relationship
     */
    public function setRightside(\AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $rightside)
    {
        $this->rightside = $rightside;

        return $this;
    }

    /**
     * Get rightside
     *
     * @return \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue 
     */
    public function getRightside()
    {
        return $this->rightside;
    }

}
