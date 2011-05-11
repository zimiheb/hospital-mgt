<?php

class DesignationPeer extends BaseDesignationPeer
{
public static function GetDesignation()
	{
	$c = new Criteria();
	$c->add(DesignationPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	$designations = DesignationPeer::doSelect($c);
	return $designations;
	}
}
