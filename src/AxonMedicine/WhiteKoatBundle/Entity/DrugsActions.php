<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DrugActions
 *
 * @ORM\Table(name="drugs_actions", uniqueConstraints={@ORM\UniqueConstraint(name="Drug", columns={"Drug", "Action", "Receiver"})}, indexes={@ORM\Index(name="Action", columns={"Action"}), @ORM\Index(name="Receiver", columns={"Receiver"}), @ORM\Index(name="IDX_680D3872DC048670", columns={"Drug"})})
 * @ORM\Entity
 */
class DrugsActions extends BaseEntity
{

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToOne(targetEntity="Libraryvalue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Drug", referencedColumnName="Id")
     * })
     */
    private $drug;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToOne(targetEntity="Libraryvalue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Action", referencedColumnName="Id")
     * })
     */
    private $action;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToOne(targetEntity="Libraryvalue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Receiver", referencedColumnName="Id")
     * })
     */
    private $receiver;

    /**
     * Set receiver
     *
     * @param \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $receiver
     * @return DrugsActions
     */
    public function setReceiver(\AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $receiver = null)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get receiver
     *
     * @return \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue 
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Set action
     *
     * @param \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $action
     * @return DrugsActions
     */
    public function setAction(\AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $action = null)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue 
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set drug
     *
     * @param \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $drug
     * @return DrugsActions
     */
    public function setDrug(\AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $drug = null)
    {
        $this->drug = $drug;

        return $this;
    }

    /**
     * Get drug
     *
     * @return \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue 
     */
    public function getDrug()
    {
        return $this->drug;
    }

}
