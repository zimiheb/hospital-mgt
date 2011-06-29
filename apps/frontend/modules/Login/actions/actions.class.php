<?php

class LoginActions extends sfActions
{
 
public function executeIndex(sfWebRequest $request)
  {
    
	if ($this->getRequest ()->getMethod () == sfRequest::POST)
	{
		$username = $request->getParameter ( 'username' );
		$password = $request->getParameter ( 'password' );
		
		$password = Login::EncryptPassword ( $password );
		
		// Get Record From Database
		$c = new Criteria ( );
		$c->add ( UserPeer::USER, $username );
		$c->add ( UserPeer::PASSWORD, $password );
		$user = UserPeer::doSelectOne ( $c );

		//Set Global Attributes
		if ($user)
			{
			//$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', Constant::LOGIN_OK );
			sfContext::getInstance ()->getUser ()->setAttribute ( 'USER_ID', $user->getId() );
			sfContext::getInstance ()->getUser ()->setAttribute ( 'USERNAME', $user->getUser() );
			sfContext::getInstance ()->getUser ()->setAttribute ( 'NAME', $user->getEmployee()->getName() );
			sfContext::getInstance ()->getUser ()->setAttribute ( 'ROLE',  $user->getRole());
			sfContext::getInstance ()->getUser ()->setAttribute ( 'LOGGED_IN', true );
			sfContext::getInstance ()->getUser ()->setAuthenticated ( true );

			$this->redirect ( 'Home/index' );
			}
		
		else
			{
			$this->getUser ()->setFlash ( 'ERROR_MESSAGE', Constant::LOGIN_INVALID_USER_EMAIL_PASSWORD );
			sfContext::getInstance ()->getUser ()->setAuthenticated ( false );
			} 
	}// end if

} // - END - executeIndex
  
public function executeLogout()
{
		Login::Logout ();
		$this->redirect ( 'Login/index' );
}
	
	
public function executeChangePassword(sfWebRequest $request)
{
		//$this->response->setTitle ( Constant::TITLE_CHANGE_PASSWORD );
		if ($request->isMethod ( 'Post' ))
		{
			$old_password = $request->getParameter ( 'old_password' );
			$new_password = $request->getParameter ( 'new_password' );
			
			$response = Login::ChangePassword ( $old_password, $new_password );
			if ($response == Constant::LOGIN_PASSWORD_CHANGED_SUCCESS)
			{
				$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', Constant::LOGIN_PASSWORD_CHANGED_SUCCESS );
				$this->redirect ( 'Home/index' );
			}
			else if ($response == Constant::DB_ERROR)
			{
				$this->getUser ()->setFlash ( 'ERROR_MESSAGE', Constant::DB_ERROR );
				$this->redirect ( 'Login/changePassword' );
			}
			else if ($response == Constant::LOGIN_INVALID_OLD_PASSWORD)
			{
				$this->getUser ()->setFlash ( 'ERROR_MESSAGE', Constant::LOGIN_INVALID_OLD_PASSWORD );
				$this->redirect ( 'Login/changePassword' );
			}
		}
	
	} // - END - executeChangePassword
  
} // - END - class LoginActions
