<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

/**
 * ResultsCardView
 *   This is a placeholder for a results card.  A results card 
 *   is displayed as result of a drug or disease card.
 *
 */
class ResultsCardView extends BaseEntity implements GenericCard
{

    private $name;

    public function __construct()
    {
        parent::__construct();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCardType()
    {
        return "Symptom";
    }

    public function getStringArray()
    {
        $array = array(
            'id' => $this->id,
            'label' => $this->getName(),
            'cardType' => $this->getCardType());

        return $array;
    }

}
