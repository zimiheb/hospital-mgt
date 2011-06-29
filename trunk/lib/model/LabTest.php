<?php

class LabTest extends BaseLabTest
{
public function __toString()
  	{
  		return $this->getTitle(); // getTitle() is inherited from Baseclass
  	}
}
