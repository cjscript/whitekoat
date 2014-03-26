<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * @MappedSuperclass
 * @ORM\HasLifecycleCallbacks()
 */
class BaseEntity
{

    /**
     * @var string
     *
     * @ORM\Column(name="Id", type="string", nullable=false)
     * @ORM\Id
     */
    protected $id;

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
     * @ORM\Column(name="Created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Modified", type="datetime", nullable=false)
     */
    private $modified;

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

    function __construct()
    {
        $this->genUuid();
    }

    /**
     * Set id
     *
     * @param string $id
     * @return this object
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get id
     *
     * @return this object 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set inactive
     *
     * @param boolean $inactive
     * @return this object
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
     * @return this object
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
     * @ORM\PrePersist
     */
    public function setCreatedAt()
    {
        $this->created = new \DateTime();
    }

    /**
     * Set created
     * @param \DateTime $created
     * @return Libraryvalue
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set createdby
     *
     * @param string $createdby
     * @return this object
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
     * Set modified
     *
     * @param \DateTime $modified
     * @return this object
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
     * Set modifiedby
     *
     * @param string $modifiedby
     * @return this object
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

    private function genUuid()
    {
        $this->id = sprintf('%04x%04x%04x%04x%04x%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,
                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
        return $this->id;
    }

}
