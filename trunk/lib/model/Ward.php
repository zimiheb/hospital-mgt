<?php

class Ward extends BaseWard
{
public function __toString()
  	{
  		return $this->getTitle(); // getTitle() is inherited from Baseclass
  	}
}
