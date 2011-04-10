<?php

/**
 * Staff form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseStaffForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'department_id'     => new sfWidgetFormInput(),
      'designation_id'    => new sfWidgetFormInput(),
      'role_id'           => new sfWidgetFormInput(),
      'name'              => new sfWidgetFormInput(),
      'cnic'              => new sfWidgetFormInput(),
      'dob'               => new sfWidgetFormDate(),
      'gender'            => new sfWidgetFormInput(),
      'permanent_address' => new sfWidgetFormInput(),
      'contact_res'       => new sfWidgetFormInput(),
      'contact_cell'      => new sfWidgetFormInput(),
      'contact_off'       => new sfWidgetFormInput(),
      'emergency_contact' => new sfWidgetFormInput(),
      'employment_date'   => new sfWidgetFormDate(),
      'local_resident'    => new sfWidgetFormInput(),
      'qualification'     => new sfWidgetFormInput(),
      'status'            => new sfWidgetFormInput(),
      'created_at'        => new sfWidgetFormDate(),
      'updated_at'        => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Staff', 'column' => 'id', 'required' => false)),
      'department_id'     => new sfValidatorInteger(array('required' => false)),
      'designation_id'    => new sfValidatorInteger(array('required' => false)),
      'role_id'           => new sfValidatorInteger(array('required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'cnic'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'dob'               => new sfValidatorDate(array('required' => false)),
      'gender'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'permanent_address' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contact_res'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'contact_cell'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'contact_off'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'emergency_contact' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'employment_date'   => new sfValidatorDate(array('required' => false)),
      'local_resident'    => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'qualification'     => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'status'            => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'        => new sfValidatorDate(array('required' => false)),
      'updated_at'        => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('staff[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Staff';
  }


}
