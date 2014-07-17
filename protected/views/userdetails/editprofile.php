<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Editprofile';
$this->breadcrumbs=array(
	'Edit Profile',
);
$this->renderPartial('../site/fb');

?>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600' rel='stylesheet' type='text/css' />
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/form-style.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/script.js"></script>

<h1>Login</h1>

<!-- <p>Please fill out the following form with your login credentials:</p> -->
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $userdetails['user_avatar']; ?>"  width='250' height='250' style='float:left; padding:25px;'/>
<div class="form">
      <h1>Edit Profile</h1>
      <div class='line'></div>
      
      <!-- If you don't want a social buttons, delete all of these code -->
<!--         <a class='btn-facebook' href='#' onclick="FbLogin()">Connect with Facebook</a>
        <a class='btn-google' href='<?php //echo Yii::app()->request->baseUrl; ?>/index.php/users/Googleconnect' ><img src='<?php //echo Yii::app()->request->baseUrl; ?>/files/img/google.png' style='  border-radius: 3px; height: 38px;margin-left: 8px;width: 205px;'/></a>
 -->        <!--  <a class='btn-twitter' href='#'>Connect with Twitter</a> -->
	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'editprofile-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); 
?>

		<?php echo $form->textField($model,'user_first_name', array('placeholder' => 'user first name', 'value' => $model['user_first_name'] )); ?>
	              <?php echo $form->textField($model,'user_last_name', array('placeholder' => 'user last name', 'value' => $model['user_last_name'] )); ?>
	              <?php echo $form->textField($model,'user_email', array('placeholder' => 'Email Address', 'value' => $model['user_email'] )); ?> <br/>
		<?php echo $form->passwordField($model,'user_password', array('placeholder' => 'Change New Password', 'value' => '' )); ?><br />
		<?php echo $form->passwordField($model,'user_repassword', array('placeholder' => 'Retype Password', 'value' => '' )); ?><br /><br />
	              <?php echo $form->fileField($userdetails,'user_gender', array('placeholder' => 'User Avatar')); ?> 
		<?php echo CHtml::submitButton('Update Profile', array('class' => 'btn-orange')); ?>

<?php $this->endWidget(); ?>

      <!-- ERROR STATE -->
       <div class='error-box red' >
		<span class='error-message'><?php echo $form->error($model,'user_first_name'); ?></span><br/>
		<span class='error-message'><?php echo $form->error($model,'user_last_name'); ?></span><br/>
		<span class='error-message'><?php echo $form->error($model,'user_email'); ?></span><br/>
		<span class='error-message'><?php echo $form->error($model,'user_password'); ?></span>
      </div>
           

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(){
		var err = $(".errorMessage").css('display');
		if(err != 'none'){
			$(".error-box").css('display', 'block');
		}
	});
</script>