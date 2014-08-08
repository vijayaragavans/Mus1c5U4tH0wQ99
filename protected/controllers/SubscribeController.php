<?php

class SubscribeController extends Controller
{
	public function actionIndex()
	{
		$model = new Subscribers;
		// collect user input data
		if( isset($_REQUEST['Subscribers']) )
		{
			$model->attributes = $_REQUEST['Subscribers'];
			$model->subscribed_on = date('Y-m-d H:i:s');
			if( $model->validate( ) )
			{
				$response = Subscribers::model()->findByAttributes( array("subscribe_email" => $model->subscribe_email ) );
				if( empty( $response ) ){
					$model->utm_source = $_GET['utm_source'];
					$model->utm_medium = $_GET['utm_medium'];
					$model->utm_term = $_GET['utm_term'];
					$model->utm_content = $_GET['utm_content'];
					$model->utm_campaign = $_GET['utm_campaign'];
					$model->save();
					$mail=Yii::app()->createController('mail');		//returns array containing controller instance and action index.
					$response  = $mail[0]->Mailer( $model->subscribe_name, $model->subscribe_email, 'Subscription' );
					Yii::app()->user->setFlash('subscribed','Thank you for Subscribed.');
				}else{
					Yii::app()->user->setFlash('subscribed_exist','You have already Subscribed with Us.');
				}
			}
		}
		$this->render('index', array('model' => $model) );
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