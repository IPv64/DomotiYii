<?php
/* @var $this DevicesController */
/* @var $model Devices */

$config = array();
$dataProvider = new CArrayDataProvider($rawData = $model->actions, $config);

$this->widget('domotiyii.LiveGridView', array(
    'id' => 'all-devices-grid',
    'type' => 'striped condensed',
    'dataProvider' => $dataProvider,
    'afterAjaxUpdate' => 'go(id,options)',
    'template' => '{items}{pager}{summary}',
    'columns' => array(
        array('name' => 'id', 'header' => '#', 'htmlOptions' => array('width' => '20')),
        array('name' => 'name', 'header' => Yii::t('app', 'Name'), 'htmlOptions' => array('width' => '120')),
        array('name' => 'description', 'header' => Yii::t('app', 'Description'), 'htmlOptions' => array('width' => '120')),
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => Yii::app()->user->isGuest ? '{view}' : '{view} {update} {delete}',
            'header' => Yii::t('app', 'Actions'),
            'htmlOptions' => array('style' => 'width: 40px'),
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('app', 'View'),
                    'url' => '$data["id"]',
                ),
                'update' => array(
                    'label' => Yii::t('app', 'Edit'),
                    'url' => '$data["id"]',
                ),
                'delete' => array(
                    'label' => Yii::t('app', 'Delete'),
                    'url' => 'Yii::app()->controller->createUrl("actions/delete", array("id"=>$data["id"],"command"=>"delete"))',
                ),
            ),
        ),
    ),
));
?>
<?php
$this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'action',
    'header' => 'Action',
    'content' => '',
    'footer' => '' //array(
        //TbHtml::button('Save Changes', array('data-dismiss' => 'modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        //TbHtml::button('Close', array('data-dismiss' => 'modal')),
    //),
));
?>

<script>
    var butClose='<button data-dismiss="modal" class="btn" name="yt1" type="button">Close</button>';
    function go() {
        $('.view').attr('data-target', '#action').attr('data-toggle', 'modal').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('href');
            $.get('../actions/view?id=' + id + '&AJAXMODAL=1', function(data) {
                $('#action').find('.modal-body').html(data);
                $('#action').find('.modal-footer').html(butClose);
                $('#action').find('input,select').css('width', '100%');
            });
        });
        $('.update').attr('data-target', '#action').attr('data-toggle', 'modal').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('href');
            $.get('../actions/update?id=' + id + '&AJAXMODAL=1', function(data) {
                $('#action').find('.modal-body').html(data);
                $('#action').find('input,select,textarea').css('width', '100%');
                $('#action').find('.modal-footer').html(butClose);
                    $('#action').find('.modal-footer').prepend($('.form-actions').html());
                $('.form-actions').remove();
                $('.modal-body').css('max-height', '500px');
                $('.btUpdate').on('click', function(e) {
                    e.preventDefault();
                    alert('For now doing nothing...');
                });
            });
        });
    }
    go();
</script>