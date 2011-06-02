<?php

/**
 * default actions.
 *
 * @package    dil
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class defaultActions extends sfActions
{

public function executeIndex(sfWebRequest $request) {
	$this->redirect ('Login/index'); 
	}

public function executeLogin (sfWebRequest $request) {
	$this->redirect ('Login/index');
	}

public function executeModule (sfWebRequest $request) {
	$this->redirect ('Home/index');
	}
	

}
