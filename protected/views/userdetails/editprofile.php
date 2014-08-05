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
<div id='preview'>
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/avatar/<?php echo $userdetails['user_avatar']; ?>"  width='250' height='250' style='float:left; padding:25px;' id='avatar_img'/>	
</div>
<div class="form pro_form">
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
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); 
?>

		<?php echo $form->textField($model,'user_first_name', array('placeholder' => 'user first name', 'value' => $model['user_first_name'] )); ?>
	              <?php echo $form->textField($model,'user_last_name', array('placeholder' => 'user last name', 'value' => $model['user_last_name'] )); ?>
	              <?php echo $form->textField($model,'user_email', array('placeholder' => 'Email Address', 'value' => $model['user_email'] )); ?> <br/>
		<?php echo $form->passwordField($model,'user_password', array('placeholder' => 'Change New Password', 'value' => '' )); ?><br />
		<?php echo $form->passwordField($model,'user_repassword', array('placeholder' => 'Retype Password', 'value' => '' )); ?><br /><br />
		<div id='imageloadstatus' style='display:none'><img src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/loader.gif" alt="Uploading...."/></div>
	              <?php echo $form->fileField($userdetails,'user_avatar', array('placeholder' => 'User Avatar')); ?> 
	              <input type='hidden' name='is_avatar_uploaded' id='is_avatar_uploaded' />
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
<div class="section group" id="bottom-stripe">				
                <!-- Newsletter -->
				<div class="col span_4_of_8" id="newsletter">
					<h1>get updates</h1>
					<h2>Sign up for our mailing list to get the latest news, tour dates and more!</h2>
					<form method="get" action="#" id="#">
						<input type="email" placeholder="me@email.com" value="" class="" name="" required="">
						<input type="submit" id="newsletterSubmit" class="newsletter-submit" value="Subscribe" name="">
					</form>
				</div>                    
				<!-- Social Media Buttons -->
				<div class="col span_4_of_8" id="social">
					<h1>Connect</h1>
					<h2>Lorem ipsum dolor amet, consectetur</h2>
					<ul class="clearfix">
						<li class="facebook"><a href="#">Facebook</a></li>
						<li class="twitter-social"><a href="#">Twitter</a></li>  
						<li class="google-plus"><a href="#">Google+</a></li>
						<li class="youtube"><a href="#">Youtube</a></li> 
						<li class="instagram"><a href="#">Instagram</a></li>  
						<li class="soundcloud"><a href="#">Soundcloud</a></li> 
						<li class="lastfm"><a href="#">Last.fm</a></li>
						<li class="myspace"><a href="#">Myspace</a></li> 
                        <!-- Hidden icons 
						<li class="vimeo"><a href="#">Vimeo</a></li>
						<li class="pinterest"><a href="#">Pinterest</a></li>
						<li class="rss"><a href="#">RSS</a></li>
						<li class="flickr"><a href="#">Flickr</a></li> 
						<li class="tumblr"><a href="#">Tumblr</a></li>
                        -->
					</ul>
				</div>                </div>
<script type="text/javascript">
	$(document).ready(function(){
		var err = $(".errorMessage").css('display');
		if(err != 'none'){
			$(".error-box").css('display', 'block');
		}
	});
</script>
<script>
 $(document).ready(function() { 
		
            $('#UserDetails_user_avatar').die('click').live('change', function()			{ 
			           //$("#preview").html('');
				$("#editprofile-form").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
				     	$("#is_avatar_uploaded").val('yes');
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
					  $("#avatar_img").remove();
					  $("#is_avatar_uploaded").remove();
					  $("#UserDetails_user_avatar").attr('value', '');
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
					 $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
					} }).submit();
					
		
			});
        }); 
</script>
