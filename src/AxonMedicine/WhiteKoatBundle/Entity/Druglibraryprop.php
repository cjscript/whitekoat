<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Druglibraryprop
 *
 * @ORM\Table(name="druglibraryprop")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Druglibraryprop extends BaseEntity
{

    /**
     * @var boolean
     *
     * @ORM\Column(name="Generic", type="boolean", nullable=true)
     */
    private $generic = '0';

    /**
     * Set generic
     *
     * @param boolean $generic
     * @return Druglibraryprop
     */
    public function setGeneric($generic)
    {
        $this->generic = $generic;

        return $this;
    }

    /**
     * Get generic
     *
     * @return boolean 
     */
    public function getGeneric()
    {
        return $this->generic;
    }

}
