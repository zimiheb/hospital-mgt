<?php

/**
 * Employee actions.
 *
 * @package    hospital
 * @subpackage Employee
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class EmployeeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeAddEmployee(sfWebRequest $request)
	{
	if ($request->isMethod('Post'))
		{
		
		// Varialbes for Redirecting 
		$user_name = $this->getRequestParameter('user_name');
		$password = $this->getRequestParameter('password');
		
		if (strlen($password) != 0)
			{
			$password = md5($password);
			}
		
		else $password = '';
		
		// Setting Department from Selected Designation
		$a = new Criteria();
		$a->add (DesignationPeer::ID, $this->getRequestParameter('designation_id'));
		$designation_record = DesignationPeer::DoSelectOne($a);
		$department_id = $designation_record->getDepartmentId();
		
		// Checking if Entered Username already exist
		if($user_name != NULL)
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
		}
		
			$employee = new Employee();
			
			$employee->setName($this->getRequestParameter('name'));
			$employee->setFatherName($this->getRequestParameter('father_name'));
			$employee->setCnic($this->getRequestParameter('cnic'));
			$employee->setDob($this->getRequestParameter('dob'));
			$employee->setBloodGroup($this->getRequestParameter('blood_group'));
			$employee->setDisease($this->getRequestParameter('disease'));
			$employee->setGender($this->getRequestParameter('gender[0]'));
			$employee->setContactCell($this->getRequestParameter('contact_cell'));
			$employee->setContactRes($this->getRequestParameter('contact_res'));
			$employee->setContactOff($this->getRequestParameter('contact_off'));
			$employee->setEmergencyContact($this->getRequestParameter('emergency_contact'));
			$employee->setMailAddress($this->getRequestParameter('mail_address'));
			$employee->setPermanentAddress($this->getRequestParameter('permanent_address'));
			$employee->setDesignationId($this->getRequestParameter('designation_id'));
			$employee->setDepartmentId($department_id);
			$employee->setRoleId(2);
			$employee->setBeltNo($this->getRequestParameter('belt_no'));
			$employee->setEmploymentDate($this->getRequestParameter('employment_date'));
			$employee->setLocalResident($this->getRequestParameter('local[0]'));
			$employee->setExperienceYear($this->getRequestParameter('experience_year'));
			$employee->setQualification($this->getRequestParameter('qualification'));
			$employee->setStatus(Constant::RECORD_STATUS_ACTIVE);
			
			$employee->save();
			
			$employee_id = $employee->getId();
			
			if($user_name != NULL)
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
			
			
		
		}// end IF

	
} // - END - executeAdd
  
}
