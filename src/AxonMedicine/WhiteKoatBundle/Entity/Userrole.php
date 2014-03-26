<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userrole
 *
 * @ORM\Table(name="userrole", uniqueConstraints={@ORM\UniqueConstraint(name="UserId", columns={"UserId", "RoleId"})})
 * @ORM\Entity
 */
class Userrole extends BaseEntity
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
     * @ORM\Column(name="UserId", type="string", length=32, nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="RoleId", type="string", length=32, nullable=true)
     */
    private $roleid;

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
     * Set userid
     *
     * @param string $userid
     * @return Userrole
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return string 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set roleid
     *
     * @param string $roleid
     * @return Userrole
     */
    public function setRoleid($roleid)
    {
        $this->roleid = $roleid;

        return $this;
    }

    /**
     * Get roleid
     *
     * @return string 
     */
    public function getRoleid()
    {
        return $this->roleid;
    }

    /**
     * Set inactive
     *
     * @param boolean $inactive
     * @return Userrole
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
     * @return Userrole
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
     * @return Userrole
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
     * @return Userrole
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
     * @return Userrole
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
