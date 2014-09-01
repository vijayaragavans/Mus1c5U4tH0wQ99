
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/hscroll/style.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/hscroll/jquery.mCustomScrollbar.css">

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.min.js"></script>    
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/itunestyle/js/jssor.core.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/itunestyle/js/jssor.utils.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/itunestyle/js/jssor.slider.js"></script>
    <script>

        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: false,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 5, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $Loop: 2,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
                    $AutoCenter: 3,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 4,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 4,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 4,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 0,                            //[Optional] The offset position to park thumbnail
                    $Orientation: 2,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: false                             //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    var sliderWidth = parentWidth;

                    //keep the slider width no more than 810
                    sliderWidth = Math.min(sliderWidth, 810);

                    jssor_slider1.$SetScaleWidth(sliderWidth);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }
        });
    </script>


        <div class="section group wrapper">        
                      <div class='col span_2_of_8'>
		<div class='categories-containers left_nav'>
                            <h3> Music</h3>
                            <div class="nav_opt"><p>
                                      <select>
                                          <option selected="selected" disabled="disabled">All Categories</option>
                                          <?php foreach( $categories as $category ) {?>
                                          <option value="<?php echo $category->album_category_id; ?>"><?php echo $category->album_category_name; ?></option>
                                          <?php } ?>
                                      </select>
                                      <p>Pre-Order New Music</p>
                                      <p><a href='<?php echo Yii::app()->request->baseUrl; ?>/subscribe?utm_source=direct'>Subscribe to Newsletter</a></p>
                                      <p>Browse</p>
                                      <p>Recommended for You</p>
                            </p>
                            </div>
                         </div>
		 <div class="topsongs-containers left_nav">
			<div class="top_songs">
					<div class="see_all col span_8_of_8">
						<span class="col span_6_of_8"><h3>Top Songs</h3></span>
						<span class="col span_2_of_8" style="font-style: normal; float: right;cursor: pointer;">
						<a href="albums.html">See all ›</a></span>
					</div>
					<ul>
						<li class="col span_8_of_8">
							<div class="col span_8_of_8">
								<div class="col span_2_of_8">
									<div class="top_song">
										<img src="hscroll/img/6.jpg">
									</div>
								</div>
								<div class="col span_6_of_8">
									<a href="#">1.Samjhawan</a><br>
									<small>Jawad Ahmed, Sharib-Toshi, Arijt..</small>
								</div>
							</div>
						</li>
						<li class="col span_8_of_8">
							<div class="col span_8_of_8">
								<div class="col span_2_of_8">
									<div class="top_song">
										<img src="hscroll/img/7.jpg">
									</div>
								</div>
								<div class="col span_6_of_8">
									<a href="#">1.Samjhawan</a><br>
									<small>Jawad Ahmed, Sharib-Toshi, Arijt..</small>
								</div>
							</div>
						</li>
						<li class="col span_8_of_8">
							<div class="col span_8_of_8">
								<div class="col span_2_of_8">
									<div class="top_song">
										<img src="hscroll/img/8.jpg">
									</div>
								</div>
								<div class="col span_6_of_8">
									<a href="#">1.Samjhawan</a><br>
									<small>Jawad Ahmed, Sharib-Toshi, Arijt..</small>
								</div>
							</div>
						</li>																								
						<li class="col span_8_of_8">
							<div class="col span_8_of_8">
								<div class="col span_2_of_8">
									<div class="top_song">
										<img src="hscroll/img/9.jpg">
									</div>
								</div>
								<div class="col span_6_of_8">
									<a href="#">1.Samjhawan</a><br>
									<small>Jawad Ahmed, Sharib-Toshi, Arijt..</small>
								</div>
							</div>
						</li>
						<li class="col span_8_of_8">
							<div class="col span_8_of_8">
								<div class="col span_2_of_8">
									<div class="top_song">
										<img src="hscroll/img/4.png">
									</div>
								</div>
								<div class="col span_6_of_8">
									<a href="#">1.Samjhawan</a><br>
									<small>Jawad Ahmed, Sharib-Toshi, Arijt..</small>
								</div>
							</div>
						</li>														
						</ul>
					</div>
			</div>
                      </div>
                      <div class="col span_6_of_8 rightt_nav" style=" margin:20px; border-radius:5px; float:right;">
		<!-- You can move inline styles to css file or css block. -->
		<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 810px; height: 300px; background: white; overflow: hidden; ">

			<!-- Loading Screen -->
			<div u="loading" style="position: absolute; top: 0px; left: 0px;">
				<div class="thumb-back" style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
					background-color: white; top: 0px; left: 0px;width: 100%;height:100%;">
				</div>
				<div style="position: absolute; display: block; background: url(itunestyle/img/loading.gif) no-repeat center center;
					top: 0px; left: 0px;width: 100%;height:100%;">
				</div>
			</div>

			<!-- Slides Container -->
			<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px;
				overflow: hidden;">

				<?php 	
						foreach( $slider as $slider_img ){  ?> 
							<div>
								<img u="image" src="<?php echo Yii::app()->params['song_url'].'songs_thumb/'.$slider_img->song_img_url; ?>"  />
								<div u="thumb">
									<img u="image" src="<?php echo Yii::app()->params['song_url'].'songs_thumb/'.$slider_img->song_img_url; ?>"  />
								</div>
							</div>
				<?php		}
				?>
			</div>
			
			<!-- ThumbnailNavigator Skin Begin -->
			<div u="thumbnavigator" class="jssort11" style="position: absolute; width: 200px; height: 300px; left:605px; top:0px;">
				<!-- Thumbnail Item Skin Begin -->
				<style>
					.jssort11
					{
						font-family: Arial, Helvetica, sans-serif;
					}
					.jssort11 .i
