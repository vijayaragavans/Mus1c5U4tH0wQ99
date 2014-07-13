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
			<a href="music-open.html">
			<img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/images/songs_thumb/<?php echo $song->song_img_url; ?>" style='height:260px; width:260px;'/>
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
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/5.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/6.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/7.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/8.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/9.jpg" width="140" height="170" />
									</div>

									<!-- Second Row in New Release	-->
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/10.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/11.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/12.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/1.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/3.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/2.jpg" width="140" height="170" />
									</div>
                    </div>
                    <div class="section" id="videos">

						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/4.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/13.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/5.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/2.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/1.jpg" width="140" height="170" />
									</div>



						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/7.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/8.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/6.jpg" width="140" height="170" />
									</div>
                    </div>

					<div class="section" id="favourite">

						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/4.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/13.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/5.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/2.jpg" width="140" height="170" />
									</div>
						  <div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>
						 <img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/discography/1.jpg" width="140" height="170" />
									</div>
                    </div>                    

				</div>                
			</div>
            
		<!-- BIOGRAPHY -->
		<div class="section group container" id="bio">
			<div class="col span_1_of_8 section-title">
				<h1>biography</h1>
			</div>    
			<div class="col span_6_of_8 bio-columns">
				<h2>Music eStore are part of the vanguard of "new country" artists who helped redefine the genre.</h2>
				<hr>
				<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod pharetra enim at ornare. Sed vitae neque velit. Vivamus sed magna orci, euismod bibendum orci. Etiam pellentesque, diam in condimentum tristique, ante hendrerit at diam. Vestibulum id felis turpis risus in ipsum ullamcorper tincidunt id eu risus. Sed eget vulputate mauris. Ut non tellus ac dui fermentum diam in condimentum tristique suscipit eget eu erat.</p><h3>Sed bibendum egestas accumsan</h3><img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/bio-pic.jpg"/><p>Curabitur fermentum ullamcorper quam, ut rhoncus sapien ultrices non. Proin accumsan commodo turpis, vitae convallis ipsum varius sed. Vivamus pretium, urna quis porta gravida, turpis risus elementum leo, ut sollicitudin felis metus non elit. Duis turpis risus sit amet eros lacus, molestie aliquet odio. In congue ultricies sem, fermentum fringilla velit sodales condimentum. </p><p>Sed ac iaculis metus. Sed bibendum egestas accumsan. Sed eget justo turpis risus mauris. In eu massa nec leo pharetra aliquam et ac magna. Nulla vehicula, lectus non tempus mattis, lacus erat sagittis tellus, auctor facilisis tellus dolor sit amet quam. Etiam pellentesque, diam in condimentum tristique, ante lectus fringilla metus, et cursus velit nisl ut quam.</p>
			</div>    
		</div>
                
			<!-- NEWS -->
			<div class="section group container" id="news">				
                <div class="col span_1_of_8 section-title">
					<h1>news</h1>
				</div>                    
				<div class="col span_2_of_8">
					<h3>April 24, 2013</h3>
					<img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/news-thumbnail1.jpg" />
					<h2><a href="news-open.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h2>
                    <p>Phasellus posuere diam sed leo laoreet et adipiscing ligula placerat. Pellentesque ullamcorper sem arcu commodo tempor pellentesque.</p>
                    <h4><a href="news-open.html">read more</a></h4>
				</div>                    
				<div class="col span_2_of_8">
					<h3>April 24, 2013</h3>
					<img alt=" " src="<?php echo Yii::app()->request->baseUrl; ?>/files/img/news-thumbnail2.jpg" />
					<h2><a href="news-open.html">Nullam semper luctus lorem, dignissim accumsan neque pharetra</a></h2>
                    <p>Integer gravida ipsum et ligula adipiscing tristique. Nullam aliquet, metus ac elementum varius, tortor justo rhoncus nisi, metus. </p>
                    <h4><a href="news-open.html">read more</a></h4>
				</div>                    
				<div class="col span_2_of_8">
					<h3>More Headlines</h3>
					<ul>
				                        <li><a href="news-open.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></li>
				                        <li><a href="news-open.html">Nullam ut nibh ante, non porta magna</a></li>
				                        <li><a href="news-open.html">Commodo in risus convallis venenatis</a></li>
				                        <li><a href="news-open.html">Nunc id nulla non enim accumsan rutrum ac vel nulla</a></li>
				                        <li><a href="news-open.html">Fusce facilisis vehicula magna, dui ullamcorper </a></li>
					</ul>
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