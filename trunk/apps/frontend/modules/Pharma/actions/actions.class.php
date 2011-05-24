<?php

class PharmaActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('Pharma', 'list');
  }
  
  public function executeList()
	{
	  $c = new Criteria();
	  $c->add(PharmaPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	  $c->addAscendingOrderByColumn(PharmaPeer::NAME);
	  $this->pharmas = PharmaPeer::doSelect ($c);
  } // - END - executeList 
  
  public function executeAdd(sfWebRequest $request)
	{
  
  	if ($request->isMethod('Post'))
  	{
		$pharma = new Pharma();
		$pharma->setName($request->getParameter('name'));
		$pharma->setStrength($request->getParameter('strength'));
		$pharma->setCompany($request->getParameter('company'));
		$pharma->setStatus(Constant::RECORD_STATUS_ACTIVE);
		
		$pharma->save();
		
		
		$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_ADDED_SUCCESSFULLY);
		$this->redirect ('Pharma/list');
	
	} //end if
 
  } // - END - executeAdd
  
  public function executeEdit (sfWebRequest $request)
	{
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$pharma = PharmaPeer::retrieveByPk($this->getRequestParameter('id'));

			$pharma->setName($request->getParameter('name'));
			$pharma->setStrength($request->getParameter('strength'));
			$pharma->setCompany($request->getParameter('company'));
			
			if($pharma->save())
			{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
				$this->redirect ('Pharma/list');
			}
			else
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				$this->redirect('Pharma/edit?id='.Utility::EncryptQueryString($request->getParameter('id')));
			}
		}

		else
		{
			
			//$this->AllDataAvailable();
			$this->pharma = PharmaPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
			
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
