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
				echo $_POST['is_avatar_uploaded'];
				$model->user_first_name = $_POST['Users']['user_first_name'];
				$model->user_last_name = $_POST['Users']['user_last_name'];
				$model->user_email = $_POST['Users']['user_email'];
				if( $_POST['is_avatar_uploaded']  == 'yes' ){
					$user_avatar = $this->Upload( $_FILES['UserDetails']['name']['user_avatar'], $_FILES['UserDetails']['tmp_name']['user_avatar'], $userdetails->user_detail_id, $userdetails );
					echo $user_avatar;
					die;					
				}

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
			//$userdetails->attributes = $_POST['UserDetails'];
			if($userdetails->validate()){
				$userdetails->save();				
			}
		}
		$this->render('editprofile', array('model' => $model, 'userdetails' => $userdetails ));
	}

	public function Upload( $file_name, $tmp_name, $user_detail_id, $userdetails ){
		$user_details = new UserDetails();		
		$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
		    $uploaddir = Yii::app()->params['avatar_thumb_path']; //a directory inside
		        $filename = stripslashes( $file_name );
		        $size=filesize( $tmp_name );
		        //get the extension of the file in a lower case format
		          $ext = $this->getExtension($filename);
		          $ext = strtolower($ext);

		         if(in_array($ext,$valid_formats))
		         {
			       if ($size < (Yii::app()->params['AVATAR_MAX_SIZE']*1024))
			       {
				   $image_name=time().$filename;
				   $newname=$uploaddir.$image_name;
		           if (move_uploaded_file($tmp_name, $newname)) 
		           {
		           		$userdetails->user_avatar = $image_name;
		           		$user_details->user_detail_id = $user_detail_id;
		           		$userdetails->save();
			   echo "<img src='".Yii::app()->params['avatar_thumb_url'].$image_name."' width='250' height='250' style='float:left; padding:25px;' class='imgList'>";
		           }
			else
		           {
			        return  '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
		            }

			       }
				   else
				   {
					echo '<span class="imgList">You have exceeded the size limit!</span>';
		          
			       }
		       
		          }
		          else
		         { 
			     	echo '<span class="imgList">Unknown extension!</span>';
		           
			     }
		           
	}

	public function getExtension($str)
	{
	         $i = strrpos($str,".");
	         if (!$i) { return ""; }
	         $l = strlen($str) - $i;
	         $ext = substr($str,$i+1,$l);
	         return $ext;
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