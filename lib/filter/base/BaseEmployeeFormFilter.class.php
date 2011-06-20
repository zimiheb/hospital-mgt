<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Employee filter form base class.
 *
 * @package    hospital
 * @subpackage filter
 * @author     Your name here
 */
class BaseEmployeeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'department_id'     => new sfWidgetFormPropelChoice(array('model' => 'Department', 'add_empty' => true)),
      'designation_id'    => new sfWidgetFormPropelChoice(array('model' => 'Designation', 'add_empty' => true)),
      'role_id'           => new sfWidgetFormPropelChoice(array('model' => 'Role', 'add_empty' => true)),
      'emp_category'      => new sfWidgetFormFilterInput(),
      'name'              => new sfWidgetFormFilterInput(),
      'cnic'              => new sfWidgetFormFilterInput(),
      'dob'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'gender'            => new sfWidgetFormFilterInput(),
      'mail_address'      => new sfWidgetFormFilterInput(),
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
      'department_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Department', 'column' => 'id')),
      'designation_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Designation', 'column' => 'id')),
      'role_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Role', 'column' => 'id')),
      'emp_category'      => new sfValidatorPass(array('required' => false)),
      'name'              => new sfValidatorPass(array('required' => false)),
      'cnic'              => new sfValidatorPass(array('required' => false)),
      'dob'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'gender'            => new sfValidatorPass(array('required' => false)),
      'mail_address'      => new sfValidatorPass(array('required' => false)),
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

    $this->widgetSchema->setNameFormat('employee_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Employee';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'department_id'     => 'ForeignKey',
      'designation_id'    => 'ForeignKey',
      'role_id'           => 'ForeignKey',
      'emp_category'      => 'Text',
      'name'              => 'Text',
      'cnic'              => 'Text',
      'dob'               => 'Date',
      'gender'            => 'Text',
      'mail_address'      => 'Text',
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
