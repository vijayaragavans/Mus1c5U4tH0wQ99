<?php

class BrowseController extends Controller
{
	public function actionIndex()
	{
		$url_input = explode( '/', Yii::app()->request->url);
		$category = end( $url_input );
		$this->render('index', array('category_id' => $category ) );
	}

	public function actionGetalbumsbyfav()
	{
		$url_input = explode( '/', Yii::app()->request->url);
		//$album_url_title = $url_input[count($url_input) - 2];
		$category = end( $url_input );
		$model = new TblSongs;
		$details = $model->Browsebyfav( $category );
		echo json_encode($details);
		die;
	}


	function actionGetalbumbynew( )
	{
		$url_input = explode( '/', Yii::app()->request->url);
		//$album_url_title = $url_input[count($url_input) - 2];
		$category = end( $url_input );
		$model = new TblSongs;
		$details = $model->Browsebynew( $category );
		echo json_encode($details);
		die;
	}

	function actionGetalbumbypopular( )
	{
		$url_input = explode( '/', Yii::app()->request->url);
		//$album_url_title = $url_input[count($url_input) - 2];
		$category = end( $url_input );
		$model = new TblSongs;
		$details = $model->Browsebypopular( $category );
		echo json_encode($details);
		die;
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