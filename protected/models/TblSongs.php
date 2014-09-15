<?php

/**
 * This is the model class for table "tbl_songs".
 *
 * The followings are the available columns in table 'tbl_songs':
 * @property integer $song_id
 * @property string $song_title
 * @property integer $song_category
 * @property string $song_img_url
 * @property string $song_url
 * @property string $song_description
 * @property string $song_tags
 * @property string $cong_created_on
 */
class TblSongs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblSongs the static model class
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
		return 'tbl_songs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('song_title, song_category, song_img_url,  song_price, song_description, song_tags, cong_created_on', 'required'),
			array('song_category', 'numerical', 'integerOnly'=>true),
			array('song_title, song_img_url', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('song_id, song_title, song_category, song_img_url,  song_price, song_description, song_tags, cong_created_on', 'safe', 'on'=>'search'),
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
			'song_id' => 'Song',
			'song_title' => 'Song Title',
			'song_category' => 'Song Category',
			'song_img_url' => 'Song Img Url',
			'song_price'	=> 'Song Price',
			'song_description' => 'Song Description',
			'song_tags' => 'Song Tags',
			'cong_created_on' => 'Cong Created On',
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

		$criteria->compare('song_id',$this->song_id);
		$criteria->compare('song_title',$this->song_title,true);
		$criteria->compare('song_category',$this->song_category);
		$criteria->compare('song_img_url',$this->song_img_url,true);
		$criteria->compare('song_price',$this->song_price,true);
		$criteria->compare('song_description',$this->song_description,true);
		$criteria->compare('song_tags',$this->song_tags,true);
		$criteria->compare('cong_created_on',$this->cong_created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	function Get_Latest_Songs( $params,  $limit )
	{		
		//$criteria = new CDbCriteria(array('select'=>'song_img_url', 'order'=>'cong_created_on DESC', 'limit' => $limit));
	        	$criteria = new CDbCriteria;
	        	$criteria->select = 'song_img_url';
	        	//$criteria->params = array( 'song_img_url' );
	        	$criteria->order = 'cong_created_on DESC';
	        	$criteria->limit = $limit;
	        	$output = TblSongs::model()->findAll( $criteria );
	        	return($output);
	}

	function Songs_List( $params, $limit )
	{
	        	$criteria = new CDbCriteria;
	        	$criteria->select = 'song_id, song_url_title, song_title, song_img_url';
	        	$criteria->condition = "song_album_page_category_id = $params";
	        	//$criteria->params = array( 'song_img_url' );
	        	$criteria->order = 'cong_created_on DESC';
	        	$criteria->limit = $limit;
	        	$output = TblSongs::model()->findAll( $criteria );
	        	return($output);		
	}

	function Song_Details( $album_id, $album_url_title )
	{
	        	$criteria = new CDbCriteria;
	        	$criteria->select = '*';
	        	 $criteria->join = ' LEFT JOIN `tbl_songs_url` AS `tu` ON tu.song_id = t.song_id';
	        	$criteria->condition = "t.song_url_title = '$album_url_title'";
	        	//$criteria->params = array( 'song_img_url' );
	        	$output = TblSongs::model()->findAll( $criteria );
	        	return($output);		
	}


}