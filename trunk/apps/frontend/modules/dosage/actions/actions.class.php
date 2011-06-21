<?php

/**
 * Dosage actions.
 *
 * @package    itp
 * @subpackage Dosage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class DosageActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('Dosage', 'list');
  }
  
public function executeList()
	{
	  $c = new Criteria();
	  $c->add(DosagePeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	  $c->addAscendingOrderByColumn(DosagePeer::TITLE);
	  $this->dosages = DosagePeer::doSelect ($c);
  } // - END - executeList 

public function executeAdd(sfWebRequest $request)
	{
  
  	if ($request->isMethod('Post'))
  	{
		
		$dosage = new Dosage();
		$dosage->setTitle($request->getParameter('title'));
		
		$dosage->setStatus(Constant::RECORD_STATUS_ACTIVE);
		
		$dosage->save();
		
		
		$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_ADDED_SUCCESSFULLY);
		$this->redirect ('Dosage/list');
	
	} //end if
 
  } // - END - executeAdd

public function executeEdit (sfWebRequest $request)
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			//Create User and set object attributes
			$dosage = DosagePeer::retrieveByPk($this->getRequestParameter('id'));

			$dosage->setTitle($this->getRequestParameter('title'));
			
			
			//Save object to database
			if($dosage->save())
			{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
				$this->redirect ('Dosage/list');
			}
			else
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				$this->redirect('Dosage/edit?id='.Utility::EncryptQueryString($request->getParameter('id')));
			}
		}

		else
		{
			
			
			$this->dosage = DosagePeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
			
		}
	} //- END - executeEdit

public function executeDelete (sfWebRequest $request)
	{

		$dosage = DosagePeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));

		if($dosage)
		{
			$dosage->setStatus(Constant::RECORD_STATUS_DELETED);
			if(	$dosage->save())
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_STATUS_DELETED_SUCCESSFULLY);
			else
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);

		}
		else
		{
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::INVALID_REQUEST);
		}
	
		$this->redirect ('Dosage/list');

	} //- END - executeDelete
}
