<?php

/**
 * Patient form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BasePatientForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'id_number'         => new sfWidgetFormInput(),
      'cnic'              => new sfWidgetFormInput(),
      'name'              => new sfWidgetFormInput(),
      'father_name'       => new sfWidgetFormInput(),
      'dob'               => new sfWidgetFormDate(),
      'gender'            => new sfWidgetFormInput(),
      'address'           => new sfWidgetFormInput(),
      'contact_res'       => new sfWidgetFormInput(),
      'contact_cell'      => new sfWidgetFormInput(),
      'emergency_contact' => new sfWidgetFormInput(),
      'email'             => new sfWidgetFormInput(),
      'blood_group'       => new sfWidgetFormInput(),
      'disease'           => new sfWidgetFormInput(),
      'allergy'           => new sfWidgetFormInput(),
      'drug_allergy'      => new sfWidgetFormInput(),
      'status'            => new sfWidgetFormInput(),
      'created_at'        => new sfWidgetFormDate(),
      'updated_at'        => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Patient', 'column' => 'id', 'required' => false)),
      'id_number'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'cnic'              => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'father_name'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'dob'               => new sfValidatorDate(array('required' => false)),
      'gender'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'address'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contact_res'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'contact_cell'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'emergency_contact' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'blood_group'       => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'disease'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'allergy'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'drug_allergy'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'        => new sfValidatorDate(array('required' => false)),
      'updated_at'        => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('patient[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Patient';
  }


}
