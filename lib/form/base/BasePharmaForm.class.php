<?php

/**
 * Pharma form base class.
 *
 * @package    hospital
 * @subpackage form
 * @author     Your name here
 */
class BasePharmaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInput(),
      'type'       => new sfWidgetFormInput(),
      'strength'   => new sfWidgetFormInput(),
      'company'    => new sfWidgetFormInput(),
      'price'      => new sfWidgetFormInput(),
      'status'     => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Pharma', 'column' => 'id', 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'type'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'strength'   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'company'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'price'      => new sfValidatorInteger(array('required' => false)),
      'status'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pharma[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pharma';
  }


}
