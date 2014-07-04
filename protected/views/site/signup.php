<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Signup';
$this->breadcrumbs=array(
	'Login',
);
?>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600' rel='stylesheet' type='text/css' />
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/form-style.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/script.js"></script>

<h1>Signup</h1>

<!-- <p>Please fill out the following form with your login credentials:</p> -->

<div class="form">
      <h1>Sign up</h1>
      <div class='line'></div>
      
      <!-- If you don't want a social buttons, delete all of these code -->
        <a class='btn-facebook' href='#'>Connect with Facebook</a>
        <a class='btn-twitter' href='#'>Connect with Twitter</a>
	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

		<?php echo $form->textField($model,'user_first_name', array('placeholder' => 'First name', 'id' => 'ipt-login')); ?>
		<?php echo $form->textField($model,'user_last_name', array('placeholder' => 'Last name', 'id' => 'ipt-login')); ?>
		<?php echo $form->textField($model,'user_email', array('placeholder' => 'E-mail', 'id' => 'ipt-email')); ?>
		<?php echo $form->passwordField($model,'user_password', array('placeholder' => 'Password', 'id' => 'ipt-password')); ?>
		<?php echo $form->passwordField($model,'user_repassword', array('placeholder' => 'Password', 'id' => 'ipt-repassword')); ?> <br/>
        		<input type='checkbox' id='tac-checkbox' /><label for='tac-checkbox'>I agree with <a href='#'>terms and conditions</a></label>
		<?php echo CHtml::submitButton('Register', array('class' => 'btn-orange')); ?>

<?php $this->endWidget(); ?>

      <!-- ERROR STATE -->
       <div class='error-box red' >
		<span class='error-message'><?php echo $form->error($model,'user_first_name'); ?></span>
		<span class='error-message'><?php echo $form->error($model,'user_last_name'); ?></span>
		<span class='error-message'><?php echo $form->error($model,'user_email'); ?></span>
		<span class='error-message'><?php echo $form->error($model,'user_password'); ?></span>
      </div>
           
      <div class='sign-link'>
        Don't have an account? <a href='<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/login'>Login</a>
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