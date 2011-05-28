<?php

/**
 * LabReport form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseLabReportForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'patient_id'  => new sfWidgetFormInput(),
      'visit_id'    => new sfWidgetFormInput(),
      'lab_test_id' => new sfWidgetFormInput(),
      'description' => new sfWidgetFormInput(),
      'status'      => new sfWidgetFormInput(),
      'created_at'  => new sfWidgetFormDate(),
      'updated_at'  => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'LabReport', 'column' => 'id', 'required' => false)),
      'patient_id'  => new sfValidatorInteger(array('required' => false)),
      'visit_id'    => new sfValidatorInteger(array('required' => false)),
      'lab_test_id' => new sfValidatorInteger(array('required' => false)),
      'description' => new sfValidatorString(array('max_length' => 1024, 'required' => false)),
      'status'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'  => new sfValidatorDate(array('required' => false)),
      'updated_at'  => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lab_report[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LabReport';
  }


}
