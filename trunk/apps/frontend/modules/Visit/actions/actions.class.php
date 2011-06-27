<?php

/**
 * Visit actions.
 *
 * @package    hospital
 * @subpackage Visit
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class VisitActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
  
  public function executeDocList(sfWebRequest $request)
  {
    $c = new Criteria();
	$c->add(VisitPeer::STATUS, Constant::VISIT_PENDING);
	$c->add(VisitPeer::VISIT_DATE, date('Y-m-d'));
	$c->addAscendingOrderByColumn(VisitPeer::ID);
	$this->visits = VisitPeer::doSelect($c);
  } // -- END executeDocList
  
  public function executeCheckup(sfWebRequest $request)
  {
  	if ($request->isMethod('POST'))
	{
		$visit_id = $this->getRequestParameter('visit_id');
		$patient_id = $this->getRequestParameter('patient_id');
		$meds = $this->getRequestParameter('med');
		$dose = $this->getRequestParameter('med');
		$quantity = $this->getRequestParameter('quantity');
		$tests = $this->getRequestParameter('test');
		
		$total_cost = 0;
		
		//Saving Medicines for Current Visit
		foreach($meds as $i => $med)
		{
			$pharma = PharmaPeer::retrieveByPk($med[0]);
			$med_price = $pharma->getPrice();
			
			$visit_med = new VisitMedicine();
			
			$visit_med->setPatientId($patient_id);
			$visit_med->setVisitId($visit_id);
			$visit_med->setPharmaId($med[0]);
			$visit_med->setDosageId($dose[$i]);
			$visit_med->setQuantity($quantity[$i]);
			$visit_med->setPrice($quantity[$i]*$med_price);
			$visit_med->save();
			
			$total_cost = ($quantity[$i]*$med_price) + $total_cost;
		}
		
		foreach($tests as $j => $test)
		{
			$lab_test = LabTestPeer::retrieveByPk($test[0]);
			$test_price = $lab_test->getPrice();
			
			$visit_test = new LabReport();
			
			$visit_test->setPatientId($patient_id);
			$visit_test->setVisitId($visit_id);
			$visit_test->setLabTestId($test[0]);
			$visit_test->setPrice($test_price);
			$visit_test->save();
			
			$total_cost =  $test_price + $total_cost;
		}
		
		// Saving Visit Details
		/*echo '<pre>';
		print_r($visit = VisitPeer::retrieveByPk($visit_id));
		echo '</pre>';
		
		echo $this->getRequestParameter('bp');
		echo $this->getRequestParameter('pulse');
		echo $this->getRequestParameter('temp');*/
		
		$visit = VisitPeer::retrieveByPk($visit_id);
		$doc_id = $visit->getDoctorId();
		$doc = EmployeePeer::retrieveByPk($doc_id);
		$doc_fee = $doc->getVisitFee();
		
		$total_cost = $total_cost + $doc_fee;
		
		$visit->setBp($this->getRequestParameter('bp'));
		$visit->setPulse($this->getRequestParameter('pulse'));
		$visit->setTemp($this->getRequestParameter('temp'));
		$visit->setDiet($this->getRequestParameter('diet'));
		$visit->setDescription($this->getRequestParameter('description'));
		$visit->setFee($total_cost);
		$visit->setFeePaid(Constant::VISIT_FEE_NOT_PAID);
		$visit->setStatus(Constant::VISIT_DONE);
		$visit->save();
		
		$this->getUser()->setFlash('SUCCESS_MESSAGE', 'Patient Visit saves Successfully');
		$this->redirect ('Visit/docList');
	}
	
	else
	{
	$patient_id = Utility::DecryptQueryString($request->getParameter('patient'));
	$visit_id = Utility::DecryptQueryString($request->getParameter('visit'));
	
	$this->patient = PatientPeer::retrieveByPk($patient_id);
	$this->visit = VisitPeer::retrieveByPk($visit_id);

	$c = new Criteria();
	$c->add(PharmaPeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	$c->addAscendingOrderByColumn(PharmaPeer::NAME);
	$this->medicines = PharmaPeer::doSelect($c);
	
	$d = new Criteria();
	$d->add(LabTestPeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	$d->addAscendingOrderByColumn(LabTestPeer::TITLE);
	$this->tests = LabTestPeer::doSelect($d);

	}
  }// -- END executecheckup



}
