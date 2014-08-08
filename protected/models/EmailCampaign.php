<?php

/**
 * This is the model class for table "email_campaign".
 *
 * The followings are the available columns in table 'email_campaign':
 * @property integer $campaign_id
 * @property string $campaign_for
 * @property string $campaign_title
 * @property string $campaign_description
 * @property string $campaign_is_active
 * @property string $campaign_created_on
 */
class EmailCampaign extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmailCampaign the static model class
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
		return 'email_campaign';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('campaign_for, campaign_title, campaign_description, campaign_created_on', 'required'),
			array('campaign_for', 'length', 'max'=>50),
			array('campaign_title', 'length', 'max'=>250),
			array('campaign_is_active', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('campaign_id, campaign_for, campaign_title, campaign_description, campaign_is_active, campaign_created_on', 'safe', 'on'=>'search'),
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
			'campaign_id' => 'Campaign',
			'campaign_for' => 'Campaign For',
			'campaign_title' => 'Campaign Title',
			'campaign_description' => 'Campaign Description',
			'campaign_is_active' => 'Campaign Is Active',
			'campaign_created_on' => 'Campaign Created On',
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

		$criteria->compare('campaign_id',$this->campaign_id);
		$criteria->compare('campaign_for',$this->campaign_for,true);
		$criteria->compare('campaign_title',$this->campaign_title,true);
		$criteria->compare('campaign_description',$this->campaign_description,true);
		$criteria->compare('campaign_is_active',$this->campaign_is_active,true);
		$criteria->compare('campaign_created_on',$this->campaign_created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}