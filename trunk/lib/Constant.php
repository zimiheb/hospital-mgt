<?php

class Constant 
{
	//Production or Test enviorment
	const APPLICATION_PATH_PROD = "hospital/web/frontend.php/Login/";
	const APPLICATION_FRONTEND_PATH_PROD = "hospital/web/frontend.php";
	const APPLICATION_BACKEND_PATH_PROD = "hospital/web/frontend.php/";
	
	//Development Enviorment
	const APPLICATION_PATH_DEV = "hospital/web/frontend_dev.php/";
	const APPLICATION_FRONTEND_PATH_DEV = "hospital/web/frontend_dev.php/";
	const APPLICATION_BACKEND_PATH_DEV = "hospital/web/backend_dev.php/";
	
	//Roles Constants
	const ROLE_SUPER_ADMINISTRATOR = 1;
	const ROLE_SUPER_ADMINISTRATOR_TITLE = "Super Administrator";	
	const ROLE_ADMINISTRATOR = 2;
	const ROLE_ADMINISTRATOR_TITLE = "Administrator";	
	const ROLE_EMPLOYEE = 3;	
	const ROLE_EMPLOYEE_TITLE = "Employee";	
	
	//Login Constants
	const LOGIN_INVALID_USER_EMAIL_PASSWORD = "Seems like you have forgotten your EMAIL or PASSWORD";
	const LOGIN_OK = "You have successfully Logged In...";
	const LOGIN_COMPANY_DISABLED = "Hey, We know you are good but seems like you company is not good and is disabled. Contact your Administrator";
	const LOGIN_USER_DISABLED = "Well, we came to know that you are not good user and your account is disabled. Contact your Administrator";	
	const LOGIN_COMPANY_NOT_APPROVED = "Your company account have not approved by admin.";	
	const LOGIN_INVALID_OLD_PASSWORD = "Seems like you dont remember your old password";
	const LOGIN_PASSWORD_CHANGED_SUCCESS = "Your password has been changed successfully";
	const LOGIN_ACCOUNT_NOT_VERIFIED ="You have not verified your link which was sent to you email"; 
	const LOGIN_INVALIDATION_EMAIL_FIELD = "Seems like you even dont remeber you email.";
	const LOGIN_PASSWORD_SENT_SUCCESS = "Your new password has been sent to your email.";
	const LOGIN_AGAIN = "Please Login Again...";
	
	//Registration constants
	const REGISTRATION_COMPANY_ALREADY_EXIST = "Company Name already exist.";
	const REGISTRATION_COMPANY_URL_ALREADY_EXIST = "Company URL already exist.";
	const REGISTRATION_ACCOUNT_APPROVAL = "Congradulations!! Your account has been Registered Successfully.";
	const REGISTRATION_SUCCESS = "A verification email has been send to your inbox.";
	const REGISTRATION_EMAIL_ALREADY_EXIST = "This Email Already Exist";
	const REGISTRATION_INVALID_URL = "Invalid URL provided";
	
	
	//Record constants
	const RECORD_ADDED_SUCCESSFULLY = "Record added successfully";
	const RECORD_EDITED_SUCCESSFULLY = "Record edited successfully";
	const RECORD_STATUS_DELETED_SUCCESSFULLY = "Record deleted successfully";
	const RECORD_NOT_FOUND = "No record found, please <strong> Add New </strong> record";
	const NO_RECORD = "No record found.";	

	//form data messages
	const CREATE_DEPARTMENT = "Create employee departments first";
	const CREATE_EMPLOYEE_POSITIONS = "Create employee positions first";
	const CREATE_EMPLOYEE_ROLES = "Create employee roles first";
	const CREATE_EMPLOYEE_GRADES = "Create employee grades first";
	const CREATE_QUESTION_CATEGORY = "Create some Question Categories before adding Questions.";
	const CREATE_QUESTION = "Create some Questions before creating templates.";
	const SELECT_SOME_QUESTION = "Select atleast one question to add in this template.";
	const CREATE_REVIEWER_TYPES = "Add reviewers types first";
	const CREATE_EMPLOYEES = "Add employees first";
	const REVIEW_CREATED_SUCCESSFULLY = "Review Created Successfully";
	const REVIEWER_ADDED_SUCCESSFULLY = "Reviewers Created Successfully";
	const REVIEWER_STATUS_DELETED_SUCCESSFULLY = "Reviewers Deleted Successfully";
	const LIMIT_EXCEEDED = "You can't add more employees, Limit exceeded. Try upgrading your package...";

