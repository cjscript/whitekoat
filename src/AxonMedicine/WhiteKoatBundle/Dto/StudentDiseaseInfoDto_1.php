<?php

namespace AxonMedicine\WhiteKoatBundle\Dto;

/**
 * Description of DiseaseInfo
 *
 * @author cjscript
 */
class StudentDiseaseInfoDto
{

    private $id;
    private $disease;
    private $type;
    private $symptom;
    private $cause;
    private $treatment;

    public function __construct($id, $disease, $type, $symptom, $cause, $treatment)
    {
        $this->id = $id;
        $this->disease = $disease;
        $this->type = $type;
        $this->symptom = $symptom;
        $this->cause = $cause;
        $this->treatment = $treatment;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDisease()
    {
        return $this->disease;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getCause()
    {
        return $this->cause;
    }

    public function getSymptom()
    {
        return $this->symptom;
    }

    public function getTreatment()
    {
        return $this->treatment;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDisease($disease)
    {
        $this->disease = $disease;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setCause($cause)
    {
        $this->cause = $cause;
    }

    public function setSymptom($symptom)
    {
        $this->symptom = $symptom;
    }

    public function setTreatment($treatment)
    {
        $this->treatment = $treatment;
    }

}
