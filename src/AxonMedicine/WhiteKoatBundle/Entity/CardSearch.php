<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class CardSearch extends BaseEntity {

	private $searchTerm;
	
	public function getSearchTerm() {
		return $this->searchTerm;
	}
	
	public function setSearchTerm($searchTerm) {
		$this->searchTerm = $searchTerm;
	}
	
}
?>
		