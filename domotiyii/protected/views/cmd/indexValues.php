<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */


$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Devices CMD') . ' Experimental page - trying to do a fast refreshable page with buttons to command devices',
    ),
));
?>
<style>
    .devicesList td {
        padding:4px;
        line-height: 14px;
        vertical-align: middle;
    }
</style>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.min.js"></script>
<table class="table devicesList">
    <thead>
        <tr>
            <th>id</th>
            <th>icon</th>
            <th>name</th>
            <th>locationtext</th>
            <th>Button</th>
            <th>Value1</th>
            <th>Value2</th>
            <th>Value3</th>
            <th>Value4</th>
            <th>LastChanged</th>
        </tr>
    </thead>
</table>   
<div style="text-align:center;margin:0px;" class="lastChanged"></div>
<script>
    var maxdate = '0';
    function getLastDate() {
        maxdate = ' ';
        $('.devicesList').find('tr').each(function(i, v) {
            var tmp = $(v).find('td:last').text();
            console.log(tmp);
            if (tmp > maxdate)
                maxdate = tmp;
        });
    }
    $(document).ready(go());
    function go() {
        devTable = $('.devicesList').dataTable({
            "fnDrawCallback":
                    getLastDate,
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false,
            "aaSorting": [[1, "asc"]],
            "bServerSide": true,
            "sAjaxSource": '<?php echo Yii::app()->homeUrl; ?>cmd/?ajax',
            "aoColumnDefs": [{"bVisible": false, "aTargets": [0]}]
        });
        needRefresh();
    }

    function needRefresh() {
        if (maxdate !== '')
            $.get('<?php echo Yii::app()->homeUrl; ?>cmd/lastChanged', function(data) {
                if (data != null) {
                    $('.lastChanged').html('<b>Last change on server</b> : '+data + ' - <b>Last change here</b> : ' + maxdate);
                    if(maxdate!=data)
                        devTable.fnDraw();
                }
            });
        setTimeout('needRefresh()', 2000);
    }

    function btAction(event, but) {
        event.stopPropagation();
        $(but).removeClass('btn-primary');
        var device = $(but).data('device');
        var action = $(but).data('action');
        $.get('<?php echo Yii::app()->homeUrl; ?>cmd/setDevice', {device: device, action: action},
        function(data) {
            if (data.result) {
                devTable.fnDraw();
            } else
                alert('Error');
        }, 'json').fail(function() {
            alert('Error setting device!!');
        });
    }

</script>
