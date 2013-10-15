<?php $this->beginContent('/layouts/main'); ?>
<div class="navbar navbar-inverse">
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'brandLabel'=>'<img height="25" width="25" src="' . Yii::app()->request->baseUrl . '/static/logo.png">',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbNav',
            'items'=>array(
                array('label'=>Yii::t('translate','Modules'), 'visible'=>!Yii::app()->user->isGuest, 'url'=>'#', 'items'=>array(
                    array('label'=>'Main', 'url'=> array('settings/main')),
                    array('label'=>'Astro and Location', 'url'=> array('settings/astro')),
                    array('label'=>'CallerID', 'url'=> array('settings/callerid')),
                    array('label'=>'E-mail', 'url'=> array('settings/email')),
                    array('label'=>'Google', 'url'=>'#', 'items'=>array(
                       array('label'=>'GMail', 'url'=> array('settings/gmail')),
		    )),
                    array('label'=>'Twitter', 'url'=> array('settings/twitter')),
                    array('label'=>'Servers', 'url'=>'#', 'items'=>array(
                       array('label'=>'Telnet Server', 'url'=> array('settings/telnetserver')),
                       array('label'=>'SmartVISU Server', 'url'=> array('settings/smartvisu')),
                       array('label'=>'XML-RPC Server', 'url'=> array('settings/xmlrpc')),
		    )),
                    array('label'=>'Sound', 'url'=> array('settings/sound')),
                    array('label'=>'VoiceText', 'url'=> array('settings/voicetext')),
                    array('label'=>'Weather', 'url'=>'#', 'items'=>array(
                       array('label'=>'WeatherBug', 'url'=> array('settings/weatherbug')),
                       array('label'=>'WeatherUnderground', 'url'=> array('settings/weatherug')),
                    )),
                    array('label'=>'Notifiers', 'url'=>'#', 'items'=>array(
                       array('label'=>'Prowl', 'url'=> array('settings/prowl')),
                       array('label'=>'Pushover', 'url'=> array('settings/pushover')),
                       array('label'=>'NMA', 'url'=> array('settings/nma')),
                    )),
                    array('label'=>'Server Stats', 'url'=> array('settings/serverstats')),
                    array('label'=>'TV Guide', 'url'=>'#', 'items'=>array(
                       array('label'=>'Settings', 'url'=> array('settings/tvguide')),
                       array('label'=>'Channels', 'url'=> array('settings/tvchannels')),
                       array('label'=>'Categories', 'url'=> array('settings/tvcategories')),
                    )),
                    array('label'=>'Publish Data', 'url'=>'#', 'items'=>array(
                       array('label'=>'Bwired Map', 'url'=> array('settings/bwiredmap')),
                       array('label'=>'MQTT', 'url'=> array('settings/mqtt')),
                       array('label'=>'Pachube', 'url'=> array('settings/pachube')),
                       array('label'=>'PVoutput', 'url'=> array('settings/pvoutput')),
                       array('label'=>'TemperaturNu', 'url'=> array('settings/temperaturnu')),
                    )),
                    array('label'=>'Thermostat', 'url'=> array('settings/thermostat')),
                 )),
                 array('label'=>Yii::t('translate','Interfaces'), 'visible'=>!Yii::app()->user->isGuest, 'url'=>'#', 'items'=>array(
                    array('label'=>'1-Wire', 'url'=>'#', 'items'=>array(
                       array('label'=>'Digitemp', 'url'=> array('settings/digitemp')),
                       array('label'=>'Midon TEMP08', 'url'=> array('settings/temp08')),
                       array('label'=>'OWFS', 'url'=> array('settings/owfs')),
                       array('label'=>'OWW', 'url'=> array('settings/oww')),
                    )),
                    array('label'=>'Arduino', 'url'=>'#', 'items'=>array(
                       array('label'=>'GenericIO', 'url'=> array('settings/genericio')),
                       array('label'=>'Jeelabs', 'url'=> array('settings/jeelabs')),
                    )),
                    array('label'=>'Audio Video', 'url'=>'#', 'items'=>array(
                       array('label'=>'Denon AV', 'url'=> array('settings/denon')),
                       array('label'=>'iPort Dock', 'url'=> array('settings/iport')),
                       array('label'=>'LG TV', 'url'=> array('settings/lgtv')),
                       array('label'=>'Onkyo/Integra AV', 'url'=> array('settings/onkyo')),
                       array('label'=>'Pioneer AV', 'url'=> array('settings/pioneer')),
                       array('label'=>'Sharp TV', 'url'=> array('settings/sharptv')),
                       array('label'=>'Squeeze Server', 'url'=> array('settings/squeezeserver')),
                    )),
                    array('label'=>'CallerID', 'url'=>'#', 'items'=>array(
                       array('label'=>'Asterisk', 'url'=> array('settings/asterisk')),
                       array('label'=>'Fritz!Box', 'url'=> array('settings/fritzbox')),
                       array('label'=>'Ncid', 'url'=> array('settings/ncid')),
                    )),
                    array('label'=>'Cameras', 'url'=>'#', 'items'=>array(
                       array('label'=>'Cameras', 'url'=> array('settings/cameras')),
                       array('label'=>'IP Videoserver', 'url'=> array('settings/videoserver')),
                       array('label'=>'Sony Visca', 'url'=> array('settings/visca')),
                    )),
                    array('label'=>'CUL', 'url'=> array('settings/cul')),
                    array('label'=>'Device Control', 'url'=>'#', 'items'=>array(
                       array('label'=>'Anel PwrCtrl', 'url'=> array('settings/pwrctrl')),
                       array('label'=>'EZcontrol', 'url'=> array('settings/ezcontrol')),
                       array('label'=>'KNX/EIB', 'url'=> array('settings/eib')),
                       array('label'=>'PLCBUS', 'url'=> array('settings/plcbus')),
                       array('label'=>'X10', 'url'=>'#', 'items'=>array(
                          array('label'=>'X10Cmd', 'url'=> array('settings/x10cmd')),
                          array('label'=>'Xanura CTX35', 'url'=> array('settings/ctx35')),
                       )),
                       array('label'=>'Z-Wave', 'url'=>'#', 'items'=>array(
                          array('label'=>'OpenZWave', 'url'=> array('settings/openzwave')),
                          array('label'=>'RaZberry', 'url'=> array('settings/razberry')),
                       )),
                    )),
                    array('label'=>'Energy Measurement', 'url'=>'#', 'items'=>array(
                       array('label'=>'Current Cost', 'url'=> array('settings/currentcost')),
                       array('label'=>'Plugwise', 'url'=> array('settings/plugwise')),
                       array('label'=>'SmartMeter', 'url'=> array('settings/nta8130')),
                    )),
                    array('label'=>'HDDTemp', 'url'=> array('settings/hddtemp')),
                    array('label'=>'HomeMatic', 'url'=> array('settings/homematic')),
                    array('label'=>'Input/Output', 'url'=>'#', 'items'=>array(
                       array('label'=>'KMTronic UDP', 'url'=> array('settings/kmtronicudp')),
                       array('label'=>'Velleman K8055', 'url'=> array('settings/k8055')),
                       array('label'=>'Weeder I/O', 'url'=> array('settings/weeder')),
                    )),
                    array('label'=>'Remote Control', 'url'=>'#', 'items'=>array(
                       array('label'=>'CF iViewer', 'url'=> array('settings/iviewer')),
                       array('label'=>'UIR/IRMan', 'url'=> array('settings/irman')),
                       array('label'=>'IRTrans', 'url'=> array('settings/irtrans')),
                       array('label'=>'LIRC', 'url'=> array('settings/lirc')),
                    )),
                    array('label'=>'LED Matrix', 'url'=> array('settings/ledmatrix')),
                    array('label'=>'Mobile', 'url'=>'#', 'items'=>array(
                       array('label'=>'Bluetooth', 'url'=> array('settings/bluetooth')),
                       array('label'=>'SMS Modem', 'url'=> array('settings/sms')),
                    )),
                    array('label'=>'Network Ping', 'url'=> array('settings/ping')),
                    array('label'=>'NMEA GPS', 'url'=> array('settings/gps')),
                    array('label'=>'OpenTherm', 'url'=> array('settings/opentherm')),
                    array('label'=>'RRDTool', 'url'=> array('settings/rrdtool')),
                    array('label'=>'RFXCom', 'url'=>'#', 'items'=>array(
                       array('label'=>'RFXCom Receiver', 'url'=> array('settings/rfxcomrx')),
                       array('label'=>'RFXCom Transmitter', 'url'=> array('settings/rfxcomtx')),
                       array('label'=>'RFXCom Transceiver', 'url'=> array('settings/rfxcomtrx')),
                       array('label'=>'RFXCom xPL', 'url'=> array('settings/rfxcomxpl')),
                    )),
                    array('label'=>'Security', 'url'=>'#', 'items'=>array(
                       array('label'=>'DSC Security', 'url'=> array('settings/dsc')),
                       array('label'=>'Visonic', 'url'=> array('settings/visonic')),
                    )),
                    array('label'=>'Shell', 'url'=> array('settings/shell')),
                    array('label'=>'UPS Monitor', 'url'=> array('settings/ups')),
                    array('label'=>'xPL', 'url'=> array('settings/xpl')),
	         )),
                array('label'=>Yii::t('translate','Devices'), 'visible'=>!Yii::app()->user->isGuest, 'url'=> '#', 'items'=>array(
                   array('label'=>Yii::t('translate','Add Device'), 'url'=> array('devices/create')),
                   array('label'=>Yii::t('translate','Modules, Groups ...'), 'url'=> '#'),
                )),
                array('label'=>'Edit', 'visible'=>!Yii::app()->user->isGuest, 'url'=>'#', 'items'=>array(
                   array('label'=>'Contacts', 'url'=> array('contacts/index')),
		)),
                array('label'=>'Events', 'visible'=>!Yii::app()->user->isGuest, 'url'=>'#', 'items'=>array(
                   array('label'=>'Events', 'url'=> array('events/index')),
                   array('label'=>'Triggers', 'url'=> array('triggers/index')),
                   array('label'=>'Conditions', 'url'=> array('conditions/index')),
                   array('label'=>'Actions', 'url'=> array('actions/index')),
		)),
                       array('label'=>'Gii', 'url'=> array('/gii'), 'visible'=>!Yii::app()->user->isGuest),
            ),
        ),
        '<form class="navbar-search pull-right" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
        array(
            'class'=>'bootstrap.widgets.TbNav',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>Yii::t('translate','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>Yii::t('translate','Logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('translate','About'), 'url'=>'#', 'items'=>array(
                    array('label'=>Yii::t('translate','Visit Project Website'), 'url'=>'http://domotiga.nl'),
                    array('label'=>Yii::t('translate','Donate to Project'), 'url'=>'https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=NT48KZRT7F3FA&lc=US&item_name=DomotiGa%20Open%20Source%20Project&item_number=domotiga&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted'),
		TbHtml::menuDivider(),
                    array('label'=>Yii::t('translate','About DomotiGa'), 'url'=> array('/site/about')),
                )),
            ),
        ),
    ),
)); ?>
</div>


