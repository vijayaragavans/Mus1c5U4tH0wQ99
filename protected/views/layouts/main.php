<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/reset.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/grid.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/style.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/media-queries.css" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/jquery.feedBackBox.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/modernizr-2.6.2.dev.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
	<div id="ajax-window"></div>
	<div id="boxed">    
		<div id="feedback"></div>	
		<!-- HEADER -->
		<header class="section group">
			<!-- Fixed Header -->   
			<div class="section group" id="fixed-header">	
    			<!-- Contact and Share toggle sections -->			
		                <div class="section group">	
    				<!-- Contact toggle section -->
					<div id="contact_toggle" class="group">
	    				<!-- Contact main info -->
				                        <div class="col span_4_of_8">
							<h1>Let's get in touch</h1>
							<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec mi in libero molestie posuere. Donec vel nisi eu augue consequat interdum. </h2>
							<ul>
								<li>Phone: 0999 999 999</li>
								<li>Email: <a href="#">vijay@haiinteractive.com</a></li>
								<li>Booking: <a href="#">admin@haiinteractive.com</a></li>
							</ul>
						</div>
	    				<!-- Contact form -->
						<div class="col span_4_of_8 group" id="contactFormContainer">
							<form action="#" method="post" id="contactForm">
								<input type="text" placeholder="Full Name" name="name" id="contactName" required/>
								<input type="email" placeholder="Email Address" name="email" id="contactEmail" required/>
								<input type="tel" placeholder="Phone Number" id="contactPhone" name="tel"/>
								<textarea placeholder="Message" name="message" id="contactMessage" required></textarea>
								<input type="submit" id="submit" name="submit" value="submit" />
							</form>
						</div>
					</div>
                    
					<!-- Share toggle section -->
					<div id="share_toggle" class="group">
						<ul>
							<li><h4>Share</h4></li>
						</ul>
					</div>                    
				</div>
                       
    			<!-- Music player and Navigation sections -->			
				<div class="section group">                
					<!-- Logo and tagline -->   
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/musicstore_clr.png" style="padding-top:10px; padding-left:20px;" />

					<!-- Navigation -->
					<nav class="col span_5_of_8">
						<ul>
							<li><a href="index.html">index-1</a></li>
							<li><a href="etune/home.html">index-3</a></li>
							<li><a href="#">Music</a></li>
							<li><a href="#">Album</a></li>
							<li><a href="#">Bio</a></li>
							<li><a href="#">News</a></li>
							<?php if( Yii::app()->session['user_first_name'] ==''){  ?>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/login">Login / Signup</a></li>
							<?php }else{ ?>
							<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/logout"><?php echo Yii::app()->session['user_first_name']; ?>( Logout )</a></li>
							<?php } ?>
							<li class="nav-tab"><a id="contact-tab" href="#">Contact</a></li>
						</ul>
					</nav>
				</div>                
			</div>
                    
		</header>

	<?php echo $content; ?>

	<div class="clear"></div>
	<footer class="section">            
		<p>&copy;2013 <a href="#" target="_blank">Music eStore</a>, All Rights Reserved &mdash;  Powered By  <a href="http://haiinteractive.com" target="_blank">Hai Interactive</a></p>
	</footer>		

</div><!-- page -->

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery-1.9.1.min.js"></script>    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/easing.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/playlist.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.hoverdir.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.columnizer.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/functions.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.feedBackBox.js"></script>


    <script type="text/javascript">
        //<![CDATA[    
        $(document).ready(function () {
            $('#feedback').feedBackBox();
        });
        // ]]>
        </script>

</body>
</html>
