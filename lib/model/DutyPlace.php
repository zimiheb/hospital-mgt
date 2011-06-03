<?php

class DutyPlace extends BaseDutyPlace
{
public function __toString()
  	{
  		return $this->getTitle(); // getTitle() is inherited from Baseclass
  	}
}
