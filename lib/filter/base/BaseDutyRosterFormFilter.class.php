<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * DutyRoster filter form base class.
 *
 * @package    hospital
 * @subpackage filter
 * @author     Your name here
 */
class BaseDutyRosterFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'employee_id'   => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'duty_place_id' => new sfWidgetFormPropelChoice(array('model' => 'DutyPlace', 'add_empty' => true)),
      'duty_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'from'          => new sfWidgetFormFilterInput(),
      'to'            => new sfWidgetFormFilterInput(),
      'present'       => new sfWidgetFormFilterInput(),
      'substitute_id' => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'status'        => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'employee_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Employee', 'column' => 'id')),
      'duty_place_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DutyPlace', 'column' => 'id')),
      'duty_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'from'          => new sfValidatorPass(array('required' => false)),
      'to'            => new sfValidatorPass(array('required' => false)),
      'present'       => new sfValidatorPass(array('required' => false)),
      'substitute_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Employee', 'column' => 'id')),
      'status'        => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('duty_roster_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DutyRoster';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'employee_id'   => 'ForeignKey',
      'duty_place_id' => 'ForeignKey',
      'duty_date'     => 'Date',
      'from'          => 'Text',
      'to'            => 'Text',
      'present'       => 'Text',
      'substitute_id' => 'ForeignKey',
      'status'        => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
