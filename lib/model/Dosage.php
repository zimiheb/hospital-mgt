<?php

class Dosage extends BaseDosage
{
public function __toString()
  	{
  		return $this->getTitle(); // getTitle() is inherited from Baseclass
  	}
}
