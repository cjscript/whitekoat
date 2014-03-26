<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity
 */
class Image extends BaseEntity
{


    /**
     * @var string
     *
     * @ORM\Column(name="OriginalFileName", type="string", length=255, nullable=false)
     */
    private $originalfilename;

    /**
     * @var string
     *
     * @ORM\Column(name="OriginalFileExt", type="string", length=4, nullable=false)
     */
    private $originalfileext;

    /**
     * Set originalfilename
     *
     * @param string $originalfilename
     * @return Image
     */
    public function setOriginalfilename($originalfilename)
    {
        $this->originalfilename = $originalfilename;

        return $this;
    }

    /**
     * Get originalfilename
     *
     * @return string 
     */
    public function getOriginalfilename()
    {
        return $this->originalfilename;
    }

    /**
     * Set originalfileext
     *
     * @param string $originalfileext
     * @return Image
     */
    public function setOriginalfileext($originalfileext)
    {
        $this->originalfileext = $originalfileext;

        return $this;
    }

    /**
     * Get originalfileext
     *
     * @return string 
     */
    public function getOriginalfileext()
    {
        return $this->originalfileext;
    }

}