	//validation messages
	const VALIDATION_SUCCESS = " OK";
	const VALIDATION_REQUIRED_FIELD = " Should not be empty";
	const VALIDATION_INTEGER_FIELD = " Must be an integer";	
	const VALIDATION_EMAIL_FIELD = " Must be a valid email";	
		
	//round of constant
	const ROUND_RATING = 2;
	
		
	//password length and error message
	const PASSWORD_MIMIMUM_LENGTH = 6;
	const PASSWORD_MATCH_ERROR = " Passwords doesn't match";
	const PASSWORD_MINIMUM_LENGTH_ERROR = " Password should be atleast 6 charactors long";
	const PASSWORD_RESET_SUCCESSFULLY = "Password reset successfully";

	//General
	const PAGE_SIZE_GENERAL = 10;
	const PAGE_SIZE_NOTIFICATIONS = 5;
	const INVALID_REQUEST = "Invalid page request";
	const DB_ERROR = "Some problem occurred, please try again later";	
	const RATING_HIDDEN = ":)";
	
	//Boolean Words YES or No
	const BOOLEAN_WORD_YES = 1;
	const BOOLEAN_WORD_YES_TITLE = 'Yes';
	const BOOLEAN_WORD_NO = 0;
	const BOOLEAN_WORD_NO_TITLE = 'No';

	//General Record status
	const RECORD_STATUS_DELETED = 0;
	const RECORD_STATUS_DELETED_TITLE = 'Deleted';	
	const RECORD_STATUS_ACTIVE = 1;
	const RECORD_STATUS_ACTIVE_TITLE = 'Enabled';	
	const RECORD_STATUS_DEACTIVE = 2;	
	const RECORD_STATUS_DEACTIVE_TITLE = 'Disabled';
	const UNKNOWN_STATUS_TITLE = 'Unknown Status';
		
	const VISIT_PENDING = 1;
	const VISIT_PENDING_TITLE = 'Pending';
	
	const VISIT_DONE = 2;
	const VISIT_DONE_TITLE = 'Done';
	
	const VISIT_FEE_PAID = 3;
	const VISIT_FEE_PAID_TITLE = 'Paid';
	
	const VISIT_FEE_NOT_PAID = 4;
	const VISIT_FEE_NOT_PAID_TITLE = 'Not Paid';
	
	static public function GetVisitStatusArray ()
	{
		$statuses = array (	self::VISIT_PENDING => self::VISIT_PENDING_TITLE,
							self::VISIT_DONE => self::VISIT_DONE_TITLE,
							self::VISIT_FEE_PAID => self::VISIT_FEE_PAID_TITLE,
							self::VISIT_FEE_NOT_PAID => self::VISIT_FEE_NOT_PAID_TITLE);
		return $statuses;	
	}
	
	static public function GetVisitStatusTitle($visit)
	{
	//Compare Status and return appropriate title.
		switch ($visit)
		{
			case self::VISIT_PENDING:
				$title = self::VISIT_PENDING_TITLE;
				break;
			
			case self::VISIT_DONE:
				$title = self::VISIT_DONE_TITLE;
				break;
			
			case self::VISIT_FEE_PAID:
				$title = self::VISIT_FEE_PAID_TITLE;
				break;
			
			case self::VISIT_FEE_NOT_PAID:
				$title = self::VISIT_FEE_NOT_PAID_TITLE;
				break;
				
			default:
				$title = self::UNKNOWN_STATUS_TITLE;
		}			
		return $title;
	}
	
	static public function GetReviewStatusArray ()
	{
		$statuses = array (	self::REVIEW_STATUS_COMPLETED => self::REVIEW_STATUS_COMPLETED_TITLE,
							self::REVIEW_STATUS_PENDING => self::REVIEW_STATUS_PENDING_TITLE);
			
		return $statuses;	
	}
	
	static public function GetRecordStatusArray ()
	{
		$statuses = array (	self::RECORD_STATUS_ACTIVE => self::RECORD_STATUS_ACTIVE_TITLE,
							self::RECORD_STATUS_DEACTIVE => self::RECORD_STATUS_DEACTIVE_TITLE);
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
	
	static public function GetBooleanWord($boolean)
	{
	//Compare Status and return appropriate title.
		switch ($boolean)
		{
			case self::BOOLEAN_WORD_YES:
				$title = self::BOOLEAN_WORD_YES_TITLE;
				break;
			
			case self::BOOLEAN_WORD_NO:
				$title = self::BOOLEAN_WORD_NO_TITLE;
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
	
}
?>