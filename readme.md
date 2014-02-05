DomotiYii - Pre alpha release!!!!
---------------------------------


**Please be aware before using this that is a pre alpha release and that it can harm your server.**


DomotiYii is a new web client build from scratch using the Yii framework together with the Yiistrap extension to add the bootstrap look and feel.



Development info:
----------------
This version of DomotiYii is build with:
Yii-1.1.14 - Framework
Source: https://github.com/yiisoft/yii/releases/download/1.1.14/yii-1.1.14.f0fee9.tar.gz

Yiistrap-1.2.0 - Twitter Bootstrap for Yii
Source: https://github.com/Crisu83/yiistrap/archive/1.2.0.zip


License:
-------
Both DomotiGa and DomotiYii are released under the terms of GNU GPL v3 license.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see http://www.gnu.org/licenses/.


How to install 'DomotiYii':
-------------------
Unpack domotiyii directory to /var/www, or put it's contents in the webroot.
This directory contains the Yii project and the Yii framework. For more information see http://domotiga.nl/projects/domotiyii/wiki/Installation


About the Yii Framework:
-------------
The framework directory contains the code from the Yii 1.1.14 file above.

If you want to use another name or location for this framework directory
change it's path in domotiyii/index.php.

The framework directory also contains and handful of patches, you can find them with a fgrep -R 'RDNZL'

These are the changed files:
Correctly map booleans from mysql database tables:
framework/db/schema/mysql/CMysqlColumnSchema.php
framework/db/schema/CDbColumnSchema.php

Generate correct settings forms with bootstrap widgets:
framework/gii/generators/form/templates/default/action.php
framework/gii/generators/form/templates/default/form.php


Correct permissions:
-------------------
The assets folder must be writable by the Web server (usually www-data), same for protected/models and protected/runtime
so Gii can generate files there.


Configure DomotiYii:
-------------------
Config file is protected/config/main.php

Gii is enabled.
Gii is a Web-based tool that you will use to generate Models, Views, and Controllers for the application. 
Change it's password here, also change ipFilter so it contains your local subnet.

    'class'=>'system.gii.GiiModule',
                        'password'=>'Giiha',
                        'ipFilters' => array('127.0.0.1', '192.168.*.*'),

Interface login is hardcoded to admin/admin right now.

Check DomotiGa database name, location and user/password.

                'db'=>array(
                        'connectionString' => 'mysql:host=localhost;dbname=domotiga',
                        'emulatePrepare' => true,
                        'username' => 'domouser',
                        'password' => 'kung-fu',
                        'charset' => 'utf8',

Check JSON-RPC host url
        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'=>array(
                'jsonrpcHost'=>'http://localhost:9090',


Webserver installation:
----------------------

This code is tested with the folowing webserver configurations.
Choose lighttpd if you want to use a small embedded system.


Configure Apache:
----------------

This is to give .htaccess permission so index.php is removed from urls.
There is a .htaccess file in domotiyii directory which does this.

Enable mod rewrite:
$ sudo a2enmod rewrite

Add this section to /etc/apache2/sites-enabled/000-default

        <directory /var/www/domotiyii/>
                allowoverride all
        </directory>

restart
$ sudo service apache2 restart


Configure lighttpd:
------------------

# apt-get install lighttpd
# apt-get install php5-common php5-cgi php5 php5-mysql php5-gd

# lighty-enable-mod fastcgi-php

# cp config/99-domotiyii.conf /etc/lighttpd/conf-available/

# lighty-enable-mod domotiyii
Enabling domotiyii: ok

# /etc/init.d/lighttpd force-reload
If you get errors about duplicate fastcgi entries, remove the lines from 99-domotiyii.conf and try again.


Logging and debugging:
---------------------

Optional Enable/disable logging on web pages:
                             // uncomment the following to show log messages on web pages
                                array(
                                        'class'=>'CWebLogRoute',
                                ),


Optional Enable debugging for development:
vi index.php
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);


Notes about Coding:
------------------

To add a new 'static/no form' page like site/about:

Edit protected/controllers/SiteController.php
add section like

        public function actionAbout()
        {
                // renders the view file 'protected/views/site/index.php'
                // using the default layout 'protected/views/layouts/main.php'
                $this->render('about');
        }

Create page under protected/views/site/about.php

To add a new settings form follow these steps:

Login
Enter Gii

Generate a model:
Goto Model Generator
Fill in database table to generate model for
Table Name:
eg settings_smartvisu
Model Class:
SettingsSmartvisu
Click preview, Click generate
If permission denied

Generate a form:
Goto Form Generator
Model Class
SettingsSmartvisu
View Name
settings/smartvisu
Click preview, Click generate
Copy controller class code (without first line <?php...) to controllers/SettingsController.php
Alter code similar to other settings code.
Add page to menu if needed.

