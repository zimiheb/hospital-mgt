<?php

/**
 * Dosage form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseDosageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'title'  => new sfWidgetFormInput(),
      'status' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorPropelChoice(array('model' => 'Dosage', 'column' => 'id', 'required' => false)),
      'title'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'status' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dosage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dosage';
  }


}
