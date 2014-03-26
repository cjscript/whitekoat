<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Librarytype
 *
 * @ORM\Table(name="librarytype", uniqueConstraints={@ORM\UniqueConstraint(name="Name", columns={"Name"})})
 * @ORM\Entity
 */
class Librarytype extends BaseEntity
{

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * Set name
     *
     * @param string $name
     * @return Librarytype
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

}
