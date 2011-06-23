<?php

class EmployeeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('Employee', 'list');
  }
  
   public function executeList(sfWebRequest $request)
	{
	$c = new Criteria();
	$c->add(EmployeePeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	$c->add(EmployeePeer::ROLE_ID, 1 , Criteria::NOT_EQUAL);
	$c->addAscendingOrderByColumn(EmployeePeer::DEPARTMENT_ID);
	$this->employees = EmployeePeer::doSelect($c);
	} // - END - executeList
  
  public function executeAddDoctor(sfWebRequest $request)
	{
	if ($request->isMethod('Post'))
		{
		
		/*Varialbes for Redirecting 
		$user_name = $this->getRequestParameter('user_name');
		$password = $this->getRequestParameter('password');
		
		if (strlen($password) != 0)
			{
			$password = md5($password);
			}
		
		else $password = '';*/
		
		// Setting Department from Selected Designation
		$a = new Criteria();
		$a->add (DesignationPeer::ID, $this->getRequestParameter('designation_id'));
		$designation_record = DesignationPeer::DoSelectOne($a);
		$department_id = $designation_record->getDepartmentId();
		
		// Checking if Entered Username already exist
		/*if($user_name != NULL)
		{
			$c = new Criteria ( );
			$c->add(UserPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL );
			$c->add(UserPeer::USER, $user_name);
			$check_username = UserPeer::doSelectOne($c);
			
			if ($check_username)
				{
				$this->getUser ()->setFlash ( 'ERROR_MESSAGE', 'Username Already exist. Please Choose Different Username.' );
				$this->redirect ('Register/add');
				}
		}*/
		
			$employee = new Employee();
			
			$employee->setRoleId($this->getRequestParameter('role_id'));
			$employee->setName($this->getRequestParameter('name'));
			$employee->setCnic($this->getRequestParameter('cnic'));
			$employee->setDob($this->getRequestParameter('dob'));
			$employee->setGender($this->getRequestParameter('gender[0]'));
			$employee->setContactCell($this->getRequestParameter('contact_cell'));
			$employee->setContactRes($this->getRequestParameter('contact_res'));
			$employee->setContactOff($this->getRequestParameter('contact_off'));
			$employee->setEmergencyContact($this->getRequestParameter('emergency_contact'));
			$employee->setMailAddress($this->getRequestParameter('mail_address'));
			$employee->setDesignationId($this->getRequestParameter('designation_id'));
			$employee->setDepartmentId($department_id);
			$employee->setEmploymentDate($this->getRequestParameter('employment_date'));
			$employee->setLocalResident($this->getRequestParameter('local[0]'));
			//$employee->setExperienceYear($this->getRequestParameter('experience_year'));
			$employee->setQualification($this->getRequestParameter('qualification'));
			$employee->setEmpCategory('doc');
			$employee->setStatus(Constant::RECORD_STATUS_ACTIVE);
			
			$employee->save();
			
			
			$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', Constant::REGISTRATION_ACCOUNT_APPROVAL );
			$this->redirect('Employee/list');
			
			/*if($user_name != NULL)
			{
				
				$user = new User();
				$user->setEmployeeId($employee_id);
				$user->setUser($user_name);
				$user->setPassword($password);
				$user->setStatus(Constant::RECORD_STATUS_ACTIVE);
				$user->save();
	
				// TODO: Default Rights here
				
			}// END if
				
			$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', Constant::REGISTRATION_ACCOUNT_APPROVAL );
			$this->redirect('Register/list');
			
			*/
		
		}// end IF

	
	} // - END - executeAdd
	
  public function executeAddStaff(sfWebRequest $request)
	{
	if ($request->isMethod('Post'))
		{
		
		/*Varialbes for Redirecting 
		$user_name = $this->getRequestParameter('user_name');
		$password = $this->getRequestParameter('password');
		
		if (strlen($password) != 0)
			{
			$password = md5($password);
			}
		
		else $password = '';*/
		
		// Setting Department from Selected Designation
		$a = new Criteria();
		$a->add (DesignationPeer::ID, $this->getRequestParameter('designation_id'));
		$designation_record = DesignationPeer::DoSelectOne($a);
		$department_id = $designation_record->getDepartmentId();
		
		// Checking if Entered Username already exist
		/*if($user_name != NULL)
		{
			$c = new Criteria ( );
			$c->add(UserPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL );
			$c->add(UserPeer::USER, $user_name);
			$check_username = UserPeer::doSelectOne($c);
			
			if ($check_username)
				{
				$this->getUser ()->setFlash ( 'ERROR_MESSAGE', 'Username Already exist. Please Choose Different Username.' );
				$this->redirect ('Register/add');
				}
		}*/
		
			$employee = new Employee();
			
			$employee->setRoleId($this->getRequestParameter('role_id'));
			$employee->setName($this->getRequestParameter('name'));
			$employee->setCnic($this->getRequestParameter('cnic'));
			$employee->setDob($this->getRequestParameter('dob'));
			$employee->setGender($this->getRequestParameter('gender[0]'));
			$employee->setContactCell($this->getRequestParameter('contact_cell'));
			$employee->setContactRes($this->getRequestParameter('contact_res'));
			$employee->setContactOff($this->getRequestParameter('contact_off'));
			$employee->setEmergencyContact($this->getRequestParameter('emergency_contact'));
			$employee->setMailAddress($this->getRequestParameter('mail_address'));
			$employee->setDesignationId($this->getRequestParameter('designation_id'));
			$employee->setDepartmentId($department_id);
			//$employee->setRoleId(2);
			$employee->setEmploymentDate($this->getRequestParameter('employment_date'));
			$employee->setLocalResident($this->getRequestParameter('local[0]'));
			$employee->setQualification($this->getRequestParameter('qualification'));
			$employee->setEmpCategory('staff');
			$employee->setStatus(Constant::RECORD_STATUS_ACTIVE);
			
			$employee->save();
			
			
			$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', Constant::REGISTRATION_ACCOUNT_APPROVAL );
			$this->redirect('Employee/list');
			
			/*if($user_name != NULL)
			{
				
				$user = new User();
				$user->setEmployeeId($employee_id);
				$user->setUser($user_name);
				$user->setPassword($password);
				$user->setStatus(Constant::RECORD_STATUS_ACTIVE);
				$user->save();
	
				// TODO: Default Rights here
				
			}// END if
				
			$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', Constant::REGISTRATION_ACCOUNT_APPROVAL );
			$this->redirect('Register/list');
			
			*/
		
		}// end IF

	
	} // - END - executeAdd
	
	public function executeEdit(sfWebRequest $request)
	{
	if ($request->isMethod('Post'))
	{
		$employee = EmployeePeer::retrieveByPk($this->getRequestParameter('employee_id'));
		
		
		// Setting Department from Selected Designation
		$a = new Criteria();
		$a->add (DesignationPeer::ID, $this->getRequestParameter('designation_id'));
		$designation_record = DesignationPeer::DoSelectOne($a);
		$department_id = $designation_record->getDepartmentId();
		
			
		$employee->setName($this->getRequestParameter('name'));
		$employee->setCnic($this->getRequestParameter('cnic'));
		$employee->setDob($this->getRequestParameter('dob'));
		$employee->setGender($this->getRequestParameter('gender[0]'));
		$employee->setContactCell($this->getRequestParameter('contact_cell'));
		$employee->setContactRes($this->getRequestParameter('contact_res'));
		$employee->setContactOff($this->getRequestParameter('contact_off'));
		$employee->setEmergencyContact($this->getRequestParameter('emergency_contact'));
		$employee->setMailAddress($this->getRequestParameter('mail_address'));
		$employee->setDesignationId($this->getRequestParameter('designation_id'));
		$employee->setDepartmentId($department_id);
		$employee->setEmploymentDate($this->getRequestParameter('employment_date'));
		$employee->setLocalResident($this->getRequestParameter('local[0]'));
		$employee->setQualification($this->getRequestParameter('qualification'));

	
			if($employee->save())
				{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
				}
			
			else
				{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				}
		
		$this->redirect ('Employee/list');
		
		}// end if

	else
	{
	
	$this->employee = EmployeePeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('employee')));
	
	} // end else
 } // - END - executeEdit	

