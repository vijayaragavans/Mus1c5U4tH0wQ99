<?php

class BrowseController extends Controller
{
      private $perPage;

        public function actionIndex()
	{
		$url_input = explode( '/', Yii::app()->request->url);
		$category = end( $url_input );
		$this->render('index', array('category_id' => $category ) );
                
	}

	public function actionGetalbumsbyfav()
	{
                $perPage = 5;
		$current_page = str_replace(array('Prev', 'Next'), '',   Yii::app()->request->getParam('current_page') );
                
	            if(empty($current_page) || $current_page == 1){
	                 $start_no = 0;
	            }else{
	                $start_no = ($current_page-1) * $perPage;
	            }

                $url_input = explode( '/', Yii::app()->request->url);
		//$album_url_title = $url_input[count($url_input) - 2];
		$category = end( $url_input );
		$model = new TblSongs;
		$details = $model->Browsebyfav( $category, $perPage, $start_no );
		echo json_encode($details);
		die;
	}


	function actionGetalbumbynew( )
	{
              
                $perPage = 5;
		$current_page = str_replace(array('Prev', 'Next'), '',   Yii::app()->request->getParam('current_page') );
                
	            if(empty($current_page) || $current_page == 1){
	                 $start_no = 0;
	            }else{
	                $start_no = ($current_page-1) * $perPage;
	            }

                $url_input = explode( '/', Yii::app()->request->url);
		//$album_url_title = $url_input[count($url_input) - 2];
		$category = end( $url_input );
		$model = new TblSongs;
		$details = $model->Browsebynew( $category, $perPage, $start_no  );
		echo json_encode($details);
		die;
	}

	function actionGetalbumbypopular( )
	{
                $perPage = 5;
		$current_page = str_replace(array('Prev', 'Next'), '',   Yii::app()->request->getParam('current_page') );
                
	            if(empty($current_page) || $current_page == 1){
	                 $start_no = 0;
	            }else{
	                $start_no = ($current_page-1) * $perPage;
	            }

                $url_input = explode( '/', Yii::app()->request->url);
		//$album_url_title = $url_input[count($url_input) - 2];
		$category = end( $url_input );
		$model = new TblSongs;
		$details = $model->Browsebypopular( $category, $perPage, $start_no   );
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