<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userimage
 *
 * @ORM\Table(name="userimage")
 * @ORM\Entity
 */
class Userimage extends BaseEntity
{

    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="blob", nullable=true)
     */
    private $image;

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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Userimage
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set inactive
     *
     * @param boolean $inactive
     * @return Userimage
     */
    public function setInactive($inactive)
    {
        $this->inactive = $inactive;

        return $this;
    }

    /**
     * Get inactive
     *
     * @return boolean 
     */
    public function getInactive()
    {
        return $this->inactive;
    }

    /**
     * Set version
     *
     * @param integer $version
     * @return Userimage
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return integer 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return Userimage
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set createdby
     *
     * @param string $createdby
     * @return Userimage
     */
    public function setCreatedby($createdby)
    {
        $this->createdby = $createdby;

        return $this;
    }

    /**
     * Get createdby
     *
     * @return string 
     */
    public function getCreatedby()
    {
        return $this->createdby;
    }

    /**
     * Set modifiedby
     *
     * @param string $modifiedby
     * @return Userimage
     */
    public function setModifiedby($modifiedby)
    {
        $this->modifiedby = $modifiedby;

        return $this;
    }

    /**
     * Get modifiedby
     *
     * @return string 
     */
    public function getModifiedby()
    {
        return $this->modifiedby;
    }

}
