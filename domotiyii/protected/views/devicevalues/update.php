<?php
/* @var $this DeviceValuesController */
/* @var $model DeviceValues */

if (!is_null(Yii::app()->request->getParam('device_id'))) {
    $device_id=Yii::app()->request->getParam('device_id');
    $device_action=Yii::app()->request->getParam('device_action','view');
}
if(isset($device_id)) {
    $homeURL=Yii::app()->homeUrl;
    $this->widget('bootstrap.widgets.TbBreadcrumb', array(
        'links' => array(
            Yii::t('app', 'Devices') => $homeURL.'devices/index',
            $model->device->name=> $homeURL.'devices/'.$device_action.'/'.$device_id,
            Yii::t('app', 'DeviceValues') =>  $homeURL.'devices/'.$device_action.'/'.$device_id.'?activeTab=values',
            Yii::t('app', 'Update'),
        ),
    ));
} else {
    $this->widget('bootstrap.widgets.TbBreadcrumb', array(
        'links' => array(
            Yii::t('app', 'DeviceValues') => '../index',
            Yii::t('app', 'Update'),
        ),
    ));
}

$this->beginWidget('zii.widgets.CPortlet', array(
    'htmlOptions' => array(
        'class' => ''
    )
));
if (isset($device_id)) {
    $this->widget('bootstrap.widgets.TbNav', array(
        'type' => TbHtml::NAV_TYPE_PILLS,
        'items' => array(
            array('label' => Yii::t('app', 'Return to Device').' '.$model->device->name, 'icon' => 'icon-circle-arrow-left', 'url' => array('/devices/'.$device_action, 'id' => $device_id,'activeTab'=>'values'), 'linkOptions' => array()),
        ),
    ));
    $this->endWidget();
} else {
    $this->widget('bootstrap.widgets.TbNav', array(
        'type' => TbHtml::NAV_TYPE_PILLS,
        'items' => array(
            array('label' => Yii::t('app', 'List'), 'icon' => 'icon-th-list', 'url' => Yii::app()->controller->createUrl('index'), 'linkOptions' => array()),
            array('label' => Yii::t('app', 'Create'), 'icon' => 'icon-plus', 'url' => Yii::app()->controller->createUrl('create'), 'linkOptions' => array()),
            array('label' => Yii::t('app', 'View'), 'icon' => 'icon-eye-open', 'url' => array('view', 'id' => $model->id), 'linkOptions' => array()),
            array('label' => Yii::t('app', 'Edit'), 'icon' => 'icon-edit', 'url' => array('update', 'id' => $model->id), 'active' => true),
            array('label' => Yii::t('app', 'Delete'), 'icon' => 'icon-trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this value?')))
        ),
    ));
    $this->endWidget();
}
?>

<legend>
    <?php echo $model->device->name; ?>
    <?php
    if (isset($device_id)) {
        echo ' - Editing Value number ', $model->valuenum;
    }
    ?>
</legend>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
