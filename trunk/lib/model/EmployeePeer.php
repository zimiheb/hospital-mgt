<?php

class EmployeePeer extends BaseEmployeePeer
{
public static function GetEmployee()
	{
	$c = new Criteria();
	$c->add(EmployeePeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	//$c->add(EmployeePeer::ROLE_ID, 1 , Criteria::NOT_EQUAL);
	$employees = EmployeePeer::doSelect($c);
	
	if($employees){
	return $employees;
		}
	
	else{
		return false;
		}
	} // END GetEmployee
}
