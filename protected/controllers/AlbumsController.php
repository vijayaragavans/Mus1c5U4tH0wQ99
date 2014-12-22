<?php

class AlbumsController extends Controller
{
	public $pageDescription, $pageTitle, $siteName, $ogImage, $pageKeyword;	
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
	public function actionPreOrderMusic(  )
	{
		$url_input = explode( '/', Yii::app()->request->url);
		$album_code = end( $url_input );
		$model = new TblSongs;

	        		$order_music = $model->Get_Pre_Order_Music( $limit = 20  );		// Hot Compilations
	        		$count_of_order_music = $model->CountOfPreOrder( );
		$this->render('pre-order-music', array('pre_order_music' => $order_music, 'count_of_pre_order_music' => $count_of_order_music ) );		// HTML Rendering
	}

	public function actionCategory( )
	{
		$url_input = explode( '/', Yii::app()->request->url);
		$model = new TblSongs;
		$category_id = end( $url_input );
	        	$count_of_order_music = $model->CountOfCategoryMusic( $category_id );
		$this->render('category', array('category_id' => $category_id, 'count_of_order_music' => $count_of_order_music ) );		// HTML Rendering
	}

	public function actionGetCategorySongs( )
	{
                	$perPage = 5;
		$current_page = str_replace(array('Prev', 'Next'), '',   Yii::app()->request->getParam('current_page') );
	            if(empty($current_page) || $current_page == 1){
	                 $start_no = 0;
	            }else{
	                $start_no = ($current_page-1) * $perPage;
	            }
		$url_input = explode( '/', Yii::app()->request->url);
		$category_id = end( $url_input );
		$model = new TblSongs;
	        	$order_music = $model->GetCategoryMusic( $perPage, $start_no, $category_id );
	        	echo json_encode( $order_music );
	        	die;

	} 

	public function actionBrowsepreordermusic( )
	{
		$model = new TblSongs;
        		$pre_order_music = $model->Get_Pre_Order_Music( $limit = 20  );		// Hot Compilations
        		$count_of_pre_order_music = $model->CountOfPreOrder( );
        		echo json_encode( $pre_order_music );

	}
	public function actionDetails( )
	{
		error_reporting(0);
		$model = new TblSongs;
		$url_input = explode( '/', Yii::app()->request->url);
		$album_url_title = $url_input[count($url_input) - 2];
		$album_id = end( $url_input );
        		//$song_details = $model->Song_Details( $album_id , $album_url_title );		// Song Details
		$details = TblSongs::model()->findAllByAttributes(array('song_id'=> $album_id ));
		$this->Meta_Tag_Update( $details[0]->song_title, $details[0]->song_description, $details[0]->song_img_url );
		$audit = $this->Track_Album_Views( $album_id, $album_url_title, $details[0]->song_category, Yii::app()->session['user_id'] );
		$related_albums = TblSongs::model()->findAllByAttributes(array('song_category'=> $details[0]->song_category), 'song_id !=:song_id',
    array(':song_id'=> $album_id), array('order' => 'cong_created_on DESC'), array('limit' => 10));
		$songs_url = TblSongsUrl::model()->findAllByAttributes(array('song_id'=> $album_id ));
		$album_category = TblAlbumCategory::model()->findAllByAttributes(array('album_category_id'=> $details[0]->song_category ));
		$wishlish_info = Wishlist::model()->findAllByAttributes(array('album_id'=> $album_id, 'user_id' =>  Yii::app()->session['user_id'] ));
		$output = array(
				'details' => $details,
				'songs_url' => $songs_url,
				'album_category'	=> $album_category,
				'related_albums'	=> $related_albums,
				'wishlish_info'		=> $wishlish_info
			);
		$this->render('album_details', $output );		// HTML Rendering
	}

	public function Track_Album_Views( $album_id, $album_url_title, $album_category, $user_id ){
		$protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    		$fullurl = $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    		if( ( $_SERVER["HTTP_REFERER"] != '' ) && ( $_SERVER["HTTP_REFERER"] != $fullurl ) ){
			$track = new Trackviewdetails;
	        		require_once('protected/extensions/geo_lib.inc');
			$gi = geoip_open("protected/extensions/GeoLiteCity.dat", GEOIP_STANDARD);
			$track->user_ip				= $_SERVER['REMOTE_ADDR'];
			$record 		= geoip_record_by_addr($gi, $track->user_ip);
	    		$track->viewed_by =	$user_id;
	    		$track->album_id =	$album_id;
	    		$track->full_url = $fullurl;
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
    		}

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