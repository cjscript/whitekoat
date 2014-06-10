<?php

namespace util\importer\drugdataimporter;

/**
 * Description of DrugDto
 *
 * @author cjscript
 */
class DrugDto
{

    private $id;
    private $name;
    private $description;
    private $generic;

    public function __construct($id, $name, $description, $generic)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->generic = $generic;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getGeneric()
    {
        return $this->generic;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setGeneric($generic)
    {
        $this->generic = $generic;
    }

}
