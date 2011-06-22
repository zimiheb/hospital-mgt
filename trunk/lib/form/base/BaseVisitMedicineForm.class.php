<?php

/**
 * VisitMedicine form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseVisitMedicineForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'patient_id' => new sfWidgetFormPropelChoice(array('model' => 'Patient', 'add_empty' => true)),
      'visit_id'   => new sfWidgetFormPropelChoice(array('model' => 'Visit', 'add_empty' => true)),
      'pharma_id'  => new sfWidgetFormPropelChoice(array('model' => 'Pharma', 'add_empty' => true)),
      'dosage_id'  => new sfWidgetFormPropelChoice(array('model' => 'Dosage', 'add_empty' => true)),
      'quantity'   => new sfWidgetFormInput(),
      'price'      => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'VisitMedicine', 'column' => 'id', 'required' => false)),
      'patient_id' => new sfValidatorPropelChoice(array('model' => 'Patient', 'column' => 'id', 'required' => false)),
      'visit_id'   => new sfValidatorPropelChoice(array('model' => 'Visit', 'column' => 'id', 'required' => false)),
      'pharma_id'  => new sfValidatorPropelChoice(array('model' => 'Pharma', 'column' => 'id', 'required' => false)),
      'dosage_id'  => new sfValidatorPropelChoice(array('model' => 'Dosage', 'column' => 'id', 'required' => false)),
      'quantity'   => new sfValidatorInteger(array('required' => false)),
      'price'      => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('visit_medicine[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VisitMedicine';
  }


}
