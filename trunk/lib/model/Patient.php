<?php

class Patient extends BasePatient
{
public function __toString()
  	{
  		return $this->getName(); // getTitle() is inherited from Baseclass
  	}
}
