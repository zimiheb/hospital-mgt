<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * VisitMedicine filter form base class.
 *
 * @package    hospital
 * @subpackage filter
 * @author     Your name here
 */
class BaseVisitMedicineFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'patient_id' => new sfWidgetFormPropelChoice(array('model' => 'Patient', 'add_empty' => true)),
      'visit_id'   => new sfWidgetFormPropelChoice(array('model' => 'Visit', 'add_empty' => true)),
      'pharma_id'  => new sfWidgetFormPropelChoice(array('model' => 'Pharma', 'add_empty' => true)),
      'dosage_id'  => new sfWidgetFormPropelChoice(array('model' => 'Dosage', 'add_empty' => true)),
      'quantity'   => new sfWidgetFormFilterInput(),
      'price'      => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'patient_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Patient', 'column' => 'id')),
      'visit_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Visit', 'column' => 'id')),
      'pharma_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pharma', 'column' => 'id')),
      'dosage_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Dosage', 'column' => 'id')),
      'quantity'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('visit_medicine_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VisitMedicine';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'patient_id' => 'ForeignKey',
      'visit_id'   => 'ForeignKey',
      'pharma_id'  => 'ForeignKey',
      'dosage_id'  => 'ForeignKey',
      'quantity'   => 'Number',
      'price'      => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
