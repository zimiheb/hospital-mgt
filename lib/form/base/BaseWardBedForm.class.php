<?php

/**
 * WardBed form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BaseWardBedForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'ward_id' => new sfWidgetFormInput(),
      'bed'     => new sfWidgetFormInput(),
      'status'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorPropelChoice(array('model' => 'WardBed', 'column' => 'id', 'required' => false)),
      'ward_id' => new sfValidatorInteger(array('required' => false)),
      'bed'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'status'  => new sfValidatorString(array('max_length' => 10, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ward_bed[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WardBed';
  }


}
