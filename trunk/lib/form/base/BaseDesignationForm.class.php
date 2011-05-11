<?php

/**
 * Designation form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseDesignationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'department_id' => new sfWidgetFormPropelChoice(array('model' => 'Department', 'add_empty' => true)),
      'title'         => new sfWidgetFormInput(),
      'status'        => new sfWidgetFormInput(),
      'created_at'    => new sfWidgetFormDate(),
      'updated_at'    => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'Designation', 'column' => 'id', 'required' => false)),
      'department_id' => new sfValidatorPropelChoice(array('model' => 'Department', 'column' => 'id', 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 100)),
      'status'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'    => new sfValidatorDate(array('required' => false)),
      'updated_at'    => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('designation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Designation';
  }


}
