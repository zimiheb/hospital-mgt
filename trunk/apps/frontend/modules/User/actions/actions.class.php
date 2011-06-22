
<?php

/**
 * User actions.
 *
 * @package    hospital
 * @subpackage User
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class UserActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  } // -- END executeIndex
  
  public function executeList(sfWebRequest $request)
  {
    $c = new Criteria();
	$c->add(UserPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	$c->addAscendingOrderByColumn(UserPeer::EMPLOYEE_ID);
	$this->users = UserPeer::doSelect($c);
	
  }
  public function executeAddUser(sfWebRequest $request)
  {
    if ($request->isMethod('POST'))
	{
		$user = new User();
		
		$user->setEmployeeId($this->getRequestParameter('employee_id'));
		$user->setRoleId($this->getRequestParameter('role_id'));
		$user->setUser($request->getParameter('user'));
		$user->setPassword($request->getParameter('password'));
		$user->setStatus(Constant::RECORD_STATUS_ACTIVE);
		
		$user->save();
		
		$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', 'UserName and Password assigned Successfully.' );
		$this->redirect('User/list');
	}
  } 
    
  public function executeEdit (sfWebRequest $request)
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			//Create User and set object attributes
			$user = UserPeer::retrieveByPk($this->getRequestParameter('id'));

			$user->setEmployeeId($this->getRequestParameter('employee_id'));
			$user->setRoleId($this->getRequestParameter('role_id'));
			$user->setUser($request->getParameter('user'));
		$user->setPassword($request->getParameter('password'));
		$user->setStatus(Constant::RECORD_STATUS_ACTIVE);
		
			//Save object to database
			if($user->save())
				{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
				}
			
			else
				{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				}
		
		$this->redirect ('User/list');
		
		}// end if

	else
	{
	
	$this->user = UserPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
	
/*	$this->region_id = Utility::DecryptQueryString($request->getParameter('region'));
	$this->office_id = Utility::DecryptQueryString($request->getParameter('office'));
	$this->partner_id = Utility::DecryptQueryString($request->getParameter('partner'));
*/			
	} // end else
	 } // - END - executeEdit	
	} //- END - executeEditDuty
 
  
  