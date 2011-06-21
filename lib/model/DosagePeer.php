<?php

class DosagePeer extends BaseDosagePeer
{
public static function GetDosage()
	{
	$c = new Criteria();
	$c->add(DosagePeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	$doses = DosagePeer::doSelect($c);
	
	return $doses;
	}
}
