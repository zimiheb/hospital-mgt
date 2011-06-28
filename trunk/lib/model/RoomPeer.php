<?php

class RoomPeer extends BaseRoomPeer
{
public static function GetRoom()
	{
	$c = new Criteria();
	$c->add(RoomPeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	$rooms = RoomPeer::doSelect($c);
	
	return $rooms;
	}
}
