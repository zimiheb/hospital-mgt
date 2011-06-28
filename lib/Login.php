<?php

//Make the class functions independent


class Login {
	//todo replace this request param with exect required variables only
	
	public static function Authenticate($request) 
	{
		
		$email = $request->getParameter ( 'email' );
		$password = $request->getParameter ( 'password' );
		// - END - Get Form Data
		
		//perform the authentication
		$employee = self::ValidateUser ( $email, $password );
		
		/* ----------------------------------------------------------------------------------------------------------------------------------
		//create session
		sfContext::getInstance ()->getUser ()->setAttribute ( 'USER_ID', $employee->getId () );
		sfContext::getInstance ()->getUser ()->setAttribute ( 'EMAIL', $employee->getEmail () );
		sfContext::getInstance ()->getUser ()->setAttribute ( 'NAME', $employee->getName () );
		sfContext::getInstance ()->getUser ()->setAttribute ( 'LOGGED_IN', true );
		
		//Set Credentials	
		//TODO need to reconsider these credentials. now there are module and actions for secuirty			
		if (Constant::ROLE_SUPER_ADMINISTRATOR == $employee->getRoleId ()) 
			{
				sfContext::getInstance ()->getUser ()->addCredential ( Constant::ROLE_SUPER_ADMINISTRATOR_TITLE );
			}
		
		else if ($employee->getEmployeeRole ()->getIsAdmin () == true)
			{
				sfContext::getInstance ()->getUser ()->addCredential ( Constant::ROLE_ADMINISTRATOR_TITLE );
			}
		
		else if ($employee->getEmployeeRole ()->getIsAdmin () == false)
			{
				sfContext::getInstance ()->getUser ()->addCredential ( Constant::ROLE_EMPLOYEE_TITLE );
			}
		
		sfContext::getInstance ()->getUser ()->setAuthenticated ( true );
		
		
		//Get Permissions
		$permissions = $employee->getEmployeeRole ()->getPermissions ();
		
		  
		
		$menu = array();
		
		foreach ( $permissions as $permit ) 
		{
			$module_name = strtolower ( $permit->getAppAction ()->getAppModule ()->getName () );
			$action_name = strtolower ( $permit->getAppAction ()->getName () );
			sfContext::getInstance ()->getUser ()->setAttribute ( $module_name . "-" . $action_name, true );
			//$menu[$module_name][] = $action_name;

		}
		
		sfContext::getInstance ()->getUser ()->setAttribute ( 'menu', Menu::GetMenuTree() );
		
		--------------------------------------------------------------------------------------------------------------------------------- */ 
		//sfContext::getInstance ()->getUser ()->setAuthenticated ( true );
		return Constant::LOGIN_OK;
	} // - END - Authenticate
		
	
	public static function Logout() {
		
		//Get Permissions
		$employee_id = sfContext::getInstance ()->getUser ()->getAttribute ( 'USER_ID' );
		$employee = UserPeer::retrieveByPk ( $employee_id );
		
		/*
		$permissions = $employee->getEmployeeRole ()->getPermissions ();
		
		foreach ( $permissions as $permit ) {
			$module_name = strtolower ( $permit->getAppAction ()->getAppModule ()->getName () );
			$action_name = strtolower ( $permit->getAppAction ()->getName () );
			sfContext::getInstance ()->getUser ()->setAttribute ( $module_name . "-" . $action_name, false );
		}
		*/
		
		sfContext::getInstance ()->getUser ()->setAttribute ( 'USER_ID', NULL );
		sfContext::getInstance ()->getUser ()->setAttribute ( 'USERNAME', NULL );
		sfContext::getInstance ()->getUser ()->setAttribute ( 'NAME', NULL );
		sfContext::getInstance ()->getUser ()->setAttribute ( 'LOGGED_IN', NULL );
		
		//sfContext::getInstance ()->getUser ()->clearCredentials ();
		
		//sfContext::getInstance()->getUser()->getAttributeHolder()->removeNamespace('Permissions');
		

		sfContext::getInstance ()->getUser ()->getAttributeHolder ()->clear ();
		sfContext::getInstance ()->getUser ()->setAuthenticated ( false );
	
	} // - END - Logout
	
