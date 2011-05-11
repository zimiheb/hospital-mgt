<?php

class Designation extends BaseDesignation
{
public function __toString()
  	{
  		return $this->getTitle(); // getTitle() is inherited from Baseclass
  	}

}
