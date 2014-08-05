<?php

/**
 * This is the model class for table "subscribers".
 *
 * The followings are the available columns in table 'subscribers':
 * @property integer $subscribe_id
 * @property string $subscribe_name
 * @property string $subscribe_email
 * @property string $utm_source
 * @property string $utm_medium
 * @property string $utm_term
 * @property string $utm_content
 * @property string $utm_campaign
 * @property string $subscribed_on
 */
class Subscribers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Subscribers the static model class
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
		return 'subscribers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subscribe_name, subscribe_email, subscribed_on', 'required'),
			array('subscribe_name, subscribe_email', 'length', 'max'=>250),
			array('utm_source, utm_medium, utm_term, utm_content, utm_campaign', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('subscribe_id, subscribe_name, subscribe_email, utm_source, utm_medium, utm_term, utm_content, utm_campaign, subscribed_on', 'safe', 'on'=>'search'),
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
			'subscribe_id' => 'Subscribe',
			'subscribe_name' => 'Subscribe Name',
			'subscribe_email' => 'Subscribe Email',
			'utm_source' => 'Utm Source',
			'utm_medium' => 'Utm Medium',
			'utm_term' => 'Utm Term',
			'utm_content' => 'Utm Content',
			'utm_campaign' => 'Utm Campaign',
			'subscribed_on' => 'Subscribed On',
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

		$criteria->compare('subscribe_id',$this->subscribe_id);
		$criteria->compare('subscribe_name',$this->subscribe_name,true);
		$criteria->compare('subscribe_email',$this->subscribe_email,true);
		$criteria->compare('utm_source',$this->utm_source,true);
		$criteria->compare('utm_medium',$this->utm_medium,true);
		$criteria->compare('utm_term',$this->utm_term,true);
		$criteria->compare('utm_content',$this->utm_content,true);
		$criteria->compare('utm_campaign',$this->utm_campaign,true);
		$criteria->compare('subscribed_on',$this->subscribed_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}