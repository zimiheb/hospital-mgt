<?php

/**
 * User form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'role_id'     => new sfWidgetFormInput(),
      'employee_id' => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'user'        => new sfWidgetFormInput(),
      'password'    => new sfWidgetFormInput(),
      'status'      => new sfWidgetFormInput(),
      'created_at'  => new sfWidgetFormDate(),
      'updated_at'  => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id', 'required' => false)),
      'role_id'     => new sfValidatorInteger(array('required' => false)),
      'employee_id' => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
      'user'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'password'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'status'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'  => new sfValidatorDate(array('required' => false)),
      'updated_at'  => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }


}
