<?php

/**
 * This is the model class for table "user_details".
 *
 * The followings are the available columns in table 'user_details':
 * @property integer $user_detail_id
 * @property integer $user_id
 * @property string $user_fb_id
 * @property string $user_profile_name
 * @property string $user_link
 * @property string $user_gender
 * @property string $user_avatar
 * @property string $user_source
 * @property string $user_detail_updated_on
 */
class UserDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserDetails the static model class
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
		return 'user_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, user_source, user_detail_updated_on', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('user_fb_id', 'length', 'max'=>20),
			array('user_profile_name, user_link, user_avatar', 'length', 'max'=>250),
			array('user_gender, user_source', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_detail_id, user_id, user_fb_id, user_profile_name, user_link, user_gender, user_avatar, user_source, user_detail_updated_on', 'safe', 'on'=>'search'),
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
			'user_detail_id' => 'User Detail',
			'user_id' => 'User',
			'user_fb_id' => 'User Fb',
			'user_profile_name' => 'User Profile Name',
			'user_link' => 'User Link',
			'user_gender' => 'User Gender',
			'user_avatar' => 'User Avatar',
			'user_source' => 'User Source',
			'user_detail_updated_on' => 'User Detail Updated On',
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

		$criteria->compare('user_detail_id',$this->user_detail_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_fb_id',$this->user_fb_id,true);
		$criteria->compare('user_profile_name',$this->user_profile_name,true);
		$criteria->compare('user_link',$this->user_link,true);
		$criteria->compare('user_gender',$this->user_gender,true);
		$criteria->compare('user_avatar',$this->user_avatar,true);
		$criteria->compare('user_source',$this->user_source,true);
		$criteria->compare('user_detail_updated_on',$this->user_detail_updated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}