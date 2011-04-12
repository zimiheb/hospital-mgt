<?php

/**
 * Designation actions.
 *
 * @package    itp
 * @subpackage Designation
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class DesignationActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  } // END executeIndex
  
  public function executeList()
  {
	  $c = new Criteria();
	  //$c->add(DesignationPeer::TITLE, 'None', Criteria::NOT_EQUAL);
	  $c->add(DesignationPeer::STATUS, Constant::RECORD_STATUS_DELETED, Criteria::NOT_EQUAL);
	  $c->addAscendingOrderByColumn(DesignationPeer::DEPARTMENT_ID);
	  $c->addAscendingOrderByColumn(DesignationPeer::TITLE);
	  $this->designations = DesignationPeer::doSelect ($c);
  } // - END - executeList 

public function executeAdd(sfWebRequest $request)
  {
  
  	if ($request->isMethod('Post'))
  	{
		$department_id = $this->getRequestParameter('department_id');
		
		if (!$department_id)
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', 'Department cannot be empty, please Add New Department');
				$this->redirect ('Designation/list');
			}
		else
			{
			$designation = new Designation();
			
			$designation->setDepartmentId($this->getRequestParameter('department_id'));
			$designation->setTitle($this->getRequestParameter('title'));
			//$designation->setDescription($this->getRequestParameter('description'));
			$designation->setStatus(Constant::RECORD_STATUS_ACTIVE);
			
			$designation->save();
			
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_ADDED_SUCCESSFULLY);
			$this->redirect ('Designation/list');
			}
	
	} //end if
 
  } // - END - executeAdd
  
 
  

public function executeEdit (sfWebRequest $request)
	{

		//$this->response->setTitle(Constant::TITLE_EDIT_QUESTION   );
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			//Create User and set object attributes
			$designation = DesignationPeer::retrieveByPk($this->getRequestParameter('id'));

			$designation->setDepartmentId($this->getRequestParameter('department_id'));
			$designation->setTitle($this->getRequestParameter('title'));
			//$designation->setDescription($this->getRequestParameter('description'));
			//$designation->setStatus($this->getRequestParameter('status'));
			
			//Save object to database
			if($designation->save())
			{
				$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_EDITED_SUCCESSFULLY);
			$this->redirect ('Designation/list');
			}
			else
			{
				$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);
				$this->redirect('Designation/edit?id='.Utility::EncryptQueryString($request->getParameter('id')));
			}
		}

		else
		{
			
			//$this->AllDataAvailable();
			$this->designation = DesignationPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));
			
		}
	} //- END - executeEdit
  
public function executeDelete (sfWebRequest $request)
	{

		$designation = DesignationPeer::retrieveByPk(Utility::DecryptQueryString($request->getParameter('id')));

		if($designation)
		{
			$designation->setStatus(Constant::RECORD_STATUS_DELETED);
			if(	$designation->save())
			$this->getUser()->setFlash('SUCCESS_MESSAGE', Constant::RECORD_STATUS_DELETED_SUCCESSFULLY);
			else
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::DB_ERROR);

		}
		else
		{
			$this->getUser()->setFlash('ERROR_MESSAGE', Constant::INVALID_REQUEST);
		}
	
		$this->redirect ('Designation/list');

	} //- END - executeDelete

  
}// END DesignationActions
