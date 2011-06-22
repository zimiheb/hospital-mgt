<?php

class EmployeePeer extends BaseEmployeePeer
{
public static function GetEmployee()
	{
	$c = new Criteria();
	$c->add(EmployeePeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	$c->add(EmployeePeer::ROLE_ID, 1 , Criteria::NOT_EQUAL);
	$employees = EmployeePeer::doSelect($c);
	
	if($employees){
	return $employees;
		}
	
	else{
		return false;
		}
	} // END GetEmployee
	
	public static function GetDoctor()
	{
	$c = new Criteria();
	$c->add(EmployeePeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	$c->add(EmployeePeer::EMP_CATEGORY, doc);
	$employees = EmployeePeer::doSelect($c);
	
	if($employees){
	return $employees;
		}
	
	else{
		return false;
		}
	} // END GetDoctor
	
	public static function GetStaff()
	{
	$c = new Criteria();
	$c->add(EmployeePeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	$c->add(EmployeePeer::EMP_CATEGORY, staff);
	$employees = EmployeePeer::doSelect($c);
	
	if($employees){
	return $employees;
		}
	
	else{
		return false;
		}
	} // END GetStaff
	
}// END Class
