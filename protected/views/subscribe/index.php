<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Subscribe';
$this->breadcrumbs=array(
	'Subscribe',
);
?>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600' rel='stylesheet' type='text/css' />
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/form-style.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/script.js"></script>

<h1>Subscribe</h1>

<!-- <p>Please fill out the following form with your login credentials:</p> -->

<div class="form login_form">
      <h1>Subscribe <div><i class="fa fa-car"></i></div></h1>
      <div class='line'></div>
      
      <!-- If you don't want a social buttons, delete all of these code -->
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subscribe-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<?php if(Yii::app()->user->hasFlash('subscribed')): ?>
	<div class="flash-success green">
		<?php echo Yii::app()->user->getFlash('subscribed'); ?>
	</div>
<?php elseif(Yii::app()->user->hasFlash('subscribed_exist')): ?>
	<div class="flash-success red">
		<?php echo Yii::app()->user->getFlash('subscribed_exist'); ?>
	</div>	
<?php endif; ?>

		<?php echo $form->labelEx($model,'subscribe_name', array('class' => 'ie-placeholders')); ?>
		<?php echo $form->textField($model,'subscribe_name', array('placeholder' => 'subscribe_name', 'id' => 'ipt-login')); ?>
		<?php echo $form->labelEx($model,'subscribe_email', array('class' => 'ie-placeholders', 'placeholder' => 'subscribe_email', 'id' => 'ipt-subscribe_email' )); ?>
		<?php echo $form->textField($model,'subscribe_email', array('placeholder' => 'subscribe_email', 'id' => 'ipt-login')); ?>
	        	<div class="login_submit"><a class='forgotten-subscribe_email-link' href='#'>&nbsp;</a><br />
		<?php echo CHtml::submitButton('Subscribe', array('class' => 'btn-orange')).'</div>'; ?>
		<br />

<?php $this->endWidget(); ?>

      
      <!-- ERROR STATE -->
       <div class='error-box red' style="display:none;" >
		<span class='error-message'><?php echo $form->error($model,'subscribe_name'); ?></span><br/>
		<span class='error-message'><?php echo $form->error($model,'subscribe_email'); ?></span>
       </div>
           
      <div class='sign-link'>
        Don't have an account? <a href='<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/signup'>Sign up</a>
      </div> 

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(){
		//var err = $(".errorMessage").css('display');
		var err = $(".errorMessage").text();
		if(err != ''){
			$(".error-message").css('margin', '15px 0 0 30px');
			$(".error-box").css('height', '92px');
			$(".error-box").css('display', 'block');
		}
	});
</script>
