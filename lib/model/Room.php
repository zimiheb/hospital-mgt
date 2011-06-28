<?php

class Room extends BaseRoom
{
public function __toString()
  	{
  		return $this->getTitle(); // getTitle() is inherited from Baseclass
  	}
}
