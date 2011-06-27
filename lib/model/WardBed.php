<?php

class WardBed extends BaseWardBed
{
public function __toString()
  	{
  		return $this->getBed(); // getTitle() is inherited from Baseclass
  	}
}
