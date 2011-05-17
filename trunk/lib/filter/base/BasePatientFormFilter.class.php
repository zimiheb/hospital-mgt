<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Patient filter form base class.
 *
 * @package    hospital
 * @subpackage filter
 * @author     Your name here
 */
class BasePatientFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_number'         => new sfWidgetFormFilterInput(),
      'cnic'              => new sfWidgetFormFilterInput(),
      'name'              => new sfWidgetFormFilterInput(),
      'father_name'       => new sfWidgetFormFilterInput(),
      'dob'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'gender'            => new sfWidgetFormFilterInput(),
      'address'           => new sfWidgetFormFilterInput(),
      'contact_res'       => new sfWidgetFormFilterInput(),
      'contact_cell'      => new sfWidgetFormFilterInput(),
      'emergency_contact' => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'blood_group'       => new sfWidgetFormFilterInput(),
      'disease'           => new sfWidgetFormFilterInput(),
      'allergy'           => new sfWidgetFormFilterInput(),
      'drug_allergy'      => new sfWidgetFormFilterInput(),
      'status'            => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'id_number'         => new sfValidatorPass(array('required' => false)),
      'cnic'              => new sfValidatorPass(array('required' => false)),
      'name'              => new sfValidatorPass(array('required' => false)),
      'father_name'       => new sfValidatorPass(array('required' => false)),
      'dob'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'gender'            => new sfValidatorPass(array('required' => false)),
      'address'           => new sfValidatorPass(array('required' => false)),
      'contact_res'       => new sfValidatorPass(array('required' => false)),
      'contact_cell'      => new sfValidatorPass(array('required' => false)),
      'emergency_contact' => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'blood_group'       => new sfValidatorPass(array('required' => false)),
      'disease'           => new sfValidatorPass(array('required' => false)),
      'allergy'           => new sfValidatorPass(array('required' => false)),
      'drug_allergy'      => new sfValidatorPass(array('required' => false)),
      'status'            => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('patient_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Patient';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'id_number'         => 'Text',
      'cnic'              => 'Text',
      'name'              => 'Text',
      'father_name'       => 'Text',
      'dob'               => 'Date',
      'gender'            => 'Text',
      'address'           => 'Text',
      'contact_res'       => 'Text',
      'contact_cell'      => 'Text',
      'emergency_contact' => 'Text',
      'email'             => 'Text',
      'blood_group'       => 'Text',
      'disease'           => 'Text',
      'allergy'           => 'Text',
      'drug_allergy'      => 'Text',
      'status'            => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
