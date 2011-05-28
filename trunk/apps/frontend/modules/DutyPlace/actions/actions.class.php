<?php

/**
 * DutyPlace actions.
 *
 * @package    itp
 * @subpackage DutyPlace
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class DutyPlaceActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('DutyPlace', 'list');
  }
  
public function executeList()
	{
	  $c = new Criteria();
	  $c->add(DutyPlacePeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	  $c->addAscendingOrderByColumn(DutyPlacePeer::TITLE);
	  $this->duty_places = DutyPlacePeer::doSelect ($c);
  } // - END - executeList 

public function executeAdd(sfWebRequest $request)
	{
  
  	if ($request->isMethod('Post'))
  	{
		
		$duty_place = new DutyPlace();
		$duty_place->setTitle($request->getParameter('title'));
		$duty_place->setStatus(Constant::RECORD_STATUS_ACTIVE);
		
		$duty_place->save();
		
		
		$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_ADDED_SUCCESSFULLY);
		$this->redirect ('DutyPlace/list');
	
	} //end if
 
  } // - END - executeAdd

public function executeEdit (sfWebRequest $request)
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			//Create User and set object attributes
			$duty_place = DutyPlacePeer::retrieveByPk($this->getRequestParameter('id'));

			$duty_place->setTitle($this->getRequestParameter('title'));
			$duty_place->setDescription($this->getRequestParameter('description'));
			//$department->setStatus($this->getRequestParameter('status'));
			
			//Save object to database
			if($duty_place->save())
			{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
				$this->redirect ('DutyPlace/list');
			}
			else
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				$this->redirect('DutyPlace/edit?id='.Utility::EncryptQueryString($request->getParameter('id')));
			}
		}

		else
		{
			
			//$this->AllDataAvailable();
			$this->duty_place = DutyPlacePeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
			
		}
	} //- END - executeEdit

public function executeDelete (sfWebRequest $request)
	{

		$duty_place = DutyPlacePeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));

		if($duty_place)
		{
			$duty_place->setStatus(Constant::RECORD_STATUS_DELETED);
			if(	$duty_place->save())
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_STATUS_DELETED_SUCCESSFULLY);
			else
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);

		}
		else
		{
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::INVALID_REQUEST);
		}
	
		$this->redirect ('DutyPlace/list');

	} //- END - executeDelete
}
