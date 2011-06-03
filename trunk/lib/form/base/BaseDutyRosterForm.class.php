<?php

/**
 * DutyRoster form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseDutyRosterForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'employee_id'   => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'duty_place_id' => new sfWidgetFormPropelChoice(array('model' => 'DutyPlace', 'add_empty' => true)),
      'duty_date'     => new sfWidgetFormDate(),
      'from'          => new sfWidgetFormInput(),
      'to'            => new sfWidgetFormInput(),
      'present'       => new sfWidgetFormInput(),
      'substitute_id' => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'status'        => new sfWidgetFormInput(),
      'created_at'    => new sfWidgetFormDate(),
      'updated_at'    => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'DutyRoster', 'column' => 'id', 'required' => false)),
      'employee_id'   => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
      'duty_place_id' => new sfValidatorPropelChoice(array('model' => 'DutyPlace', 'column' => 'id', 'required' => false)),
      'duty_date'     => new sfValidatorDate(array('required' => false)),
      'from'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'to'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'present'       => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'substitute_id' => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
      'status'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'    => new sfValidatorDate(array('required' => false)),
      'updated_at'    => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('duty_roster[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DutyRoster';
  }


}