	public static function ChangePassword($old_password, $new_password) {
		
		//get User ID from session and get user object
		$user_id = sfContext::getInstance ()->getUser ()->getAttribute ( 'USER_ID' );
		$user = UserPeer::retrieveByPk ( $user_id );
		//Get post data
		//if old password is correct then set new one
		

		if (strcmp ( $user->getPassword (), self::EncryptPassword ( $old_password ) ) == 0) {
			$new_password = self::EncryptPassword ( $new_password );
			$user->setPassword ( $new_password );
			//Save password
			if ($user->save ()) {
				return Constant::LOGIN_PASSWORD_CHANGED_SUCCESS;
			
			} else //if failed to save
{
				return Constant::DB_ERROR;
			
			}
		} else //if invalid old passwrod
{
			return Constant::LOGIN_INVALID_OLD_PASSWORD;
		
		}
	} // - END - ChangePassword
	
	public static function RecoverPassword($id, $request_type = null) {
		//Generate Random Password of 6 characters
		$password = self::GenerateRandomPassword ( Constant::PASSWORD_MIMIMUM_LENGTH );
		
		//Encrypt password
		$password_encrypted = self::EncryptPassword ( $password );
		
		//check if this employee exists
		$employee = EmployeePeer::retrieveByPK ( $id );
		
		if ($employee) //If user exists
{
			$employee->setPassword ( $password_encrypted );
			//Set newly created password to databaes
			if ($employee->save ()) {
				//send the new password and other details to use via email
				//prepare the constants that will be replaced in email body
				$email_vars = array ('USER' => $employee->getName (), 'EMAIL' => $employee->getEmail (), 'PASSWORD' => $password );
				Emails::SendEmail ( $employee->getEmail (), $request_type, $email_vars );
				
				return Constant::LOGIN_PASSWORD_SENT_SUCCESS;
			
			} else //if failed to save
{
				return Constant::DB_ERROR;
			}
		} else {
			return Constant::LOGIN_INVALIDATION_EMAIL_FIELD;
		
		}
	
	} // - END - RecoverPassword
	 
	public static function EncryptPassword($password) {
		return md5 ( $password );
		//return $password;
	} // - END - EncryptPassword
	
	// ----------------------------------- Private functins starts from here ----------------------------------------------------------
	
	private static function ValidateUser($email, $password) {
		$password = self::EncryptPassword ( $password );
		// - START - Get Record From Database
		$c = new Criteria ( );
		$c->add ( HrPeer::EMAIL, $email );
		$c->add ( HrPeer::PASSWORD, $password );
		
		$employee = HrPeer::doSelectOne ( $c );
		
		// - END - Get Record From Database
		return $employee;
	} // - END - ValidateUser
	
	//this function is copied from internet
	private static function GenerateRandomPassword($length = 6, $level = 3) {
		list ( $usec, $sec ) = explode ( ' ', microtime () );
		srand ( ( float ) $sec + (( float ) $usec * 100000) );
		
		$valid_chars [1] = "0123456789abcdfghjkmnpqrstvwxyz";
		$valid_chars [2] = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$valid_chars [3] = "!@#$%&*+/0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*+/";
		
		$password = "";
		$counter = 0;
		
		while ( $counter < $length ) {
			$actChar = substr ( $valid_chars [$level], rand ( 0, strlen ( $valid_chars [$level] ) - 1 ), 1 );
			
			// All character must be different
			if (! strstr ( $password, $actChar )) {
				$password .= $actChar;
				$counter ++;
			}
		}
		
		return $password;
	
	} // - END - GenerateRandomPassword
	
	

} // - END - Class Login
?>

