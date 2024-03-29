<?php

/**
 * Visit form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseVisitForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'patient_id'     => new sfWidgetFormPropelChoice(array('model' => 'Patient', 'add_empty' => true)),
      'doctor_id'      => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'ward_bed_id'    => new sfWidgetFormPropelChoice(array('model' => 'WardBed', 'add_empty' => true)),
      'ward_doc_id'    => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'room_id'        => new sfWidgetFormInput(),
      'visit_type'     => new sfWidgetFormInput(),
      'bp'             => new sfWidgetFormInput(),
      'temp'           => new sfWidgetFormInput(),
      'pulse'          => new sfWidgetFormInput(),
      'diet'           => new sfWidgetFormInput(),
      'description'    => new sfWidgetFormInput(),
      'time'           => new sfWidgetFormInput(),
      'visit_date'     => new sfWidgetFormDate(),
      'admit_date'     => new sfWidgetFormDate(),
      'discharge_date' => new sfWidgetFormDate(),
      'fee'            => new sfWidgetFormInput(),
      'fee_paid'       => new sfWidgetFormInput(),
      'status'         => new sfWidgetFormInput(),
      'created_at'     => new sfWidgetFormDate(),
      'updated_at'     => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Visit', 'column' => 'id', 'required' => false)),
      'patient_id'     => new sfValidatorPropelChoice(array('model' => 'Patient', 'column' => 'id', 'required' => false)),
      'doctor_id'      => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
      'ward_bed_id'    => new sfValidatorPropelChoice(array('model' => 'WardBed', 'column' => 'id', 'required' => false)),
      'ward_doc_id'    => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
      'room_id'        => new sfValidatorInteger(array('required' => false)),
      'visit_type'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'bp'             => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'temp'           => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'pulse'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'diet'           => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'description'    => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'time'           => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'visit_date'     => new sfValidatorDate(array('required' => false)),
      'admit_date'     => new sfValidatorDate(array('required' => false)),
      'discharge_date' => new sfValidatorDate(array('required' => false)),
      'fee'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'fee_paid'       => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'status'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'     => new sfValidatorDate(array('required' => false)),
      'updated_at'     => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('visit[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Visit';
  }


}
