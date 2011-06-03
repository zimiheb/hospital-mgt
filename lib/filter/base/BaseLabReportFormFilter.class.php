<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * LabReport filter form base class.
 *
 * @package    hospital
 * @subpackage filter
 * @author     Your name here
 */
class BaseLabReportFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'patient_id'  => new sfWidgetFormPropelChoice(array('model' => 'Patient', 'add_empty' => true)),
      'visit_id'    => new sfWidgetFormPropelChoice(array('model' => 'Visit', 'add_empty' => true)),
      'lab_test_id' => new sfWidgetFormPropelChoice(array('model' => 'LabTest', 'add_empty' => true)),
      'description' => new sfWidgetFormFilterInput(),
      'status'      => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'patient_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Patient', 'column' => 'id')),
      'visit_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Visit', 'column' => 'id')),
      'lab_test_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'LabTest', 'column' => 'id')),
      'description' => new sfValidatorPass(array('required' => false)),
      'status'      => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('lab_report_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LabReport';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'patient_id'  => 'ForeignKey',
      'visit_id'    => 'ForeignKey',
      'lab_test_id' => 'ForeignKey',
      'description' => 'Text',
      'status'      => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
