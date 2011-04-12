<?php

/**
 * Department actions.
 *
 * @package    itp
 * @subpackage Department
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class DepartmentActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('Department', 'list');
  }
  
public function executeList()
	{
	  $c = new Criteria();
	  $c->add(DepartmentPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	  $c->addAscendingOrderByColumn(DepartmentPeer::TITLE);
	  $this->departments = DepartmentPeer::doSelect ($c);
  } // - END - executeList 

public function executeAdd(sfWebRequest $request)
	{
  
  	if ($request->isMethod('Post'))
  	{
		
		$department = new Department();
		$department->setTitle($request->getParameter('title'));
		//$department->setDescription($request->getParameter('description'));
		$department->setStatus(Constant::RECORD_STATUS_ACTIVE);
		
		$department->save();
		
		
		$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_ADDED_SUCCESSFULLY);
		$this->redirect ('Department/list');
	
	} //end if
 
  } // - END - executeAdd

public function executeEdit (sfWebRequest $request)
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			//Create User and set object attributes
			$department = DepartmentPeer::retrieveByPk($this->getRequestParameter('id'));

			$department->setTitle($this->getRequestParameter('title'));
			//$department->setDescription($this->getRequestParameter('description'));
			//$department->setStatus($this->getRequestParameter('status'));
			
			//Save object to database
			if($department->save())
			{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
				$this->redirect ('Department/list');
			}
			else
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				$this->redirect('Department/edit?id='.Utility::EncryptQueryString($request->getParameter('id')));
			}
		}

		else
		{
			
			//$this->AllDataAvailable();
			$this->department = DepartmentPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
			
		}
	} //- END - executeEdit

public function executeDelete (sfWebRequest $request)
	{

		$department = DepartmentPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));

		if($department)
		{
			$department->setStatus(Constant::RECORD_STATUS_DELETED);
			if(	$department->save())
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_STATUS_DELETED_SUCCESSFULLY);
			else
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);

		}
		else
		{
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::INVALID_REQUEST);
		}
	
		$this->redirect ('Department/list');

	} //- END - executeDelete
}
