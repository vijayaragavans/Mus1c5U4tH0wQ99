<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $user_id
 * @property string $user_first_name
 * @property string $user_last_name
 * @property string $user_email
 * @property string $user_password
 * @property string $user_thumb
 * @property string $user_is_active
 * @property string $user_created_on
 * @property string $user_updated_on
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public  $user_repassword;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_first_name, user_last_name, user_email', 'required'),
			 array('user_password, user_repassword', 'required', 'on'=>'insert'),
			array('user_first_name, user_last_name, user_email, user_password, user_thumb', 'length', 'max'=>250),
			array('user_is_active', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, user_first_name, user_last_name, user_email, user_password, user_thumb, user_is_active, user_created_on, user_updated_on', 'safe', 'on'=>'search'),
			array('user_repassword', 'compare', 'compareAttribute'=>'user_password'),

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
			'user_id' => 'User',
			'user_first_name' => 'User First Name',
			'user_last_name' => 'User Last Name',
			'user_email' => 'User Email',
			'user_password' => 'User Password',
			'user_thumb' => 'User Thumb',
			'user_is_active' => 'User Is Active',
			'user_created_on' => 'User Created On',
			'user_updated_on' => 'User Updated On',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_first_name',$this->user_first_name,true);
		$criteria->compare('user_last_name',$this->user_last_name,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_thumb',$this->user_thumb,true);
		$criteria->compare('user_is_active',$this->user_is_active,true);
		$criteria->compare('user_created_on',$this->user_created_on,true);
		$criteria->compare('user_updated_on',$this->user_updated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}