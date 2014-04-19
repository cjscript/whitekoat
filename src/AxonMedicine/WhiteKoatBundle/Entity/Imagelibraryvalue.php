<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagelibraryvalue
 *
 * @ORM\Table(name="imagelibraryvalue", uniqueConstraints={@ORM\UniqueConstraint(name="ImageRef", columns={"ImageRef", "LibraryRef"})}, indexes={@ORM\Index(name="LibraryRef", columns={"LibraryRef"}), @ORM\Index(name="IDX_77F61B328EB0FA48", columns={"ImageRef"})})
 * @ORM\Entity
 */
class Imagelibraryvalue extends BaseEntity
{

    /**
     * @var \Image
     *
     * @ORM\ManyToOne(targetEntity="Image")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ImageRef", referencedColumnName="Id")
     * })
     */
    private $imageref;

    /**
     * @var \Libraryvalue
     *
     * @ORM\ManyToOne(targetEntity="Libraryvalue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="LibraryRef", referencedColumnName="Id")
     * })
     */
    private $libraryref;
	
	

    /**
     * Set imageref
     *
     * @param \AxonMedicine\WhiteKoatBundle\Entity\Image $imageref
     * @return Imagelibraryvalue
     */
    public function setImageref(\AxonMedicine\WhiteKoatBundle\Entity\Image $imageref = null)
    {
        $this->imageref = $imageref;

        return $this;
    }

    /**
     * Get imageref
     *
     * @return \AxonMedicine\WhiteKoatBundle\Entity\Image 
     */
    public function getImageref()
    {
        return $this->imageref;
    }

    /**
     * Set libraryref
     *
     * @param \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $libraryref
     * @return Imagelibraryvalue
     */
    public function setLibraryref(\AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $libraryref = null)
    {
        $this->libraryref = $libraryref;

        return $this;
    }

    /**
     * Get libraryref
     *
     * @return \AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue 
     */
    public function getLibraryref()
    {
        return $this->libraryref;
    }

}
