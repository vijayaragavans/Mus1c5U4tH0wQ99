<?php

class MailController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function Mailer( $first_name, $email, $campaign_for )
	{
	              $email_content = EmailCampaign::model()->findByAttributes(array("campaign_for" => $campaign_for ));
		$to = $email;
		$header = "From: info.haiinteractive@gmail.com\r\n"; 
		$header.= "MIME-Version: 1.0\r\n"; 
		$header.= "Content-Type: text/html; charset=utf-8\r\n"; 
		$header.= "X-Priority: 1\r\n"; 
		$subject = $email_content['campaign_title'];
		$message = str_replace(array('{USER_NAME}'), array( $first_name ), $email_content['campaign_description']);
		//send( TO_NAME, TO_ADDR, $subject, $message );
		mail( $to, $subject, $message, $header );				
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