<?php

class Employee extends BaseEmployee
{
public function __toString()
  	{
  		return $this->getName(); // getTitle() is inherited from Baseclass
  	}
}
