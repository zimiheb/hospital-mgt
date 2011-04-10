<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Staff filter form base class.
 *
 * @package    hospital
 * @subpackage filter
 * @author     Your name here
 */
class BaseStaffFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'department_id'     => new sfWidgetFormFilterInput(),
      'designation_id'    => new sfWidgetFormFilterInput(),
      'role_id'           => new sfWidgetFormFilterInput(),
      'name'              => new sfWidgetFormFilterInput(),
      'cnic'              => new sfWidgetFormFilterInput(),
      'dob'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'gender'            => new sfWidgetFormFilterInput(),
      'permanent_address' => new sfWidgetFormFilterInput(),
      'contact_res'       => new sfWidgetFormFilterInput(),
      'contact_cell'      => new sfWidgetFormFilterInput(),
      'contact_off'       => new sfWidgetFormFilterInput(),
      'emergency_contact' => new sfWidgetFormFilterInput(),
      'employment_date'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'local_resident'    => new sfWidgetFormFilterInput(),
      'qualification'     => new sfWidgetFormFilterInput(),
      'status'            => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'department_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'designation_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'role_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'              => new sfValidatorPass(array('required' => false)),
      'cnic'              => new sfValidatorPass(array('required' => false)),
      'dob'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'gender'            => new sfValidatorPass(array('required' => false)),
      'permanent_address' => new sfValidatorPass(array('required' => false)),
      'contact_res'       => new sfValidatorPass(array('required' => false)),
      'contact_cell'      => new sfValidatorPass(array('required' => false)),
      'contact_off'       => new sfValidatorPass(array('required' => false)),
      'emergency_contact' => new sfValidatorPass(array('required' => false)),
      'employment_date'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'local_resident'    => new sfValidatorPass(array('required' => false)),
      'qualification'     => new sfValidatorPass(array('required' => false)),
      'status'            => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('staff_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Staff';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'department_id'     => 'Number',
      'designation_id'    => 'Number',
      'role_id'           => 'Number',
      'name'              => 'Text',
      'cnic'              => 'Text',
      'dob'               => 'Date',
      'gender'            => 'Text',
      'permanent_address' => 'Text',
      'contact_res'       => 'Text',
      'contact_cell'      => 'Text',
      'contact_off'       => 'Text',
      'emergency_contact' => 'Text',
      'employment_date'   => 'Date',
      'local_resident'    => 'Text',
      'qualification'     => 'Text',
      'status'            => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
