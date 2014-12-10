		<!-- CONTENT -->
		<div class="section group wrapper">        
			<!-- SLIDER -->
			<div id="slider">            
				<ul>
                    <li>
                    	<img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/slide1.jpg" />
		<div class="slider-caption">
			<h2>Preview Music eStore new single "Sweet life"</h2>
			<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
		</div>
		</li>
                    <li>
		<img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/slide2.jpg" />
		<div class="slider-caption">
			<h2>The highly anticipated new album from Music eStore to be released May 21</h2>
		</div>
	</li>
                    <li>
		<img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/slide3.jpg" />
		<div class="slider-caption">
			<h2>Make an appearance in the "One Love" music video</h2>
			<h4>Donec sagittis arcu eget orci facilisis tincidunt</h4>
		</div>
	</li>
	</ul>            
	<div id="slider-arrows">
		<span><a id="prev-slide" href="#">prev</a></span>
		<span><a id="next-slide" href="#">next</a></span>
	</div>                
			</div>
    
			<!-- MUSIC -->
	<div class="section group container" id="music">				
                <div class="col span_1_of_8 section-title">
		<h1>music</h1>
	</div>                
	<div class="col span_6_of_8">
		<div id="covers_container">
	                    <ul id="covers" class="group">
	                    <?php foreach( $songs as $song ){
 ?>	                        <li>
			<a href="<?php echo Yii::app()->request->baseUrl; ?>/albums/details/<?php echo $song->song_url_title; ?>/<?php echo $song->song_id; ?>">
			<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/songs_thumb/<?php echo $song->song_img_url; ?>" style='height:260px; width:260px;'/>
	                                <div>
	                                    <h3><?php echo $song->song_title; ?></h3>
	                                    <span>Release date: March 28, 2013</span>
	                                    <hr>
	                                    <h4>Click for details</h4>
	                                </div>
	                            </a>
	                        </li>
	                        <?php } ?>
	                    </ul>
                    </div>
	</div>				
                <div class="col span_1_of_8 section-nav">
		<ul>
		</ul>
	</div>
                <div id="gallery-nav-mobile">
	                <ul class="gallery-nav">
	                	<li><a class="prev-gallery" href="#">Prev</a></li>
	                	<li class="gallery-no">4/11</li>
	                	<li><a class="next-gallery" href="#">Next</a></li>
	               	</ul>
               	</div>
			</div>
                
                
			<!-- GALLERY -->
	<div class="section group container" id="album">				
                <div class="col span_1_of_8 section-title">
		<h1>Album</h1>
	</div>                    
	
	<div class="col span_6_of_8 gallery">                
		<div id="gallery-switch">
			<ul class="group">
		                        	<li><a href="#" class="active_gallery_navigation">New Release</a></li>
		                              <li><a href="#">Most Popular</a></li>
		                              <li><a href="#">Favourite</a></li>
			</ul>
		</div>
                    <div class="section" id="photos" style="display: block;">
                    
	             <?php foreach( $newsongs as $newsong ){ ?>
			<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2' style="margin-top:20px;">
				<img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/images/songs_thumb/<?php echo $newsong['song_img_url']; ?>" width="140" height="170" />
			</div>
		<?php  } ?>
                    </div>
                    <div class="section" id="videos">
	             <?php foreach( $popularsongs as $popularsong ){ ?>
			<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
				<img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/images/songs_thumb/<?php echo $popularsong['song_img_url']; ?>" width="140" height="170" />
			</div>
		<?php } ?>
                    </div>

		<div class="section" id="favourite">
	                    <?php foreach( $favsongs as $favsong ){ ?>
				<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
					<img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/images/songs_thumb/<?php echo $favsong['song_img_url']; ?>" width="140" height="170" />
				</div>
	                    <?php } ?>
                    			</div>                    

				</div>                
			</div>
            
			<!-- UPDATES/CONNECT Stripe -->
			<div class="section group" id="bottom-stripe">				
                <!-- Newsletter -->
				<div class="col span_4_of_8" id="newsletter">
					<h1>get updates</h1>
					<h2>Sign up for our mailing list to get the latest news, tour dates and more!</h2>
					<form method="get" action="#" id="#">
						<input type="email" placeholder="me@email.com" value="" class="" name="" required>
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
				</div>                