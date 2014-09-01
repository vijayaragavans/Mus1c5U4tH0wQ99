<?php

/**
 * This is the model class for table "track_view_details".
 *
 * The followings are the available columns in table 'track_view_details':
 * @property string $track_id
 * @property string $full_url
 * @property integer $viewed_by
 * @property string $album_url_title
 * @property string $user_ip
 * @property integer $album_category_id
 * @property integer $album_id
 * @property string $user_country
 * @property string $user_country_code
 * @property string $user_region_name
 * @property string $user_region_code
 * @property string $user_latitude
 * @property string $user_longitude
 * @property string $user_time_zone
 * @property string $user_postal_code
 * @property string $user_continent_code
 * @property string $user_city
 * @property string $created_on
 */
class Trackviewdetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Trackviewdetails the static model class
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
		return 'track_view_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('viewed_by, album_category_id, album_id', 'numerical', 'integerOnly'=>true),
			array('full_url, album_url_title', 'length', 'max'=>250),
			array('user_ip', 'length', 'max'=>20),
			array('user_country, user_time_zone', 'length', 'max'=>50),
			array('user_country_code, user_region_code', 'length', 'max'=>5),
			array('user_region_name', 'length', 'max'=>75),
			array('user_latitude, user_longitude, user_postal_code, user_continent_code', 'length', 'max'=>25),
			array('user_city', 'length', 'max'=>45),
			array('created_on', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('track_id, full_url, viewed_by, album_url_title, user_ip, album_category_id, album_id, user_country, user_country_code, user_region_name, user_region_code, user_latitude, user_longitude, user_time_zone, user_postal_code, user_continent_code, user_city, created_on', 'safe', 'on'=>'search'),
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
			'track_id' => 'Track',
			'full_url' => 'Full Url',
			'viewed_by' => 'Viewed By',
			'album_url_title' => 'Album Url Title',
			'user_ip' => 'User Ip',
			'album_category_id' => 'Album Category',
			'album_id' => 'Album',
			'user_country' => 'User Country',
			'user_country_code' => 'User Country Code',
			'user_region_name' => 'User Region Name',
			'user_region_code' => 'User Region Code',
			'user_latitude' => 'User Latitude',
			'user_longitude' => 'User Longitude',
			'user_time_zone' => 'User Time Zone',
			'user_postal_code' => 'User Postal Code',
			'user_continent_code' => 'User Continent Code',
			'user_city' => 'User City',
			'created_on' => 'Created On',
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

		$criteria->compare('track_id',$this->track_id,true);
		$criteria->compare('full_url',$this->full_url,true);
		$criteria->compare('viewed_by',$this->viewed_by);
		$criteria->compare('album_url_title',$this->album_url_title,true);
		$criteria->compare('user_ip',$this->user_ip,true);
		$criteria->compare('album_category_id',$this->album_category_id);
		$criteria->compare('album_id',$this->album_id);
		$criteria->compare('user_country',$this->user_country,true);
		$criteria->compare('user_country_code',$this->user_country_code,true);
		$criteria->compare('user_region_name',$this->user_region_name,true);
		$criteria->compare('user_region_code',$this->user_region_code,true);
		$criteria->compare('user_latitude',$this->user_latitude,true);
		$criteria->compare('user_longitude',$this->user_longitude,true);
		$criteria->compare('user_time_zone',$this->user_time_zone,true);
		$criteria->compare('user_postal_code',$this->user_postal_code,true);
		$criteria->compare('user_continent_code',$this->user_continent_code,true);
		$criteria->compare('user_city',$this->user_city,true);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}