<?php

class Visit extends BaseVisit
{
public function __toString()
  	{
  		return $this->getVisitType(); // getTitle() is inherited from Baseclass
  	}

}
