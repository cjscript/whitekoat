<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Libraryvalue
 *
 * @ORM\Table(name="libraryvalue", uniqueConstraints={@ORM\UniqueConstraint(name="Type", columns={"Type", "Name"})}, indexes={@ORM\Index(name="IDX_E69DE2422CECF817", columns={"Type"})})
 * @ORM\Entity
 */
class Libraryvalue extends BaseEntity
{

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=1024, nullable=false)
     */
    private $description;

    /**
     * @var \Librarytype
     *
     * @ORM\ManyToOne(targetEntity="Librarytype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Type", referencedColumnName="Id")
     * })
     */
    private $type;
    private $hasImages;

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Libraryvalue
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

    /**
     * Set description
     *
     * @param string $description
     * @return Libraryvalue
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param \AxonMedicine\WhiteKoatBundle\Entity\Librarytype $type
     * @return Libraryvalue
     */
    public function setType(\AxonMedicine\WhiteKoatBundle\Entity\Librarytype $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AxonMedicine\WhiteKoatBundle\Entity\Librarytype 
     */
    public function getType()
    {
        return $this->type;
    }

    public function setImages($hasImages)
    {
        $this->hasImages = $hasImages;
        return $this;
    }

    public function hasImages()
    {
        return $this->hasImages;
    }

}
