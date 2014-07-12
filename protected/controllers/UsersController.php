<?php

class UsersController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionFb(){
		$user_email = Yii::app()->request->getPost('uemail');
		$cat=Yii::app()->createController('site');//returns array containing controller instance and action index.
		$cat=$cat[0]; //get the controller instance.
		$details = Users::model()->findByAttributes(array( "user_email"=>$user_email ));
		if( is_null( $details ) || empty($details ) ){
			$dr = $this->Fbconnect();
			$response = $cat->Session( $user_email ); //use a public method.
			echo $response;
			die;
		}else{
			$response = $cat->Session( $user_email ); //use a public method.
			print_r($response);
			die;
		}
	}

	public function Fbconnect(){
		$user_first_name = Yii::app()->request->getPost('ufirstname');
		$user_last_name = Yii::app()->request->getPost('ulastname');
		$user_email = Yii::app()->request->getPost('uemail');
		$user_password = md5('Paass121');
		$user_repassword = md5('Paass121');
		$user_created_on = date('Y-m-d H:i:s');
		$user_fb_id = Yii::app()->request->getPost('uid');
		$user_profile_name = Yii::app()->request->getPost('uname');
		$user_link = Yii::app()->request->getPost('user_link');
		$user_gender =  Yii::app()->request->getPost('ugender');
		$user_avatar = Yii::app()->request->getPost('user_avatar');
		$user_detail_updated_on = date('Y-m-d H:i:s');
			$this->Store_User_Info( $user_first_name, $user_last_name, $user_email, $user_password, $user_repassword, $user_created_on, $user_fb_id, $user_profile_name, $user_link, $user_gender, $user_avatar, 'facebook', $user_detail_updated_on);
	}


	public function Store_User_Info( $user_first_name, $user_last_name, $user_email, $user_password, $user_repassword, $user_created_on, $user_fb_id, $user_profile_name, $user_link, $user_gender, $user_avatar, $user_source, $user_detail_updated_on)
	{
		$cat=Yii::app()->createController('site');//returns array containing controller instance and action index.
		$model = new Users();
		$model->user_first_name = $user_first_name;
		$model->user_last_name = $user_last_name;
		$model->user_email = $user_email;
		$model->user_password = $user_password;
		$model->user_repassword = $user_repassword;
		$model->user_created_on = $user_created_on;
		if($model->validate() ){
			if( $model->save() ){
				$user_details_model = new UserDetails();
				$user_details_model->user_id = $model->user_id;
				$user_details_model->user_fb_id = $user_fb_id;
				$user_details_model->user_profile_name = $user_profile_name;
				$user_details_model->user_link = $user_link;
				$user_details_model->user_gender = $user_gender;
				$user_details_model->user_avatar = $user_avatar;
				$user_details_model->user_source = $user_source;
				$user_details_model->user_detail_updated_on = $user_detail_updated_on;
				$user_details_model->save();
				$cat[0]->Session( $model->user_email ); 
				echo 1;
				die;

			}

		}
	}

	public function actionGoogleconnect( ){
		$client_id = "185689089285-1n0lph4srff9lil1sf0pjfrgkb9atffn.apps.googleusercontent.com"; //your client id
		$client_secret = "7A2lgkpnBDvimoIdeFeSpUQv"; //your client secret
		$demo_redirect_uri = "http://demo.haiinteractive.com/musicestore/index.php/users/Googleconnect";
		$demo_scope = "email"; //google scope to access
		$state = "profile"; //optional
		$access_type = "offline"; //optional - allows for retrieval of refresh_token for offline access
		$current_date = date('Y-m-d H:i:s');
		//Oauth 2.0: exchange token for session token so multiple calls can be made to api
		$code = Yii::app()->getRequest()->getParam('code');
		if(isset($code)){
		 	 Yii::app()->session['accessToken'] = $this->get_oauth2_token( $client_id, $client_secret, $demo_redirect_uri, $code);
			if (isset(Yii::app()->session['accessToken'])){
			    $Obj = $this->call_api(Yii::app()->session['accessToken'],"https://www.googleapis.com/oauth2/v1/userinfo");	// Getting information from Google Plus
    			$response = $this->Store_User_Info( $Obj->given_name, $Obj->family_name, $Obj->email, md5('Paass121'), md5('Paass121'), $current_date, $Obj->id, $Obj->name, $Obj->link, $Obj->gender, $Obj->picture, 'google', $current_date );
    				print_r($response);
    				die;
			}
		}else{
		$loginUrl = sprintf("https://accounts.google.com/o/oauth2/auth?scope=%s&state=%s&redirect_uri=%s&response_type=code&client_id=%s",$demo_scope,$state,$demo_redirect_uri,$client_id);
		$this->redirect($loginUrl);

		}

	}

	public function get_oauth2_token( $client_id, $client_secret, $demo_redirect_uri, $code) {
		  
		  $oauth2token_url = "https://accounts.google.com/o/oauth2/token";
		  $clienttoken_post = array(
		  "code" => $code,
		  "client_id" => $client_id,
		  "client_secret" => $client_secret,
		  "redirect_uri" => $demo_redirect_uri,
		  "grant_type" => "authorization_code"
		  );
		  
		  $curl = curl_init($oauth2token_url);

		  curl_setopt($curl, CURLOPT_POST, true);
		  curl_setopt($curl, CURLOPT_POSTFIELDS, $clienttoken_post);
		  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		  $json_response = curl_exec($curl);
		  curl_close($curl);

		  $authObj = json_decode($json_response);
		  
		  if (isset($authObj->refresh_token)){
		    $refreshToken = $authObj->refresh_token;
		  }

		  $accessToken = $authObj->access_token;
		  return $accessToken;
	}

	public function call_api($accessToken,$url){
		  $curl = curl_init($url);
		  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
		  $curlheader[0] = "Authorization: Bearer " . $accessToken;
		  curl_setopt($curl, CURLOPT_HTTPHEADER, $curlheader);
		  $json_response = curl_exec($curl);
		  curl_close($curl);		    
		  $responseObj = json_decode($json_response);
		  return $responseObj;      
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