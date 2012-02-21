<?php

/**
 * TianPost form base class.
 *
 * @method TianPost getObject() Returns the current form's model object
 *
 * @package    china_blog_test
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTianPostForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'type'         => new sfWidgetFormTextarea(),
      'content'      => new sfWidgetFormTextarea(),
      'release_date' => new sfWidgetFormTextarea(),
      'position'     => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'         => new sfValidatorString(array('required' => false)),
      'content'      => new sfValidatorString(array('required' => false)),
      'release_date' => new sfValidatorString(array('required' => false)),
      'position'     => new sfValidatorInteger(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('tian_post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TianPost';
  }

}
