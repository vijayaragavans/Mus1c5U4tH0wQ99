<?php

class UsersController extends Controller
{
	private $current_date;
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionFb(){
		$user_email = Yii::app()->request->getPost('uemail');
		$details = Users::model()->findByAttributes(array( "user_email"=>$user_email ));
		if( $details->user_id == null || empty($details->user_id) ){
			$dr = $this->Fbconnect();
			echo $dr;
		}else{
			$cat=Yii::app()->createController('site');//returns array containing controller instance and action index.
			$cat=$cat[0]; //get the controller instance.
			$cat->Session( $user_email ); //use a public method.
			echo 1;
			die;
		}
	}

	public function Fbconnect(){
		$this->current_date =  date('Y-m-d H:i:s');
		$model = new Users();
		$model->user_first_name = Yii::app()->request->getPost('ufirstname');
		$model->user_last_name = Yii::app()->request->getPost('ulastname');
		$model->user_email = Yii::app()->request->getPost('uemail');
		$model->user_password = md5('Paass121');
		$model->user_repassword = md5('Paass121');
		$model->user_created_on = date('Y-m-d H:i:s');
		if($model->validate() ){
			if( $model->save() ){
				$user_details_model = new UserDetails();
				$user_details_model->user_id = $model->user_id;
				$user_details_model->user_fb_id = Yii::app()->request->getPost('uid');
				$user_details_model->user_profile_name = Yii::app()->request->getPost('uname');
				$user_details_model->user_link = Yii::app()->request->getPost('user_link');
				$user_details_model->user_gender = Yii::app()->request->getPost('ugender');
				$user_details_model->user_avatar = Yii::app()->request->getPost('user_avatar');
				$user_details_model->user_source = 'facebook';
				$user_details_model->user_detail_updated_on = $this->current_date;
				$user_details_model->save();

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