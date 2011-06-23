<?php

class RolePeer extends BaseRolePeer
{
public static function GetRole()
	{
	$c = new Criteria();
	$c->add(RolePeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	$c->addAscendingOrderByColumn(RolePeer::TITLE);
	$roles = RolePeer::doSelect($c);
	
	return $roles;
	}
}
