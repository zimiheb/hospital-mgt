<?php

/**
 * Ward actions.
 *
 * @package    hospital
 * @subpackage Ward
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class WardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('Ward', 'list');
  }
  
  public function executeList()
	{
	  $c = new Criteria();
	  $c->add(WardPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	  $c->addAscendingOrderByColumn(WardPeer::TITLE);
	  $this->wards = WardPeer::doSelect ($c);
  } // - END - executeList 

public function executeAdd(sfWebRequest $request)
	{
  
  	if ($request->isMethod('Post'))
  	{
		
		$ward = new Ward();
		$ward->setTitle($request->getParameter('title'));
		//$ward->setDescription($request->getParameter('description'));
		$ward->setStatus(Constant::RECORD_STATUS_ACTIVE);
		
		$ward->save();
		
		
		$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_ADDED_SUCCESSFULLY);
		$this->redirect ('Ward/list');
	
	} //end if
 
  } // - END - executeAdd

public function executeEdit (sfWebRequest $request)
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			//Create User and set object attributes
			$ward = WardPeer::retrieveByPk($this->getRequestParameter('id'));

			$ward->setTitle($this->getRequestParameter('title'));
			//$ward->setDescription($this->getRequestParameter('description'));
			//$ward->setStatus($this->getRequestParameter('status'));
			
			//Save object to database
			if($ward->save())
			{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
				$this->redirect ('Ward/list');
			}
			else
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				$this->redirect('Ward/edit?id='.Utility::EncryptQueryString($request->getParameter('id')));
			}
		}

		else
		{
			
			//$this->AllDataAvailable();
			$this->ward = WardPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
			
		}
	} //- END - executeEdit

public function executeDelete (sfWebRequest $request)
	{

		$ward = WardPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));

		if($ward)
		{
			$ward->setStatus(Constant::RECORD_STATUS_DELETED);
			if(	$ward->save())
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_STATUS_DELETED_SUCCESSFULLY);
			else
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);

		}
		else
		{
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::INVALID_REQUEST);
		}
	
		$this->redirect ('Ward/list');

	} //- END - executeDelete
}
