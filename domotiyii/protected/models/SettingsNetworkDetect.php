<?php

/**
 * This is the model class for table "settings_networkdetect".
 *
 * The followings are the available columns in table 'settings_networkdetect':
 * @property integer $id
 * @property boolean $enabled
 * @property integer $polltime
 * @property boolean $enable_ping
 * @property boolean $enable_arpscan
 * @property integer $timeout
 * @property string $interface
 * @property boolean $debug
 */
class SettingsNetworkDetect extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsNetworkDetect the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings_networkdetect';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, polltime, timeout', 'numerical', 'integerOnly'=>true),
			array('enabled, enable_ping, enable_arpscan, debug', 'numerical'),
			array('interface', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, polltime, enable_ping, enable_arpscan, interface, debug', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'enabled' => 'Enabled',
			'polltime' => 'Poll Interval',
			'enable_ping' => 'Ping',
			'enable_arpscan' => 'Arp-Scan',
			'timeout' => 'Arp-Scan TimeOut',
			'interface' => 'Interface',
			'debug' => 'Debug',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('polltime',$this->polltime);
		$criteria->compare('enable_ping',$this->enable_ping);
		$criteria->compare('enable_arpscan',$this->enable_arpscan);
		$criteria->compare('timeout',$this->timeout);
		$criteria->compare('interface',$this->interface);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
