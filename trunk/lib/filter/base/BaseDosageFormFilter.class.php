<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Dosage filter form base class.
 *
 * @package    hospital
 * @subpackage filter
 * @author     Your name here
 */
class BaseDosageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'  => new sfWidgetFormFilterInput(),
      'status' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'  => new sfValidatorPass(array('required' => false)),
      'status' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dosage_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dosage';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'title'  => 'Text',
      'status' => 'Text',
    );
  }
}
