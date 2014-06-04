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
    private $searchTerm;
    private $libValue;
    private $relatedDrugCards;
    private $relatedDiseaseCards;

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

    public function getLibValue()
    {
        return $this->libValue;
    }

    public function setLibValue(\AxonMedicine\WhiteKoatBundle\Entity\Libraryvalue $libValue = null)
    {
        $this->libValue = $libValue;
    }

    public function getRelatedDrugCards()
    {
        return $this->relatedDrugCards;
    }

    public function setRelatedDrugCards($relatedDrugCards = null)
    {
        $this->relatedDrugCards = $relatedDrugCards;
    }

    public function getRelatedDiseaseCards()
    {
        return $this->relatedDiseaseCards;
    }

    public function setRelatedDiseases($relatedDiseaseCards = null)
    {
        $this->relatedDiseaseCards = $relatedDiseaseCards;
    }

    public function getSearchTerm()
    {
        return $this->searchTerm;
    }

    public function setSearchTerm($searchTerm)
    {
        $this->searchTerm = $searchTerm;
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
