<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alias
 *
 * @ORM\Table(name="alias", uniqueConstraints={@ORM\UniqueConstraint(name="Alias", columns={"Alias", "Original"})}, indexes={@ORM\Index(name="Original", columns={"Original"}), @ORM\Index(name="IDX_E16C6B9420AD4490", columns={"Alias"})})
 * @ORM\Entity
 */
class Alias extends BaseEntity
{

    /**
     * @var string
     *
     * @ORM\Column(name="Alias", type="string", length=255, nullable=false)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="Original", type="string", length=255, nullable=false)
     */
    private $original;

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set alias
     *
     * @param string $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get original
     *
     * @return string 
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * Set original
     *
     * @param string $original
     */
    public function setOriginal($original)
    {
        $this->original = $original;

        return $this;
    }

}
