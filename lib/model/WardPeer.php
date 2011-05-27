<?php

class WardPeer extends BaseWardPeer
{
  public static function GetWard()
	{
	$c = new Criteria();
	$c->add(WardPeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	$wards = WardPeer::doSelect($c);
	
	return $wards;
	}
}
