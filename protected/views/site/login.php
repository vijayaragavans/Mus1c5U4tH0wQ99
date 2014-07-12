<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
$this->renderPartial('fb');
?>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600' rel='stylesheet' type='text/css' />
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/form-style.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/script.js"></script>

<h1>Login</h1>

<!-- <p>Please fill out the following form with your login credentials:</p> -->

<div class="form">
      <h1>Sign in</h1>
      <div class='line'></div>
      
      <!-- If you don't want a social buttons, delete all of these code -->
        <a class='btn-facebook' href='#' onclick="FbLogin()">Connect with Facebook</a>
        <a class='btn-google' href='<?php echo Yii::app()->request->baseUrl; ?>/index.php/users/Googleconnect' ><img src='<?php echo Yii::app()->request->baseUrl; ?>/files/img/google.png' style='  border-radius: 3px; height: 38px;margin-left: 8px;width: 205px;'/></a>
        <!--  <a class='btn-twitter' href='#'>Connect with Twitter</a> -->
	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

		<?php echo $form->labelEx($model,'username', array('class' => 'ie-placeholders')); ?>
		<?php echo $form->textField($model,'username', array('placeholder' => 'Username', 'id' => 'ipt-login')); ?>
		<?php echo $form->labelEx($model,'password', array('class' => 'ie-placeholders', 'placeholder' => 'Password', 'id' => 'ipt-password' )); ?>
		<?php echo $form->passwordField($model,'password', array('placeholder' => 'Password')); ?>
	        	<a class='forgotten-password-link' href='#'>Forgotten password</a>
		<?php echo CHtml::submitButton('Login', array('class' => 'btn-orange')); ?>

<?php $this->endWidget(); ?>

      <div class='forgotten-password-box'>
        <form class='input-form' id='forgotten-password-form' action='#'>
          <span class='ie-placeholders'>Email:</span><input type='text' id='ipt-fp-email' class='forgotten-password-email' placeholder='E-mail' />
          <input type='submit' class='btn-orange' value='Send' /><br /><br />
          We'll send you e-mail with password reset.
        </form>
      </div>

      
      <!-- ERROR STATE -->
       <div class='error-box red' >
		<span class='error-message'><?php echo $form->error($model,'username'); ?></span><br/>
		<span class='error-message'><?php echo $form->error($model,'password'); ?></span>
      </div>
           
      <div class='sign-link'>
        Don't have an account? <a href='<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/signup'>Sign up</a>
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