<!--
					, .jssort11 .pav:hover .i
-->
					{
						position: absolute;
						top:3px;
						left:3px;
						WIDTH: 60px;
						HEIGHT: 30px;
						border: white 1px solid;
					}
					* html .jssort11 .i
					{
						WIDTH /**/: 62px;
						HEIGHT /**/: 32px;
					}
					.jssort11 .pav .i
					{
						border: white 1px solid;
					}
					.jssort11 img.i{width:100%;height:100%;}
					.jssort11 .t, .jssort11 .pav:hover .t
					{
						position: absolute;
						top: 3px;
						left: 68px;
						width:129px;
						height: 32px;
						line-height:32px;
						text-align: center;
						color:#fc9835;
						font-size:13px;
						font-weight:700;
					}
					.jssort11 .pav .t, .jssort11 .phv .t, .jssort11 .p:hover .t
					{
						color:#fff;
					}
					.jssort11 .c, .jssort11 .pav:hover .c
					{
						position: absolute;
						top: 38px;
						left: 3px;
						width:197px;
						height: 31px;
						line-height:31px;
						color:#fff;
						font-size:11px;
						font-weight:400;
						overflow: hidden;
					}
					.jssort11 .pav .c, .jssort11 .phv .c, .jssort11 .p:hover .c
					{
						color:#fc9835;
					}
					.jssort11 .t, .jssort11 .c
					{
						transition: color 2s;
						-moz-transition: color 2s;
						-webkit-transition: color 2s;
						-o-transition: color 2s;
					}
					.jssort11 .p:hover .t, .jssort11 .phv .t, .jssort11 .pav:hover .t, .jssort11 .p:hover .c, .jssort11 .phv .c, .jssort11 .pav:hover .c
					{
						transition: none;
						-moz-transition: none;
						-webkit-transition: none;
						-o-transition: none;
					}
					.jssort11 .p
					{
						background:#181818;
					}
					.jssort11 .pav, .jssort11 .pdn
					{
						background:#462300;
					}
					.jssort11 .p:hover, .jssort11 .phv, .jssort11 .pav:hover
					{
						background:#333;
					}
				</style>
				<div u="slides" style="cursor: move;">
					<div u="prototype" class="p" style="position: absolute; width: 200px; height: 69px; top: 0; left: 0;">
						<thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate>
					</div>
				</div>
				<!-- Thumbnail Item Skin End -->
			</div>
			<!-- ThumbnailNavigator Skin End -->
			<a style="display: none" href="http://www.jssor.com">banner slider</a>
		</div>
		<!-- Jssor Slider End -->
		
		
	<div class="itune_hscroll right_nav" style="border: 1px solid #eaeaea;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px; float:right;-webkit-box-shadow: 0px 1px 10px -4px rgba(50, 50, 50, 0.75);-moz-box-shadow: 0px 1px 10px -4px rgba(50, 50, 50, 0.75);box-shadow: 0px 1px 10px -4px rgba(50, 50, 50, 0.75);-webkit-border-radius: 5px;">
			<div id="demo">
					<h3 style="padding:1%;">International Hits</h3>
					<div style="float:right;  margin-right: 30px; margin-top: -23px;padding:1%;"><a href="albums.html">See All ></a></div>
			</div>
			<section id="examples" class="snap-scrolling-example">
				<!-- content -->
				<div id="content-1" class="content horizontal-images hrscroll">
					<ul>
					<?php foreach ($international_songs as $key => $international_hits_value) { ?>
						<li><div><div><a href='<?php echo Yii::app()->request->baseUrl; ?>/albums/details/<?php echo $international_hits_value->song_url_title; ?>/<?php echo $international_hits_value->song_id; ?>'><img src="<?php echo Yii::app()->params['song_url'].'songs_thumb/'.$international_hits_value->song_img_url; ?>" /></a></div>
							<div class="album-title">
								<a href='<?php echo Yii::app()->request->baseUrl; ?>/albums/details/<?php echo $international_hits_value->song_url_title; ?>/<?php echo $international_hits_value->song_id; ?>'><strong><?php echo $international_hits_value->song_title; ?></strong></a>
							<div>
						</div>
						</li>		
					<?php }?>
					</ul>
					</div>
			</section>
		</div> 				  

	<div class="itune_hscroll right_nav" style="border: 1px solid #eaeaea;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px; float:right;-webkit-box-shadow: 0px 1px 10px -4px rgba(50, 50, 50, 0.75);-moz-box-shadow: 0px 1px 10px -4px rgba(50, 50, 50, 0.75);box-shadow: 0px 1px 10px -4px rgba(50, 50, 50, 0.75);-webkit-border-radius: 5px;">
			<div id="demo">
					<h3 style="padding:1%;">Films</h3>
					<div style="float:right;  margin-right: 30px; margin-top: -23px;padding:1%;"><a href="albums.html">See All ></a></div>
			</div>
			<section id="examples" class="snap-scrolling-example">
				<!-- content -->
				<div id="content-1" class="content horizontal-images hrscroll">
					<ul>
					<?php foreach ($films as $key => $film_value) { ?>
						<li>
							<div>
							<div>
							<a href='<?php echo Yii::app()->request->baseUrl; ?>/albums/details/<?php echo $film_value->song_url_title; ?>/<?php echo $film_value->song_id; ?>'>
							<img src="<?php echo Yii::app()->params['song_url'].'songs_thumb/'.$film_value->song_img_url; ?>" /></a>
							</div>
							<div class="album-title">
							<a href='<?php echo Yii::app()->request->baseUrl; ?>/albums/details/<?php echo $film_value->song_url_title; ?>/<?php echo $film_value->song_id; ?>'>
								<strong><?php echo $film_value->song_title; ?></strong></a>
							<div>
							</div>
						</li>		
					<?php }?>
					</ul>
					</div>
			</section>
		</div>

	<div class="itune_hscroll right_nav" style="border: 1px solid #eaeaea;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px; float:right;-webkit-box-shadow: 0px 1px 10px -4px rgba(50, 50, 50, 0.75);-moz-box-shadow: 0px 1px 10px -4px rgba(50, 50, 50, 0.75);box-shadow: 0px 1px 10px -4px rgba(50, 50, 50, 0.75);-webkit-border-radius: 5px;">
			<div id="demo">
					<h3 style="padding:1%;">Hot Compilations</h3>
					<div style="float:right;  margin-right: 30px; margin-top: -23px;padding:1%;"><a href="albums.html">See All ></a></div>
			</div>
			<section id="examples" class="snap-scrolling-example">
				<!-- content -->
				<div id="content-1" class="content horizontal-images hrscroll">
					<ul>
					<?php foreach ($hot_compilations as $key => $hot_compilations_value) { ?>
						<li>
						<div>
						<div>
						<a href='<?php echo Yii::app()->request->baseUrl; ?>/albums/details/<?php echo $hot_compilations_value->song_url_title; ?>/<?php echo $hot_compilations_value->song_id; ?>'>
						<img src="<?php echo Yii::app()->params['song_url'].'songs_thumb/'.$hot_compilations_value->song_img_url; ?>" /></a>
						</div>
						<div class="album-title">
						<a href='<?php echo Yii::app()->request->baseUrl; ?>/albums/details/<?php echo $hot_compilations_value->song_url_title; ?>/<?php echo $hot_compilations_value->song_id; ?>'>
						<strong><?php echo $hot_compilations_value->song_title; ?></strong></a>
						<div>
						</div>
						</li>		
					<?php }?>
					</ul>
					</div>
			</section>
		</div> 				
		</div>

				</div>

    	<script src="<?php echo Yii::app()->request->baseUrl; ?>/files/css/hscroll/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        //<![CDATA[    
		(function($){
			$(window).load(function(){				
				var amount=Math.max.apply(Math,$("#content-1 li").map(function(){return $(this).outerWidth(true);}).get());
				
				$(".hrscroll").mCustomScrollbar({
					axis:"x",
					theme:"inset",
					advanced:{
						autoExpandHorizontalScroll:true
					},
					scrollButtons:{
						enable:true,
						scrollType:"stepped"
					},
					keyboard:{scrollType:"stepped"},
					snapAmount:amount,
					mouseWheel:{scrollAmount:amount}
				});
				
			});
		})($);        
    </script>

