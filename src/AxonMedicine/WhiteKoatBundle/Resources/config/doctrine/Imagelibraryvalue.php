<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Imagelibraryvalue
 *
 * @ORM\Table(name="imagelibraryvalue", uniqueConstraints={@ORM\UniqueConstraint(name="ImageRef", columns={"ImageRef", "LibraryRef"})}, indexes={@ORM\Index(name="LibraryRef", columns={"LibraryRef"}), @ORM\Index(name="IDX_77F61B328EB0FA48", columns={"ImageRef"})})
 * @ORM\Entity
 */
class Imagelibraryvalue
{
    /**
     * @var string
     *
     * @ORM\Column(name="Id", type="string", length=32, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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


}
