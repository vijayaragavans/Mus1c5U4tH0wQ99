<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	private $current_date;
	public function actions()
	{
		ob_start();
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
	        $criteria = new CDbCriteria;
	        $criteria->order = "song_id desc";
	        $criteria->limit = 12;
		$songs = TblSongs::model()->findAll( $criteria ); 
		$model = new TblSongs;
		$favsongs = $model->Browsebyfav( '', 9, 1 );
		$newsongs = $model->Browsebynew( '', 9, 1 );
		$popularsongs = $model->Browsebypopular( '', 9, 1 );

		$this->render('index',array('songs'=>$songs, 'favsongs' => $favsongs, 'newsongs' => $newsongs, 'popularsongs' => $popularsongs ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		( Yii::app()->session['user_id'] > 0 ) ? $this->redirect( Yii::app()->baseUrl .'/index.php/site/index') : '';
		$model=new LoginForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionSignup(){
                date_default_timezone_set("Asia/Kolkata");
                
		$this->current_date =  date('Y-m-d H:i:s');
		( Yii::app()->session['user_id'] > 0 ) ? $this->redirect( Yii::app()->baseUrl .'/index.php/site/index') : '';
		$model=new Users;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='signup-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];		
			// validate user input and redirect to the previous page if valid
			if($model->validate() ){
				  $model->user_first_name = $_POST['Users']['user_first_name'];
				  $model->user_last_name = $_POST['Users']['user_last_name'];
				  $model->user_email = $_POST['Users']['user_email'];
				  $model->user_repassword= MD5( $_POST['Users']['user_repassword'] ) ;
				  $model->user_password= MD5( $_POST['Users']['user_password'] ) ;
				  $model->user_created_on = date('Y-m-d H:i:s');
				 if( $model->save() ){
				 	$response = new UserDetails();
				 	$response->user_id = $model->user_id;
				 	$response->user_source = 'direct';
					$response->user_detail_updated_on = $this->current_date;
				 	$response->save();
					 /*
					 *	Session Setup for User Information
					 */

					$mail=Yii::app()->createController('mail');		//returns array containing controller instance and action index.
					$mail[0]->Mailer( $_POST['Users']['user_first_name'], $_POST['Users']['user_email'], 'Registration' );
					 $this->Session( $_POST['Users']['user_email'] );
					 //var_export($model->getErrors(), true);

					$this->redirect(Yii::app()->user->returnUrl);
				 }
			}

		}
		$this->render('signup',array('model'=>$model));

	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


	public function Session( $email ){
		      $userData = Users::model()->findByAttributes(array("user_email" => $email ));
		      $details = UserDetails::model()->findByAttributes(array("user_id" => $userData['user_id'] ));
	                    Yii::app()->session['user_id'] = $userData['user_id'];
	                    Yii::app()->session['user_detail_id'] = $details['user_detail_id'];
	                    Yii::app()->session['user_fb_id'] = $details['user_fb_id'];
	                    Yii::app()->session['user_gender'] = $details['user_gender'];
	                    Yii::app()->session['user_avatar'] = $details['user_avatar'];
	                    Yii::app()->session['user_first_name'] = $userData['user_first_name'];
	                    Yii::app()->session['user_last_name'] = $userData['user_last_name'];
	                    Yii::app()->session['user_email'] = $userData['user_email'];
	                    Yii::app()->session['user_created_on'] = $userData['user_created_on'];                    
	                    Yii::app()->session['user_updated_on'] = $userData['user_updated_on'];                   
	                    echo 1;
	}
}