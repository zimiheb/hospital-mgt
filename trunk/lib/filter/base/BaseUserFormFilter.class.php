<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * User filter form base class.
 *
 * @package    hospital
 * @subpackage filter
 * @author     Your name here
 */
class BaseUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'role_id'     => new sfWidgetFormFilterInput(),
      'employee_id' => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'user'        => new sfWidgetFormFilterInput(),
      'password'    => new sfWidgetFormFilterInput(),
      'status'      => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'role_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'employee_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Employee', 'column' => 'id')),
      'user'        => new sfValidatorPass(array('required' => false)),
      'password'    => new sfValidatorPass(array('required' => false)),
      'status'      => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'role_id'     => 'Number',
      'employee_id' => 'ForeignKey',
      'user'        => 'Text',
      'password'    => 'Text',
      'status'      => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
