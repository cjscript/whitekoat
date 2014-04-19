<?php

namespace AxonMedicine\WhiteKoatBundle\Entity;

use Doctrine\ORM\Query;
interface GenericCard {

	public function getName();
	public function getCardType();
	public function getStringArray();
}

?>