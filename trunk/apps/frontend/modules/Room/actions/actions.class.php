<?php

/**
 * Room actions.
 *
 * @package    itp
 * @subpackage Room
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class RoomActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('Room', 'list');
  } 
  
public function executeList()
	{
	  $c = new Criteria();
	  $c->add(RoomPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	  $c->addAscendingOrderByColumn(RoomPeer::TITLE);
	  $this->rooms = RoomPeer::doSelect ($c);
  }

public function executeAdd(sfWebRequest $request)
	{
  
  	if ($request->isMethod('Post'))
  	{
		
		$room = new Room();
		$room->setTitle($request->getParameter('title'));
		$room->setStatus(Constant::RECORD_STATUS_ACTIVE);
		
		$room->save();
		
		
		$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_ADDED_SUCCESSFULLY);
		$this->redirect ('Room/list');
	
	} //end if
 
  } // - END - executeAdd

public function executeEdit (sfWebRequest $request)
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			//Create User and set object attributes
			$room = RoomPeer::retrieveByPk($this->getRequestParameter('id'));

			$room->setTitle($this->getRequestParameter('title'));
			$room->setDescription($this->getRequestParameter('description'));
			//$department->setStatus($this->getRequestParameter('status'));
			
			//Save object to database
			if($room->save())
			{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
				$this->redirect ('Room/list');
			}
			else
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				$this->redirect('Room/edit?id='.Utility::EncryptQueryString($request->getParameter('id')));
			}
		}

		else
		{
			
			//$this->AllDataAvailable();
			$this->room = RoomPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
			
		}
	} //- END - executeEdit

public function executeDelete (sfWebRequest $request)
	{

		$room = RoomPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));

		if($room)
		{
			$room->setStatus(Constant::RECORD_STATUS_DELETED);
			if(	$room->save())
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_STATUS_DELETED_SUCCESSFULLY);
			else
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);

		}
		else
		{
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::INVALID_REQUEST);
		}
	
		$this->redirect ('Room/list');

	} //- END - executeDelete
}
