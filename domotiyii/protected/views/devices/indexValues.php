<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */
if (is_null(yii::app()->request->getParam('ajax'))) {

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('all-devices-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

    $this->widget('bootstrap.widgets.TbBreadcrumb', array(
        'links' => array(
            Yii::t('app', 'Devices'),
        ),
    ));

    $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions' => array(
            'class' => ''
        )
    ));
    $this->widget('bootstrap.widgets.TbNav', array(
        'type' => TbHtml::NAV_TYPE_PILLS,
        'items' => array(
            array('label' => Yii::t('app', 'List'), 'icon' => 'icon-th-list', 'url' => Yii::app()->controller->createUrl('indexValues'), 'active' => true, 'linkOptions' => array()),
            array('label' => Yii::t('app', 'Search'), 'icon' => 'icon-search', 'url' => '#', 'linkOptions' => array('class' => 'search-button')),
            array('label' => Yii::t('app', 'Create'), 'icon' => 'icon-plus', 'url' => Yii::app()->controller->createUrl('create'), 'linkOptions' => array()),
        ),
    ));
    $this->endWidget();
    ?>

    <div class="search-form" style="display:none">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>

    </div><!-- search-form -->

    <?php
    $this->widget('bootstrap.widgets.TbNav', array(
        'type' => 'tabs',
        'stacked' => false,
        'items' => array(
            array('label' => Yii::t('app', 'All'), 'url' => 'indexValues?type=all', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'all'),
            array('label' => Yii::t('app', 'Enabled'), 'url' => 'indexValues?type=enabled', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'enabled'),
            array('label' => Yii::t('app', 'Sensors'), 'url' => 'indexValues?type=sensors', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'sensors'),
            array('label' => Yii::t('app', 'Dimmers'), 'url' => 'indexValues?type=dimmers', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'dimmers'),
            array('label' => Yii::t('app', 'Switches'), 'url' => 'indexValues?type=switches', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'switches'),
            array('label' => Yii::t('app', 'Hidden'), 'url' => 'indexValues?type=hidden', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'hidden'),
            array('label' => Yii::t('app', 'Disabled'), 'url' => 'indexValues?type=disabled', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'disabled'),
        ),
    ));
}
$this->widget('domotiyii.LiveGridView', array(
    'id' => 'all-devices-grid',
    'refreshTime' => '60000',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'template' => '{items}{pager}{summary}',
    'columns' => array(
        array('name' => 'icon',
            'header' => '',
            'type' => 'html',
            'value' => '$data->icon',
            'htmlOptions' => array('width' => '10')),
        array('name' => 'name', 'header' => Yii::t('app', 'Name'), 'htmlOptions' => array('width' => '150')),
        array('name' => 'locationtext', 'header' => Yii::t('app', 'Location'), 'htmlOptions' => array('width' => '120')),
        array('name' => 'Value 1',
            'header' => Yii::t('app', 'Value 1'),
            'value' => '$data->getValue(1)',
            'htmlOptions' => array('class' => 'value1', 'width' => '80')),
        array('name' => 'Let\'s play',
            'header' => 'Let\'s play',
            'type' => 'raw',
            'value' => '$data->getButtons()',
            'htmlOptions' => array('width' => '80')),
        array('name' => 'Value 2',
            'header' => Yii::t('app', 'Value 2'),
            'value' => '$data->getValue(2)',
            'htmlOptions' => array('width' => '80')),
        array('name' => 'Value 3',
            'header' => Yii::t('app', 'Value 3'),
            'value' => '$data->getValue(3)',
            'htmlOptions' => array('width' => '80')),
        array('name' => 'Value 4',
            'header' => Yii::t('app', 'Value 4'),
            'value' => '$data->getValue(4)',
            'htmlOptions' => array('width' => '80')),
        array('name' => 'lastseentext', 'header' => Yii::t('app', 'Last Seen'), 'htmlOptions' => array('width' => '120')),
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => Yii::app()->user->isGuest ? '{view}' : '{view} {update} {delete}',
            'header' => Yii::t('app', 'Actions'),
            'htmlOptions' => array('style' => 'width: 40px'),
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('app', 'View'),
                    'url' => 'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
                ),
                'update' => array(
                    'label' => Yii::t('app', 'Edit'),
                    'url' => 'Yii::app()->controller->createUrl("update", array("id"=>$data["id"]))',
                ),
                'delete' => array(
                    'label' => Yii::t('app', 'Delete'),
                    'url' => 'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"],"command"=>"delete"))',
                ),
            ),
        ),
    ),
));
if (is_null(yii::app()->request->getParam('ajax'))):
    ?>
    <script>
        function btAction(event, but) {
            event.stopPropagation();
            $(but).removeClass('btn-primary');
            var device = $(but).data('device');
            var action = $(but).data('action');
            //not used for now
            //FIXME: TBD better !!!!
            //$val = $(but).parent().parent().find(".value1").text();
            $.get('<?php echo Yii::app()->homeUrl; ?>AjaxUtil/setDevice', {device: device, action: action},
            function(data) {
                if (data.result) {
                    $(but).parent().parent().find("td.value1").html(action);
                    var tr = $(but).parent().parent();
                    tr.fadeOut(0, function() {
                        tr.fadeIn(800);
                    });
                    $.fn.yiiLiveGridView.update("all-devices-grid");
                } else
                    alert('Error');
            }, 'json').fail(function() {
                alert('Error setting device!!');
            });
        }

    </script>
<?php endif; ?>