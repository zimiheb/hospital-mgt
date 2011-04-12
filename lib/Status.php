<?php

class Status 
{
	/*
	//if you want to change these values then change in database first.
	
	
	//Review Statuses
	const REVIEW_STATUS_DELETED = 0;
	const REVIEW_STATUS_DELETED_TITLE = 'Deleted';
	
	const REVIEW_STATUS_COMPLETED = 1;
	const REVIEW_STATUS_COMPLETED_TITLE = 'Completed';
	
	const REVIEW_STATUS_PENDING = 2;	
	const REVIEW_STATUS_PENDING_TITLE = 'Pending';
	
	//const REVIEW_LOCKED = 3;	
	//const REVIEW_STATUS_PENDING_TITLE = 'Pending';
	
	
	//General Record status
	const RECORD_STATUS_DELETED = 0;
	const RECORD_STATUS_DELETED_TITLE = 'Deleted';
	
	const RECORD_STATUS_ACTIVE = 1;
	const RECORD_STATUS_ACTIVE_TITLE = 'Enabled';
	
	const RECORD_STATUS_DEACTIVE = 2;	
	const RECORD_STATUS_DEACTIVE_TITLE = 'Disabled';
	
	// company status
	const COMPANY_NOT_VERIFIED = 4;
	const COMPANY_NOT_VERIFIED_TITLE = 'Email Not Verified';
	const COMPANY_NOT_APPROVED = 3;
	const COMPANY_NOT_APPROVED_TITLE = 'Company Not Approved';
	
	
	const UNKNOWN_STATUS_TITLE = 'Unknown Status';
	
	
	static public function GetReviewStatusArray ()
	{
		$statuses = array (	self::REVIEW_STATUS_COMPLETED => self::REVIEW_STATUS_COMPLETED_TITLE,
							self::REVIEW_STATUS_PENDING => self::REVIEW_STATUS_PENDING_TITLE);
			
		return $statuses;	
	}
	
	
	
	
	static public function GetRecordStatusTitle($status)
	{
		//Compare Status and return appropriate title.
		switch ($status)
		{
			case self::RECORD_STATUS_DELETED:
				$title = self::RECORD_STATUS_DELETED_TITLE;
				break;
				
			case self::RECORD_STATUS_ACTIVE:
				$title = self::RECORD_STATUS_ACTIVE_TITLE;
				break;
			
			case self::RECORD_STATUS_DEACTIVE:
				$title = self::RECORD_STATUS_DEACTIVE_TITLE;
				break;
				
				case self::COMPANY_NOT_VERIFIED:
				$title = self::COMPANY_NOT_VERIFIED_TITLE ;
				break;
				
				case self::COMPANY_NOT_APPROVED:
				$title = self::COMPANY_NOT_APPROVED_TITLE ;
				break;
				
			default:
				$title = self::UNKNOWN_STATUS_TITLE;
		}			
		return $title;		
	}
	
	
	
	static public function GetReviewStatusTitle($status)
	{
		//Compare Status and return appropriate title.
		switch ($status)
		{
			case self::REVIEW_STATUS_COMPLETED:
				$title = self::REVIEW_STATUS_COMPLETED_TITLE;
				break;
			
			case self::REVIEW_STATUS_PENDING:
				$title = self::REVIEW_STATUS_PENDING_TITLE;
				break;
				
			default:
				$title = self::UNKNOWN_STATUS_TITLE;
		}			
		return $title;		
	}
	
	
	
	
	static public function GetRecordStatusArray ()
	{
		$statuses = array (	self::RECORD_STATUS_ACTIVE => self::RECORD_STATUS_ACTIVE_TITLE,
							self::RECORD_STATUS_DEACTIVE => self::RECORD_STATUS_DEACTIVE_TITLE);
			
		return $statuses;	
	}
	*/
	
}



?>