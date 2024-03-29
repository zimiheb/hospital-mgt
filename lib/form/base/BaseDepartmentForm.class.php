<?php

/**
 * Department form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseDepartmentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'title'      => new sfWidgetFormInput(),
      'status'     => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Department', 'column' => 'id', 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'status'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('department[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Department';
  }


}
