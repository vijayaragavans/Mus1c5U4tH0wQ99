<?php

class WishlistController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAdd()
	{
		$album_id =  $_POST['album_id'];
		$user_id = Yii::app()->session['user_id'];
		if(empty($user_id))
		{
			echo 'login';
			die;
		}else{
			$info = new Wishlist;
			$info->album_id = $album_id;
			$info->user_id = $user_id;
			$info->wishlished_on = date('Y-m-d H:i:s');
			if( $info->save() )
			{
				echo 'success';
				die;	
			}
		}
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