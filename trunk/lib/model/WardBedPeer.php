<?php

class WardBedPeer extends BaseWardBedPeer
{
public static function GetWardBed()
	{
	$c = new Criteria();
	$c->add(WardBedPeer::STATUS, Constant::BED_AVAILABLE);
	$wardbeds = WardBedPeer::doSelect($c);
	
	return $wardbeds;
	}
}
