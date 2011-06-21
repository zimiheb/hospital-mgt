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
	$c->add(VisitPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	$c->add(VisitPeer::VISIT_DATE, date('Y-m-d'));
	$c->addAscendingOrderByColumn(VisitPeer::ID);
	$this->visits = VisitPeer::doSelect($c);
  } // -- END executeDocList
  
  public function executeCheckup(sfWebRequest $request)
  {
  	if ($request->isMethod('POST'))
	{
	
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

	}
  }// -- END executecheckup



}
