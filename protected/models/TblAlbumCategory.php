<?php

/**
 * This is the model class for table "tbl_album_category".
 *
 * The followings are the available columns in table 'tbl_album_category':
 * @property integer $album_category_id
 * @property string $album_category_name
 * @property integer $album_category_created_by
 * @property string $album_category_is_active
 * @property string $album_category_created_on
 */
class TblAlbumCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblAlbumCategory the static model class
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
		return 'tbl_album_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('album_category_name, album_category_created_by, album_category_created_on', 'required'),
			array('album_category_created_by', 'numerical', 'integerOnly'=>true),
			array('album_category_name', 'length', 'max'=>250),
			array('album_category_is_active', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('album_category_id, album_category_name, album_category_created_by, album_category_is_active, album_category_created_on', 'safe', 'on'=>'search'),
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
			'album_category_id' => 'Album Category',
			'album_category_name' => 'Album Category Name',
			'album_category_created_by' => 'Album Category Created By',
			'album_category_is_active' => 'Album Category Is Active',
			'album_category_created_on' => 'Album Category Created On',
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

		$criteria->compare('album_category_id',$this->album_category_id);
		$criteria->compare('album_category_name',$this->album_category_name,true);
		$criteria->compare('album_category_created_by',$this->album_category_created_by);
		$criteria->compare('album_category_is_active',$this->album_category_is_active,true);
		$criteria->compare('album_category_created_on',$this->album_category_created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}