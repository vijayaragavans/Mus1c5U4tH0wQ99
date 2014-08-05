<?php

/**
 * This is the model class for table "tbl_songs_url".
 *
 * The followings are the available columns in table 'tbl_songs_url':
 * @property integer $song_url_id
 * @property integer $song_id
 * @property string $song_url
 * @property string $song_created_on
 */
class TblSongsUrl extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblSongsUrl the static model class
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
		return 'tbl_songs_url';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('song_id, song_url, song_created_on', 'required'),
			array('song_id', 'numerical', 'integerOnly'=>true),
			array('song_url', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('song_url_id, song_id, song_url, song_created_on', 'safe', 'on'=>'search'),
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
			'song_url_id' => 'Song Url',
			'song_id' => 'Song',
			'song_url' => 'Song Url',
			'song_created_on' => 'Song Created On',
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

		$criteria->compare('song_url_id',$this->song_url_id);
		$criteria->compare('song_id',$this->song_id);
		$criteria->compare('song_url',$this->song_url,true);
		$criteria->compare('song_created_on',$this->song_created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}