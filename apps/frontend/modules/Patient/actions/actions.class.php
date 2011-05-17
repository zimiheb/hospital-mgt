<?php
class PatientActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
  
  public function executeList()
	{
		$c = new Criteria();
		$c->add(PatientPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
		//$c->addAscendingOrderByColumn(OffencePeer::SERIAL);
		$pager = new sfPropelPager('Patient', 20);
		$pager->setCriteria($c);
		$pager->setPage($this->getRequestParameter('page'));
		$pager->init();
		$this->pager = $pager;
		//$this->offences = OffencePeer::doSelect ($c);
  } // END - executeList
  
  public function executeAddPatient(sfWebRequest $request)
	{
	if ($request->isMethod('Post'))
		{
			/*$a = new Criteria();
			$designation_record = DesignationPeer::DoSelectOne($a);
			$department_id = $designation_record->getDepartmentId();*/

			$patient = new Patient();
			
			$dob = $this->getRequestParameter('dob[year]').'-'.$this->getRequestParameter('dob[month]').'-'.$this->getRequestParameter('dob[day]'); 
			
			$patient->setName($this->getRequestParameter('name'));
			$patient->setCnic($this->getRequestParameter('cnic'));
			$patient->setDob($dob);
			$patient->setGender($this->getRequestParameter('gender[0]'));
			$patient->setContactCell($this->getRequestParameter('contact_cell'));
			$patient->setStatus(Constant::RECORD_STATUS_ACTIVE);
			
			$patient->save();
			
			
			$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', 'Patient Added Successfully' );
			$this->redirect('Patient/list');
		} // end if
	} // END -  executeAddPatient
	
	public function executeEdit(sfWebRequest $request)
	{
	if ($request->isMethod('Post'))
	{
		$patient = PatientPeer::retrieveByPk($this->getRequestParameter('patient_id'));
		
		
		// Setting Department from Selected Designation
		$a = new Criteria();
		$a->add (DesignationPeer::ID, $this->getRequestParameter('designation_id'));
		$designation_record = DesignationPeer::DoSelectOne($a);
		$department_id = $designation_record->getDepartmentId();
		
			
		$patient->setName($this->getRequestParameter('name'));
		$patient->setCnic($this->getRequestParameter('cnic'));
		$patient->setDob($this->getRequestParameter('dob'));
		$patient->setGender($this->getRequestParameter('gender[0]'));
		$patient->setContactCell($this->getRequestParameter('contact_cell'));
		$patient->setContactRes($this->getRequestParameter('contact_res'));
		$patient->setContactOff($this->getRequestParameter('contact_off'));
		$patient->setEmergencyContact($this->getRequestParameter('emergency_contact'));
		$patient->setMailAddress($this->getRequestParameter('mail_address'));
		$patient->setDesignationId($this->getRequestParameter('designation_id'));
		$patient->setDepartmentId($department_id);
		$patient->setEmploymentDate($this->getRequestParameter('employment_date'));
		$patient->setLocalResident($this->getRequestParameter('local[0]'));
		$patient->setQualification($this->getRequestParameter('qualification'));

	
			if($patient->save())
				{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
				}
			
			else
				{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				}
		
		$this->redirect ('Patient/list');
		
		}// end if

	else
	{
	
	$this->patient = PatientPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
	
/*	$this->region_id = Utility::DecryptQueryString($request->getParameter('region'));
	$this->office_id = Utility::DecryptQueryString($request->getParameter('office'));
	$this->partner_id = Utility::DecryptQueryString($request->getParameter('partner'));
*/			
	} // end else
	 } // - END - executeEdit	
	
	public function executeDelete (sfWebRequest $request)
	{

		$user = PatientPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
			
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
	
		$this->redirect ('Patient/list');

	 } //- END - executeDelete

public function executeDetail(sfWebRequest $request)
	{
		$this->patient = PatientPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('patient')));
		
	} // - END - executeDetail


}
