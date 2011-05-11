<?php

class DepartmentPeer extends BaseDepartmentPeer
{
public static function GetDepartment()
	{
	$c = new Criteria();
	//$c->add(DepartmentPeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	$departments = DepartmentPeer::doSelect($c);
	
	return $departments;
	}
}
