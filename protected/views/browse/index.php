
    <div class="section group wrapper">        
    <div class="body">
            
              <!-- tabs -->
              <div id="all_songs" class="sky-tabs sky-tabs-amount-4 sky-tabs-pos-top-justify sky-tabs-anim-flip sky-tabs-response-to-icons all_songs">
                <input type="radio" name="sky-tabs" checked id="sky-tab1" class="sky-tab-content-1">
                <label for="sky-tab1"><span><span><i class="fa fa-bolt"></i>Most Favourite</span></span></label>
                
                <input type="radio" name="sky-tabs" id="sky-tab2" class="sky-tab-content-2">
                <label for="sky-tab2"><span><span><i class="fa fa-picture-o"></i>New Release</span></span></label>
                
                <input type="radio" name="sky-tabs" id="sky-tab3" class="sky-tab-content-3">
                <label for="sky-tab3"><span><span><i class="fa fa-cogs"></i>Most Popular</span></span></label>
                
                <ul class="all_songs_contain">
                  <li class="sky-tab-content-1">          
                    <div class="typography">
                      <h1>Most Favourite</h1>
                    <div id="container1">
                    </div>
                    </div>
                  </li>
                  
                  <li class="sky-tab-content-2">
                    <div class="typography">
                          <input type='hidden' name='cat_id' id='cat_id' value="<?php echo $category_id; ?>" />
                      <h1>New Release</h1>
                    <div id="container2">                
                           </div>
                    </div>
                  </li>
                  
                  <li class="sky-tab-content-3">
                    <div class="typography">
                      <h1>Most Popular</h1>
                          <div id="container3">                
                           </div>
                    </div>
                  </li>
                </ul>
              </div>
              <!--/ tabs -->
              
            </div>
        </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/easing.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.hoverdir.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.columnizer.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.feedBackBox.js"></script>
    <script type="text/javascript">
        //<![CDATA[    
        $(document).ready(function () {
            $('#feedback').feedBackBox();
        });
        // ]]>
        </script>
<script type='text/javascript'>
    $(document).ready(function(){
            var rts = $(location).attr('pathname');
            var cat_id = $("#cat_id").val();
            ajaxRequest( 'getalbumsbyfav' );
            function ajaxRequest( call_func )
            {
               $.ajax({
                          type: "POST",
                          url: dir_url+"/browse/"+call_func+"/"+cat_id,
                          async: false,
                          dataType: 'JSON',
                          success: function(sresponse) {
                              var output='';
                              var song_thumb = 'songs_thumb/';
                              var view_album = '/albums/details/';
                                  $.each(sresponse, function(i, obj) {
                                      output +="<div class='grid'><div class='imgholder'><a href=<?php echo Yii::app()->request->baseUrl; ?>"+view_album+obj.song_url_title+'/'+obj.song_id+"  ?><img src=<?php echo Yii::app()->params['song_url'].'"+song_thumb+obj.song_img_url+"'; ?>></a></div><a href='#' class='song-title'><strong>"+obj.song_title+"</strong><div class='song-date'>Released 07 July 2014</div></a><a href=<?php echo Yii::app()->request->baseUrl; ?>"+view_album+obj.song_url_title+'/'+obj.song_id+"  ?><div class='btn-wrap'><div class='buy-btn'>"+obj.song_price+" BUY ALBUM</div></div></a></div>";
                                  });
                                  if(call_func == 'getalbumsbyfav'){
                                           $('#container1').append(output);       // MOST Favourite ALbums
                                  }else if(call_func == 'getalbumbynew'){
                                           $('#container2').append(output);     // MOST New Release
                                  }else{
                                           $('#container3').html(output);       // MOST Popular
                                         }
                          }
                         });
            }

            $("#sky-tab2").on('click', function(){
                    ajaxRequest('getalbumbynew' );
            });

            $("#sky-tab3").on('click', function(){
                    ajaxRequest('getalbumbypopular' );
            });
          });
</script>
