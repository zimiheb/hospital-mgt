<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * WardBed filter form base class.
 *
 * @package    hospital
 * @subpackage filter
 * @author     Your name here
 */
class BaseWardBedFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'ward_id' => new sfWidgetFormFilterInput(),
      'bed'     => new sfWidgetFormFilterInput(),
      'status'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'ward_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bed'     => new sfValidatorPass(array('required' => false)),
      'status'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ward_bed_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WardBed';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'ward_id' => 'Number',
      'bed'     => 'Text',
      'status'  => 'Text',
    );
  }
}
