<?php

/**
 * Ward form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseWardForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'title'  => new sfWidgetFormInput(),
      'status' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorPropelChoice(array('model' => 'Ward', 'column' => 'id', 'required' => false)),
      'title'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ward[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ward';
  }


}
