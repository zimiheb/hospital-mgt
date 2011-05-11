<?php

class Department extends BaseDepartment
{
public function __toString()
  	{
  		return $this->getTitle(); // getTitle() is inherited from Baseclass
  	}
}
