<?php
/* @var $this SettingsMysensors */
/* @var $model SettingsMysensors */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Plugins') => 'indexPlugins',
        Yii::t('app','MySensors'),
    ),
)); ?>

<legend>MySensors</legend>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-mysensors-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
                <?php echo $form->dropDownListControlGroup($model,'type', array('serial' => 'serial', 'tcp' => 'tcp'), array('onchange'=>'switchTypeMisc(this);')); ?>
                <?php echo $form->textFieldControlGroup($model,'tcphost', array('readonly'=>($model->type == 'serial')? true : false, 'id'=>'tcphost')); ?>
                <?php echo $form->numberFieldControlGroup($model,'tcpport', array('readonly'=>($model->type == 'serial')? true : false, 'id'=>'tcpport')); ?> <?php echo $form->textFieldControlGroup($model,'serialport', array('class'=>'span5', 'readonly'=>($model->type == 'serial')? false : true, 'id'=>'serialport')); ?>
                <?php echo $form->dropDownListControlGroup($model,'baudrate', array('9600' => '9600', '19200' => '19200', '38400' => '38400', '57600' => '57600', '115200' => '115200'), array('readonly'=>($model->type == 'serial')? false : true, 'id'=>'baudrate')); ?>
                <?php echo $form->checkBoxControlGroup($model,'relayenabled', array('onchange'=>'switchRelay(this);', 'value'=>-1)); ?>
                <?php echo $form->numberFieldControlGroup($model,'relayport', array('readonly'=>($model->relayenabled == false)? true : false, 'id'=>'relayport')); ?>
		<?php echo $form->checkBoxControlGroup($model,'useack', array('value'=>-1)); ?>
                <?php echo $form->numberFieldControlGroup($model,'heartbeat', array('readonly'=>($model->type == 'tcp')? false : true, 'id'=>'heartbeat')); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
