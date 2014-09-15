<?php

/**
 * This is the model class for table "wishlist".
 *
 * The followings are the available columns in table 'wishlist':
 * @property integer $wishlist_id
 * @property integer $album_id
 * @property integer $user_id
 * @property string $wishlished_on
 *
 * The followings are the available model relations:
 * @property TblSongs $album
 * @property Users $user
 */
class Wishlist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Wishlist the static model class
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
		return 'wishlist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('album_id, user_id, wishlished_on', 'required'),
			array('album_id, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('wishlist_id, album_id, user_id, wishlished_on', 'safe', 'on'=>'search'),
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
			'album' => array(self::BELONGS_TO, 'TblSongs', 'album_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'wishlist_id' => 'Wishlist',
			'album_id' => 'Album',
			'user_id' => 'User',
			'wishlished_on' => 'Wishlished On',
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

		$criteria->compare('wishlist_id',$this->wishlist_id);
		$criteria->compare('album_id',$this->album_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('wishlished_on',$this->wishlished_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	function Wishlist_History( $user_id )
	{
		$rows = Yii::app()->db->createCommand()
		            ->select('*')
		            ->from('wishlist w')
		            ->join('tbl_songs s','w.album_id = s.song_id')
		            ->join('users u', 'w.user_id = u.user_id')
		            ->where('w.user_id=:user_id', array(':user_id'=>$user_id))
		            ->queryAll();
		           return $rows;
          	}	
}