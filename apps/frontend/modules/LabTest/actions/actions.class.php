<?php

/**
 * LabTest actions.
 *
 * @package    itp
 * @subpackage LabTest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class LabTestActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('LabTest', 'list');
  }
  
public function executeList()
	{
	  $c = new Criteria();
	  $c->add(LabTestPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	  $c->addAscendingOrderByColumn(LabTestPeer::TITLE);
	  $this->lab_tests = LabTestPeer::doSelect ($c);
  } // - END - executeList 

public function executeAdd(sfWebRequest $request)
	{
  
  	if ($request->isMethod('Post'))
  	{
		
		$lab_test = new LabTest();
		$lab_test->setTitle($request->getParameter('title'));
		$lab_test->setStatus(Constant::RECORD_STATUS_ACTIVE);
		
		$lab_test->save();
		
		
		$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_ADDED_SUCCESSFULLY);
		$this->redirect ('LabTest/list');
	
	} //end if
 
  } // - END - executeAdd

public function executeEdit (sfWebRequest $request)
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			//Create User and set object attributes
			$lab_test = LabTestPeer::retrieveByPk($this->getRequestParameter('id'));

			$lab_test->setTitle($this->getRequestParameter('title'));
			$lab_test->setDescription($this->getRequestParameter('description'));
			//$department->setStatus($this->getRequestParameter('status'));
			
			//Save object to database
			if($lab_test->save())
			{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
				$this->redirect ('LabTest/list');
			}
			else
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				$this->redirect('LabTest/edit?id='.Utility::EncryptQueryString($request->getParameter('id')));
			}
		}

		else
		{
			
			//$this->AllDataAvailable();
			$this->lab_test = LabTestPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
			
		}
	} //- END - executeEdit

public function executeDelete (sfWebRequest $request)
	{

		$lab_test = LabTestPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));

		if($lab_test)
		{
			$lab_test->setStatus(Constant::RECORD_STATUS_DELETED);
			if(	$lab_test->save())
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_STATUS_DELETED_SUCCESSFULLY);
			else
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);

		}
		else
		{
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::INVALID_REQUEST);
		}
	
		$this->redirect ('LabTest/list');

	} //- END - executeDelete
}
