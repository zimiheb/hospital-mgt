<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Ward filter form base class.
 *
 * @package    hospital
 * @subpackage filter
 * @author     Your name here
 */
class BaseWardFormFilter extends BaseFormFilterPropel
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

    $this->widgetSchema->setNameFormat('ward_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ward';
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
