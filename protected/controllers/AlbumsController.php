<?php

class AlbumsController extends Controller
{
	public function actionIndex()
	{

		$model = new TblSongs();
        		$slider_img = $model->Get_Latest_Songs( $params = 'song_img_url' , $limit = 5 );
        		$international_songs = $model->Songs_List( $params = 2 , $limit = 15 );		// International Hits
        		$films = $model->Songs_List( $params = 3 , $limit = 15 );		// Films

        		$arg = array( 
        				'slider' => $slider_img, 
        				'international_songs' => $international_songs, 
        				'films' => $films 
        			);

		$this->render('index', $arg );		// HTML Rendering
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