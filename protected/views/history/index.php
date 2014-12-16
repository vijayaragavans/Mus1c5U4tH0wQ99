    <div class="section group wrapper">        
    <div class="body">
            
              <!-- tabs -->
              <div id="all_songs" class="sky-tabs sky-tabs-amount-4 sky-tabs-pos-top-justify sky-tabs-anim-flip sky-tabs-response-to-icons all_songs">
                <input type="radio" name="sky-tabs" checked id="sky-tab1" class="sky-tab-content-1">
                
                <ul class="all_songs_contain">
                  <li class="sky-tab-content-1">          
                    <div class="typography">
                    <div id="container1">
<?php
	if(is_array($downloaded_albums) && !empty($downloaded_albums)){
		foreach( $downloaded_albums as $albums )
		{ 

			?>
			<div class='grid'>
				<div class='imgholder'>
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/albums/details/<?php echo $albums['song_url_title']; ?>/<?php echo $albums['song_id']; ?>" ?>
					<img src="<?php echo Yii::app()->params['song_url'].'songs_thumb/'.$albums['song_img_url']; ?>"></a>
				</div>
				<a href='#' class='song-title'>
					<strong><?php echo $albums['song_title']; ?></strong>
					<div class='song-date'><?php echo date('M d Y', strtotime( $albums['paid_on']) ); ?></div>
				</a>
				<a href="#" id="<?php echo $albums['song_id']; ?>" class="button-cart" ?>
					<div class='btn-wrap'><div class='buy-btn' > Download </div></div>
				</a>
			</div>       
	<?php }
	    }else{
	    		echo ' No Items are Downloaded  ';
	    	} ?>             
                    </div>
                    </div>
                  </li>
                  
                </ul>
              </div>
              <!--/ tabs -->
		<p class="pagination"></p>
                <input type='hidden' id='pag_id' name='pag_id' value='' />
              
            </div>
        </div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>    

<script type='text/javascript'>
	$(document).ready(function(){
			$(".button-cart").on('click', function(){
				var album_id = $(this).attr('id');
				window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/paypal/download?q='+album_id;
				//$('form.buy-form').submit();
			});
	});
</script>