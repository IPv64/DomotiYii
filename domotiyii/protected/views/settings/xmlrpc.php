<?php
/* @var $this SettingsXmlrpcController */
/* @var $model SettingsXmlrpc */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => 'indexModules',
        Yii::t('app','XML-RPC'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-xmlrpc-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>XML-RPC Server</legend>
<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'httpport'); ?>
		<?php echo $form->numberFieldControlGroup($model,'maxconn'); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
