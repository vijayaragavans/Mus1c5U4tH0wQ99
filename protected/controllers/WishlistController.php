<?php

class WishlistController extends Controller
{
	public function actionIndex()
	{
		$user_id = Yii::app()->session['user_id'];
		$model = new Wishlist;
		//$wishlist_history = Wishlist::model()->with('album','user')->findAll('user_id = :user_id', array(':user_id'=> $user_id ));
		$wishlist_history = $model->Wishlist_History( $user_id );
		$this->render('index', array( 'wishlist_history' => $wishlist_history) );
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

	public function actionRemove()
	{
		$wishlist_id = Yii::app()->request->getPost('wishlist_id');
		$response = Wishlist::model()->deleteAll( 'wishlist_id =' .$wishlist_id);
		echo $response;
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