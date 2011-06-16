<?php

/**
 * FrontDesk actions.
 *
 * @package    hospital
 * @subpackage FrontDesk
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class FrontDeskActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  } // -- END executeIndex
  
  public function executeDutyRoster(sfWebRequest $request)
  {
    $c = new Criteria();
	$c->add(DutyRosterPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	$c->add(DutyRosterPeer::DUTY_DATE, date('Y-m-d'));
	$c->addAscendingOrderByColumn(DutyRosterPeer::EMPLOYEE_ID);
	$this->dutys = DutyRosterPeer::doSelect($c);
	
  } // -- END executeDutyRoster
  
  public function executeAddDuty(sfWebRequest $request)
  {
    if ($request->isMethod('POST'))
	{
		$duty = new DutyRoster();
		
		$duty->setEmployeeId($this->getRequestParameter('employee_id'));
		$duty->setDutyPlaceId($this->getRequestParameter('duty_place_id'));
		$duty->setDutyDate($this->getRequestParameter('duty_date'));
		$duty->setFrom($this->getRequestParameter('from'));
		$duty->setTo($this->getRequestParameter('to'));
		$duty->setSubstituteId($this->getRequestParameter('substitute_id'));
		$duty->setStatus(Constant::RECORD_STATUS_ACTIVE);
		
		$duty->save();
		
		$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', 'Duty for the Staff Member assigned Successfully.' );
		$this->redirect('FrontDesk/dutyRoster');
	}
  } // -- END executeAddDuty
  
  public function executeEditDuty (sfWebRequest $request)
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			//Create User and set object attributes
			$duty = DutyRosterPeer::retrieveByPk($this->getRequestParameter('id'));

			$duty->setEmployeeId($this->getRequestParameter('employee_id'));
			$duty->setDutyPlaceId($this->getRequestParameter('duty_place_id'));
			$duty->setDutyDate($this->getRequestParameter('duty_date'));
			$duty->setFrom($this->getRequestParameter('from'));
			$duty->setTo($this->getRequestParameter('to'));
			$duty->setSubstituteId($this->getRequestParameter('substitute_id'));
			//Save object to database
			if($duty->save())
			{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
			$this->redirect ('FrontDesk/dutyRoster');
			}
			else
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				$this->redirect('FrontDesk/editduty?id='.Utility::EncryptQueryString($request->getParameter('id')));
			}
		}

		else
		{
			$this->duty = DutyRosterPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
		}
	} //- END - executeEditDuty
  
  
  public function executeDeleteDuty (sfWebRequest $request)
	{

		$duty = DutyRosterPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));

		if($duty)
		{
			$duty->setStatus(Constant::RECORD_STATUS_DELETED);
			if(	$duty->save())
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_STATUS_DELETED_SUCCESSFULLY);
			else
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);

		}
		else
		{
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::INVALID_REQUEST);
		}
	
		$this->redirect ('FrontDesk/dutyRoster');

	} //- END - executeDelete
	
public function executeVisitList(sfWebRequest $request)
  {
    $c = new Criteria();
	$c->add(VisitPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	$c->add(VisitPeer::VISIT_DATE, date('Y-m-d'));
	$c->addAscendingOrderByColumn(VisitPeer::ID);
	$this->visits = VisitPeer::doSelect($c);
	
	
  } // -- END executeVisitList
  
  public function executeSearchPatient(sfWebRequest $request)
  {
    //$patient_id = $this->getRequestParameter('id');
	$patient_name = $this->getRequestParameter('name');
	
    $c = new Criteria();
		//$c->add(PatientPeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
		/*$c1 = $c->getNewCriterion(PatientPeer::NAME, '%'.$patient_name.'%' , Criteria::LIKE);
		$c2 = $c->getNewCriterion(PatientPeer::ID, $patient_id, Criteria::EQUAL);
		$c1->addOr($c2);
		$c->add($c1);*/
		$c->add(PatientPeer::NAME, '%'.$patient_name.'%' , Criteria::LIKE);
		$this->patients = PatientPeer::doSelect($c);
	
  } // -- END executeVisitList
  
  public function executeVisitAdd(sfWebRequest $request)
  {
    if ($request->isMethod('POST'))
	{
		$visit = new Visit();
		
		$visit->setPatientId($this->getRequestParameter('patient_id'));
		$visit->setDoctorId($this->getRequestParameter('doctor_id'));
		$visit->setWardDocId($this->getRequestParameter('ward_doc_id'));
		$visit->setVisitDate($this->getRequestParameter('visit_date'));
		$visit->setTime($this->getRequestParameter('time'));
		$visit->setVisitType($this->getRequestParameter('visit_type'));
		//$duty->setSubstituteId($this->getRequestParameter('substitute_id'));
		$visit->setStatus(Constant::RECORD_STATUS_ACTIVE);
		
		$visit->save();
		
		$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', 'Visit to Doctor added Successfully.' );
		$this->redirect('FrontDesk/visitList');
	}
	
	else
	{
	$this->patient = PatientPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('patient')));
	}
  } // -- END executeAddDuty


} // END Class
