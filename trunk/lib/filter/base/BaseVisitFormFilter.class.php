<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Visit filter form base class.
 *
 * @package    hospital
 * @subpackage filter
 * @author     Your name here
 */
class BaseVisitFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'patient_id'     => new sfWidgetFormPropelChoice(array('model' => 'Patient', 'add_empty' => true)),
      'doctor_id'      => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'ward_bed_id'    => new sfWidgetFormPropelChoice(array('model' => 'WardBed', 'add_empty' => true)),
      'ward_doc_id'    => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'room_id'        => new sfWidgetFormFilterInput(),
      'visit_type'     => new sfWidgetFormFilterInput(),
      'bp'             => new sfWidgetFormFilterInput(),
      'temp'           => new sfWidgetFormFilterInput(),
      'pulse'          => new sfWidgetFormFilterInput(),
      'diet'           => new sfWidgetFormFilterInput(),
      'description'    => new sfWidgetFormFilterInput(),
      'time'           => new sfWidgetFormFilterInput(),
      'visit_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'admit_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'discharge_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'fee'            => new sfWidgetFormFilterInput(),
      'fee_paid'       => new sfWidgetFormFilterInput(),
      'status'         => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'patient_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Patient', 'column' => 'id')),
      'doctor_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Employee', 'column' => 'id')),
      'ward_bed_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WardBed', 'column' => 'id')),
      'ward_doc_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Employee', 'column' => 'id')),
      'room_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'visit_type'     => new sfValidatorPass(array('required' => false)),
      'bp'             => new sfValidatorPass(array('required' => false)),
      'temp'           => new sfValidatorPass(array('required' => false)),
      'pulse'          => new sfValidatorPass(array('required' => false)),
      'diet'           => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'time'           => new sfValidatorPass(array('required' => false)),
      'visit_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'admit_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'discharge_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fee'            => new sfValidatorPass(array('required' => false)),
      'fee_paid'       => new sfValidatorPass(array('required' => false)),
      'status'         => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('visit_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Visit';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'patient_id'     => 'ForeignKey',
      'doctor_id'      => 'ForeignKey',
      'ward_bed_id'    => 'ForeignKey',
      'ward_doc_id'    => 'ForeignKey',
      'room_id'        => 'Number',
      'visit_type'     => 'Text',
      'bp'             => 'Text',
      'temp'           => 'Text',
      'pulse'          => 'Text',
      'diet'           => 'Text',
      'description'    => 'Text',
      'time'           => 'Text',
      'visit_date'     => 'Date',
      'admit_date'     => 'Date',
      'discharge_date' => 'Date',
      'fee'            => 'Text',
      'fee_paid'       => 'Text',
      'status'         => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
