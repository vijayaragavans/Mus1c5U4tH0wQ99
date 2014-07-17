<?php

class UserdetailsController extends Controller
{
	private $current_date;
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionEditprofile()
	{
		$this->current_date = date('Y-m-d H:i:s');
		$user_id = Yii::app()->session['user_id'];
		$model = new Users();
		$userdetails = new UserDetails();		
		// Getting user information ( JOINS Query )
/*			$data = Yii::app()->db->createCommand()
				  ->select('*')
				  ->from('users')
				  ->leftJoin('user_details', 'user_details.user_id=users.user_id')
				  ->where('users.user_id=:id', array(':id'=> $user_id ))
				  ->queryRow();
*/
		$model = Users::model()->findByPk($user_id);
		$user_password = $model->user_password;
		$userdetails = UserDetails::model()->findByAttributes( array( 'user_id' => $user_id) );
		if( isset( $_POST['UserDetails'] )  || isset( $_POST['Users'] ))
		{
			//$model->attributes = $_POST['Users'];
				$model->user_first_name = $_POST['Users']['user_first_name'];
				$model->user_last_name = $_POST['Users']['user_last_name'];
				$model->user_email = $_POST['Users']['user_email'];
			if( $_POST['Users']['user_password'] != ''){
				 $model->user_password = md5( $_POST['Users']['user_password'] );
				 $model->user_repassword = md5( $_POST['Users']['user_repassword'] );				
			}else{
				$model->user_password = $user_password;
				$model->user_repassword = $user_password;			
			}
			if($model->validate()){
				$model->user_updated_on = $this->current_date;
				$model->save();				
			}
			$userdetails->attributes = $_POST['UserDetails'];
			if($userdetails->validate()){
				$userdetails->save();				
			}
		}
		$this->render('editprofile', array('model' => $model, 'userdetails' => $userdetails ));
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