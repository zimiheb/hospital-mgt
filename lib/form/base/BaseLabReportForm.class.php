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
      'patient_id'  => new sfWidgetFormPropelChoice(array('model' => 'Patient', 'add_empty' => true)),
      'visit_id'    => new sfWidgetFormPropelChoice(array('model' => 'Visit', 'add_empty' => true)),
      'lab_test_id' => new sfWidgetFormPropelChoice(array('model' => 'LabTest', 'add_empty' => true)),
      'description' => new sfWidgetFormInput(),
      'status'      => new sfWidgetFormInput(),
      'created_at'  => new sfWidgetFormDate(),
      'updated_at'  => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'LabReport', 'column' => 'id', 'required' => false)),
      'patient_id'  => new sfValidatorPropelChoice(array('model' => 'Patient', 'column' => 'id', 'required' => false)),
      'visit_id'    => new sfValidatorPropelChoice(array('model' => 'Visit', 'column' => 'id', 'required' => false)),
      'lab_test_id' => new sfValidatorPropelChoice(array('model' => 'LabTest', 'column' => 'id', 'required' => false)),
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
