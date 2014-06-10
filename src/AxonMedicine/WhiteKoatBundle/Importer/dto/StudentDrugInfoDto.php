<?php

namespace util\importer\drugdataimporter;

/**
 * Description of DrugDto
 *
 * @author cjscript
 */
class StudentDrugInfoDto
{

    private $id;
    private $generic;
    private $brands;
    private $classes;
    private $targets;
    private $treatments;
    private $mechanism;
    private $sideeffects;
    private $contrainds;

    public function __construct($id, $generic, $brands, $classes, $targets, $treatments, $mechanism, $sideeffects, $contrainds)
    {
        $this->id = $id;
        $this->generic = $generic;
        $this->brands = $brands;
        $this->classes = $classes;
        $this->targets = $targets;
        $this->treatments = $treatments;
        $this->mechanism = $mechanism;
        $this->sideeffects = $sideeffects;
        $this->contrainds = $contrainds;
    }

    public function getSortValue()
    {
        return $this->generic;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGeneric()
    {
        return $this->generic;
    }

    public function getBrands()
    {
        return $this->brands;
    }

    public function getClasses()
    {
        return $this->classes;
    }

    public function getTargets()
    {
        return $this->targets;
    }

    public function getTreatments()
    {
        return $this->treatments;
    }

    public function getMechanism()
    {
        return $this->mechanism;
    }

    public function getSideeffects()
    {
        return $this->sideeffects;
    }

    public function getContrainds()
    {
        return $this->contrainds;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setGeneric($generic)
    {
        $this->generic = $generic;
    }

    public function setBrands($brands)
    {
        $this->brands = $brands;
    }

    public function setClasses($classes)
    {
        $this->classes = $classes;
    }

    public function setTargets($targets)
    {
        $this->targets = $targets;
    }

    public function setTreatments($treatments)
    {
        $this->treatments = $treatments;
    }

    public function setMechanism($mechanism)
    {
        $this->mechanism = $mechanism;
    }

    public function setSideeffects($sideeffects)
    {
        $this->sideeffects = $sideeffects;
    }

    public function setContrainds($contrainds)
    {
        $this->contrainds = $contrainds;
    }

}
