<?php

class WardBedActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('WardBed', 'list');
  } // END executeIndex
  
  public function executeList()
  {
	  $c = new Criteria();
	  //$c->add(WardBedPeer::TITLE, 'None', Criteria::NOT_EQUAL);
	  $c->add(WardBedPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	  $c->addAscendingOrderByColumn(WardBedPeer::WARD_ID);
	  $c->addAscendingOrderByColumn(WardBedPeer::BED);
	  $this->beds = WardBedPeer::doSelect ($c);
  } // - END - executeList 

public function executeAdd(sfWebRequest $request)
  {
  
  	if ($request->isMethod('Post'))
  	{
		$ward_id = $this->getRequestParameter('ward_id');
		
		if (!$ward_id)
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', 'Ward cannot be empty, please Add New Ward');
				$this->redirect ('WardBed/list');
			}
		else
			{
			$bed = new WardBed();
			
			$bed->setWardId($this->getRequestParameter('ward_id'));
			$bed->setBed($this->getRequestParameter('bed'));
			//$bed->setDescription($this->getRequestParameter('description'));
			$bed->setStatus(Constant::RECORD_STATUS_ACTIVE);
			
			$bed->save();
			
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_ADDED_SUCCESSFULLY);
			$this->redirect ('WardBed/list');
			}
	
	} //end if
 
  } // - END - executeAdd
  
 
  

public function executeEdit (sfWebRequest $request)
	{

		//$this->response->setBed(Constant::TITLE_EDIT_QUESTION   );
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			//Create User and set object attributes
			$bed = WardBedPeer::retrieveByPk($this->getRequestParameter('id'));

			$bed->setWardId($this->getRequestParameter('ward_id'));
			$bed->setBed($this->getRequestParameter('bed'));
			//$bed->setDescription($this->getRequestParameter('description'));
			//$bed->setStatus($this->getRequestParameter('status'));
			
			//Save object to database
			if($bed->save())
			{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
			$this->redirect ('WardBed/list');
			}
			else
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				$this->redirect('WardBed/edit?id='.Utility::EncryptQueryString($request->getParameter('id')));
			}
		}

		else
		{
			$this->bed = WardBedPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
			
		}
	} //- END - executeEdit
  
public function executeDelete (sfWebRequest $request)
	{
		$bed = WardBedPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));

		if($bed)
		{
			$bed->setStatus(Constant::RECORD_STATUS_DELETED);
			if(	$bed->save())
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_STATUS_DELETED_SUCCESSFULLY);
			else
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
		}
		else
		{
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::INVALID_REQUEST);
		}
	
		$this->redirect ('WardBed/list');

	} //- END - executeDelete
  
}