public function executeDelete (sfWebRequest $request)
	{
		$user = EmployeePeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
		if($user)
		{
			$user->setStatus(Constant::RECORD_STATUS_DELETED);
			if(	$user->save())
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_STATUS_DELETED_SUCCESSFULLY);
			else
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);

		}
		else
		{
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::INVALID_REQUEST);
		}
	
		$this->redirect ('Employee/list');

	 } //- END - executeDelete

public function executeDetail(sfWebRequest $request)
	{
		$this->employee = EmployeePeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('employee')));
		
		$emp = EmployeePeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('employee')));
		$employee_id = $emp->getId();
		
		$c = new Criteria;
		$c->add(UserPeer::EMPLOYEE_ID, $employee_id);
		$this->user = UserPeer::doSelectOne($c);
	} // - END - executeDetail
	
public function executeGiveCredential(sfWebRequest $request)
	{
	if ($request->isMethod('Post'))
		{
			$password = md5($this->getRequestParameter('password'));
			
			$user = new User();
			$user->setEmployeeId($this->getRequestParameter('employee_id'));
			$user->setUser($this->getRequestParameter('user_name'));
			$user->setPassword($password);
			$user->setRoleId($this->getRequestParameter('role_id'));
			$user->setStatus(Constant::RECORD_STATUS_ACTIVE);
			
			$user->save();
			$this->getUser()->setFlash( 'SUCCESS_MESSAGE', 'Credentials Assigned Successfully.');
			$this->redirect('Employee/detail?employee='.Utility::EncryptQueryString($this->getRequestParameter('employee_id')));
			
		}
	else
		{
		$this->employee = EmployeePeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('employee')));
		}
	
	}// - END - exectueGiveCredentials


}// END class EmployeeActions