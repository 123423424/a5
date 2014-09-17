<?php

/**
 * This is the model class for table "{{orders}}".
 *
 * The followings are the available columns in table '{{orders}}':
 * @property integer $id
 * @property string $ipClient
 * @property string $ip
 * @property string $Date
 * @property integer $visible
 * @property string $idFile
 * @property string $type
 * @property string $type_other
 * @property string $topic
 * @property string $item
 * @property string $datepicker
 * @property string $sources
 * @property string $requirement
 * @property string $name
 * @property string $phone
 * @property string $mail
 * @property string $pass
 * @property string $vk
 * @property string $institution
 * @property string $volume
 */
class Orders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{orders}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ip, Date, idFile', 'required'),
			array('visible', 'numerical', 'integerOnly'=>true),
			array('ipClient, ip, idFile', 'length', 'max'=>10),
			array('type, type_other, topic, item, datepicker, sources, requirement, name, phone, mail, pass, vk, institution, volume', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ipClient, ip, Date, visible, idFile, type, type_other, topic, item, datepicker, sources, requirement, name, phone, mail, pass, vk, institution, volume', 'safe', 'on'=>'search'),
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
			'ipClient' => 'Ip Client',
			'ip' => 'Ip',
			'Date' => 'Date',
			'visible' => 'Visible',
			'idFile' => 'Id File',
			'type' => 'Type',
			'type_other' => 'Type Other',
			'topic' => 'Topic',
			'item' => 'Item',
			'datepicker' => 'Datepicker',
			'sources' => 'Sources',
			'requirement' => 'Requirement',
			'name' => 'Name',
			'phone' => 'Phone',
			'mail' => 'Mail',
			'pass' => 'Pass',
			'vk' => 'Vk',
			'institution' => 'Institution',
			'volume' => 'Volume',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ipClient',$this->ipClient,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('idFile',$this->idFile,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('type_other',$this->type_other,true);
		$criteria->compare('topic',$this->topic,true);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('datepicker',$this->datepicker,true);
		$criteria->compare('sources',$this->sources,true);
		$criteria->compare('requirement',$this->requirement,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('vk',$this->vk,true);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('volume',$this->volume,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
