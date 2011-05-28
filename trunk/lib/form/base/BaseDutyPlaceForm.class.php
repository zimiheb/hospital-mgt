<?php

/**
 * DutyPlace form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseDutyPlaceForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'title'       => new sfWidgetFormInput(),
      'description' => new sfWidgetFormInput(),
      'status'      => new sfWidgetFormInput(),
      'created_at'  => new sfWidgetFormDate(),
      'updated_at'  => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'DutyPlace', 'column' => 'id', 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'  => new sfValidatorDate(array('required' => false)),
      'updated_at'  => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('duty_place[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DutyPlace';
  }


}
