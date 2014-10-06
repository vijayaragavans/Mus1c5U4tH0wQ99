<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{

  		$user = Users::model()->findByAttributes(array('user_email'=>$this->username, 'user_password'=>md5($this->password) ));
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		); */

	                if ($user===null) {
	                        $this->errorCode=self::ERROR_USERNAME_INVALID;
	                } else if ($user->user_password !== md5($this->password) ) { 
	                        $this->errorCode=self::ERROR_PASSWORD_INVALID;
	                } else { // Okay!
  		$userdetails = UserDetails::model()->findByAttributes( array( 'user_id' => $user->user_id ) );
	                    $this->errorCode=self::ERROR_NONE;
	                    Yii::app()->session['is_user_loggedin'] = true;
	                    Yii::app()->session['user_id'] = $user->user_id;
	                    Yii::app()->session['user_first_name'] = $user->user_first_name;
	                    Yii::app()->session['user_last_name'] = $user->user_last_name;
	                    Yii::app()->session['user_email'] = $user->user_email;
	                    Yii::app()->session['user_avatar'] = $userdetails->user_avatar;
	                    Yii::app()->session['user_created_on'] = $user->user_created_on;                    
	                    Yii::app()->session['user_updated_on'] = $user->user_updated_on;                    
	                }
	                return $user;
	}
}