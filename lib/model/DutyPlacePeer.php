<?php

class DutyPlacePeer extends BaseDutyPlacePeer
{
public static function GetDutyPlace()
	{
	$c = new Criteria();
	$c->add(DutyPlacePeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	//$c->add(EmployeePeer::ROLE_ID, 1 , Criteria::NOT_EQUAL);
	$places = DutyPlacePeer::doSelect($c);
	
	if($places){
	return $places;
		}
	
	else{
		return false;
		}
	} // END GetEmployee
}
