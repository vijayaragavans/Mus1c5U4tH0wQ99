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
	  <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/files/css/grid-style.css' media='screen' />
	  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/font-awesome.css">
	  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/sky-tabs.css">
	  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/hscroll/style.css">
	  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/hscroll/jquery.mCustomScrollbar.css">
	  <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/hover/css/AdminLTE.css" rel="stylesheet" type="text/css" />  
	  <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/hover/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  

	<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if(isset($this->pageDescription) && $this->pageDescription != ''){  ?>
	    <meta name="title" content="<?php echo $this->pageTitle; ?>" />
	    <meta name="description" content="<?php echo $this->pageDescription; ?>">
	    <meta name="keywords" content="<?php echo $this->pageKeyword; ?>">
	    <meta name="og:site_name" content="<?php echo $this->siteName; ?>" />
	    <meta property="og:image" content="<?php echo $this->ogImage; ?>">
	    <meta name="og:title" content="<?php echo $this->pageTitle; ?>" />
	    <meta name="og:description" content="<?php echo $this->pageDescription; ?>" />
	    <?php } ?>
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
					<a href='<?php echo Yii::app()->request->baseUrl; ?>/site'><img src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/musicstore_clr.png" style="padding-top:10px; padding-left:20px;" /></a>

				<!-- Navigation -->
				<nav class="col span_5_of_8">
					<ul>
						<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/albums">Album</a></li>
						<?php if( Yii::app()->session['user_first_name'] ==''){  ?>
						<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/login">Login / Signup</a></li>
						<?php }else{ ?>
						<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/wishlist">Wishlist</a></li>
						<li><a href="#">History</a></li>
						<li class="dropdown user-menu">
					                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					                                <i class="glyphicon glyphicon-user"></i>
					                                <span><?php echo Yii::app()->session['user_first_name']; ?> <i class="caret"></i></span>
					                            </a>
					                            <ul class="dropdown-menu">
					                                <!-- User image -->
					                                <li class="user-header bg-light-blue">
					                                    <div class="img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/avatar/<?php echo Yii::app()->session['user_avatar']; ?>" class="img-circle" alt="User Image" /></div>
<!--
					                                    <p><strong>
-->
					                                    <div class="udet"><div class="uname"><?php echo Yii::app()->session['user_first_name']; ?> </div>
					                                    <div class="membership">Member since <?php echo date( 'M Y', strtotime( Yii::app()->session['user_created_on'] ) ); ?></div></div>
<!--
					                                    </strong></p>
-->
					                                </li>
					                                <li class="user-footer">
					                                    <div class="pull-left">
					                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/userdetails/editprofile" class="btn btn-default btn-flat">Edit Profile</a>
					                                    </div>
					                                    <div class="pull-right">
					                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout" class="btn btn-default btn-flat"> Logout </a>
					                                    </div>
					                                </li>
						<?php } ?>
					</ul>
				</nav>
			</div>                
		</div>
                    
		</header>

	<?php echo $content; ?>

	<div class="clear"></div>
	<footer class="section">            
		<p>&copy;2013 <a href="#">Music eStore</a>, All Rights Reserved &mdash;  Powered By  <a href="http://haiinteractive.com" target="_blank">Hai Interactive</a></p>
	</footer>		

</div><!-- page -->

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.min.js"></script>    

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/files/css/hover/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/easing.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.hoverdir.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.columnizer.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/functions.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.feedBackBox.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.wallform.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/modernizr-2.6.2.dev.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/files/css/hover/js/bootstrap.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        //<![CDATA[    
        $(document).ready(function () {
            $('#feedback').feedBackBox();
        });
        // ]]>
        </script>

</body>
</html>
