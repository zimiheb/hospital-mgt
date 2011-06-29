<?php

/**
 * LabReport actions.
 *
 * @package    hospital
 * @subpackage LabReport
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class LabReportActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('LabReport', 'list');
  }
  
  public function executeList()
	{
	  $c = new Criteria();
	  $c->add(LabReportPeer::STATUS, Constant::RECORD_STATUS_ACTIVE);
	  $c->addAscendingOrderByColumn(LabReportPeer::VISIT_ID);
	  $this->lab_tests = LabReportPeer::doSelect ($c);
  } // - END - executeList 

public function executeAdd(sfWebRequest $request)
  {
    if ($request->isMethod('POST'))
		{
		$report = LabReportPeer::retrieveByPk($this->getRequestParameter('report_id'));
		
		$report->setDescription($this->getRequestParameter('description'));
		$report->setStatus(Constant::RECORD_STATUS_DEACTIVE);
		
		$report->save();
		
		$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', 'Lab Report Added Successfully.' );
		$this->redirect('LabReport/list');
		}
	else
		{
		$this->report = LabReportPeer::retrieveByPk(Utility::DecryptQueryString($this->getRequestParameter('report')));
		}
  } //END executeAdd
  
public function executeEdit(sfWebRequest $request)
  {
    if ($request->isMethod('POST'))
		{
		$report = LabReportPeer::retrieveByPk($this->getRequestParameter('report_id'));
		$report->setDescription($this->getRequestParameter('description'));
		$report->save();
		
		$this->getUser ()->setFlash ( 'SUCCESS_MESSAGE', 'Lab Report editted Successfully.' );
		$this->redirect('LabReport/list');
		}
	else
		{
		print_r($this->report = LabReportPeer::retrieveByPk(Utility::DecryptQueryString($this->getRequestParameter('report'))));
		}
  } //END executeEdit

public function executePreviousReport(sfWebRequest $request)
  {
    if($request->isMethod('POST'))
		{
		
		$this->flag = true;
		$visit_date = $this->getRequestParameter('visit_date');
		
		$c = new Criteria();
		//$c->add(LabReportPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
		$c->add(LabReportPeer::CREATED_AT, $visit_date);
		$c->addAscendingOrderByColumn(LabReportPeer::ID);
		$this->reports = LabReportPeer::doSelect($c);
		}
	else
		{
		$this->flag = false;
		}// end else
  } // -- END executeVisitList

} // END Class
