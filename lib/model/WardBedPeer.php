<?php

class WardBedPeer extends BaseWardBedPeer
{
public static function GetWardBed()
	{
	$c = new Criteria();
	$c->add(WardBedPeer::STATUS, Constant::BED_AVAIABLE);
	$wardbeds = WardBedPeer::doSelect($c);
	
	return $wardbeds;
	}
}