<div class="container-fluid" id="page">
	<div class="row-fluid">
		<div class="span2">
			<div style="padding: 8px 0;" id="sidebar">
				<?php $this->widget('bootstrap.widgets.TbNav', array(
					'type' => TbHtml::NAV_TYPE_LIST,
					'items' => array(
 						array('label' => 'MENU'),
  						array('label' => Yii::t('translate','Devices'), 'url' => array('/devices/index'),'icon'=>'magic'),
   						array('label' => Yii::t('translate','Phone'), 'url' => array('cdr/index'), 'icon'=>'phone'),
						TbHtml::menuDivider(),
						array('label' => 'Help', 'icon'=>'flag', 'url' => '#'),
					)
				));
				?>
			</div><!-- sidebar -->
		</div><!-- span2 -->
		<div class="span10">
			<div style="padding: 8px 0;" id="content">
	
            <?php foreach(array('error', 'notice', 'success') as $key): ?>
                <?php if (Yii::app()->user->hasFlash($key)): ?>
                <div class="flash-<?php echo $key ?>">
                    <?php echo Yii::app()->user->getFlash($key) ?>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php echo $content; ?>
            </div>

	        <div id="footer">
            Credits and Copyright © <?php echo date("Y"); ?> <a href="http://www.domotiga.nl/" >DomotiGa</a> <a href="mailto:support@domotiga.nl"></a> by Ron Klinkien
	        </div><!-- footer -->

		</div><!-- span10 -->
	</div><!-- row-fluid -->
</div><!-- container-fluid -->



<?php $this->endContent(); ?>