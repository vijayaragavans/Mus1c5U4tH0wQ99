<?php

class AlbumsController extends Controller
{
	public $pageDescription	, $pageTitle, $siteName, $ogImage, $pageKeyword;	
	public function actionIndex()
	{

		$model = new TblSongs;
		$categories = TblAlbumCategory::model()->findAllByAttributes(array('album_category_is_active'=> 'Y' ));
        		$slider_img = $model->Get_Latest_Songs( $params = 'song_img_url' , $limit = 5 );
        		$international_songs = $model->Songs_List( $params = 2 , $limit = 15 );		// International Hits
        		$films = $model->Songs_List( $params = 3 , $limit = 15 );		// Films
        		$hot_compilations = $model->Songs_List( $params = 4 , $limit = 15 );		// Hot Compilations
        		$arg = array( 
        				'slider' => $slider_img, 
        				'international_songs' => $international_songs, 
        				'films' => $films ,
        				'hot_compilations'	=> $hot_compilations,
        				'categories'	=> $categories
        			);

		$this->render('index', $arg );		// HTML Rendering
	}

	public function actionDetails( )
	{
		error_reporting(0);
		$model = new TblSongs;
		$rt = explode( '/', Yii::app()->request->url);
		$album_url_title = $rt[count($rt) - 2];
		$album_id = end( $rt );
        		//$song_details = $model->Song_Details( $album_id , $album_url_title );		// Song Details
		$details = TblSongs::model()->findAllByAttributes(array('song_id'=> $album_id ));
		$this->Meta_Tag_Update( $details[0]->song_title, $details[0]->song_description, $details[0]->song_img_url );
		$rt = $this->Track_Album_Views( $album_id, $album_url_title, $details[0]->song_category, Yii::app()->session['user_id'] );
		$songs_url = TblSongsUrl::model()->findAllByAttributes(array('song_id'=> $album_id ));
		$output = array(
				'details' => $details,
				'songs_url' => $songs_url
			);
		$this->render('album_details', $output );		// HTML Rendering
	}

	public function Track_Album_Views( $album_id, $album_url_title, $album_category, $user_id ){
		$track = new Trackviewdetails;
        		require_once('protected/extensions/geo_lib.inc');
		$gi = geoip_open("protected/extensions/GeoLiteCity.dat", GEOIP_STANDARD);
		$track->user_ip				= $_SERVER['REMOTE_ADDR'];
		$record 		= geoip_record_by_addr($gi, $track->user_ip);
		$protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    		$track->full_url = $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    		$track->viewed_by =	$user_id;
    		$track->album_id =	$album_id;
		$track->album_url_title =	$album_url_title;
		$track->album_category_id =	$album_category;
		$track->user_country	= $record->country_name;
		$track->user_country_code	= $record->country_code;
		$track->user_region_name	= $record->region_name;
		$track->user_region_code	= $record->region_code;
		$track->user_latitude	= $record->latitude;
		$track->user_longitude	= $record->longitude;
		$track->user_time_zone	= $record->time_zone;
		$track->user_postal_code	= $record->postal_code;
		$track->user_continent_code	= $record->continent_code;
		$track->user_city			= $record->city;	
		$track->created_on			= date('Y-m-d H:i:s');	
		$track->save();
		return true;
	}

	public function Meta_Tag_Update( $song_title, $song_description,  $album_img_url )
	{
		$this->pageTitle = $song_title;
		$this->siteName = Yii::app()->params['Site_Name'];
		$this->ogImage = Yii::app()->params['song_url'].'songs_thumb/'.$album_img_url;
		$this->pageKeyword = Yii::app()->params['page_Keyword'];
		$this->pageDescription = $song_description;
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}