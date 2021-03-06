<?php
/* @var $this SettingsAstroController */
/* @var $model SettingsAstro */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => 'indexModules',
        Yii::t('app','Astro and Location'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-astro-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>Astro and Location</legend>
<fieldset>
		<?php echo $form->dropDownListControlGroup($model,'timezone', array(255 => 'Automatic', -12 => "-12", -11 => "-11", -10 => "-10", -9 => "-9 = AKST", -8 => "-8 = PST", -7 => "-7 = MST", -6 => "-6 = CST", -5 => "-5", -4 => "-4", -3 => "-3 =  ADT", -2 => "-2", -1 => "-1 = EGT", 0 => "0 = GMT/UTC/WET", 1 => "+1 = CET/IST", 2 => "+2 = EET", 3 => "+3", 4 => "+4 = MSD", 5 => "+5", 6 => "+6", 7 => "+7", 8 => "+8 = HKT/PHT/SGT", 9 => "+9 = JST/KST/MYT", 10 => "+10 = PGT", 11 => "+11", 12 => "+12 = FJT/NZST", 13 => "+13 = WST")); ?>
		<?php if ( $model->timezone <> 255 ) echo $form->checkBoxControlGroup($model,'dst', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'latitude'); ?>
		<?php echo $form->textFieldControlGroup($model,'longitude'); ?>
		<?php echo $form->dropDownListControlGroup($model,'twilight', array('nautical' => 'nautical', 'civil' => 'civil', 'astronomical' => 'astronomical')); ?>
		<?php echo $form->textFieldControlGroup($model,'seasons'); ?>
		<?php echo $form->textFieldControlGroup($model,'seasonstarts'); ?>
		<?php echo $form->dropDownListControlGroup($model,'temperature', array('°C' => '°C', '°F' => '°F')); ?>
		<?php echo $form->dropDownListControlGroup($model,'currency', array('€' => '€', '$' => '$')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
