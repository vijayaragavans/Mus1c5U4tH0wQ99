
    <div class="section group wrapper">        
    <div class="body">
            
              <!-- tabs -->
              <div id="all_songs" class="sky-tabs sky-tabs-amount-4 sky-tabs-pos-top-justify sky-tabs-anim-flip sky-tabs-response-to-icons all_songs">
                <input type="radio" name="sky-tabs" checked id="sky-tab1" class="sky-tab-content-1">
                
                <ul class="all_songs_contain">
                  <li class="sky-tab-content-1">          
                    <div class="typography">
                    <div id="container1">
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
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/lib/jquery.simplePagination.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/easing.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.hoverdir.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.columnizer.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/files/js/jquery.feedBackBox.js"></script>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/files/css/lib/simplePagination.css" rel="stylesheet" type="text/css" />  
    
    <script type="text/javascript">
        //<![CDATA[    
        $(document).ready(function () {
            $('#feedback').feedBackBox();
        });
        // ]]>
        </script>
<script type='text/javascript'>
		$(function() {
		    
		function Collect_Info(){
                      
                       var current_page = $('.current').text();
                       
                       
		       $.ajax({
		             type: "POST",
		             data: 'current_page='+current_page,
		             dataType:'JSON',
		             beforeSend: function(){
		                  $("#loading-image").show();
		             },
		             url: base_url+'/category/list_info',
		             beforeSend: function() {
			          $("#loading-image").show();
			     },
		             success: function(sresponse) {
		                 $("#loading-image").hide();
		                 var objdata = new Array() ;
				 $.each(sresponse, function(i, obj) {
				  //use obj.id and obj.name here, for example:
					objdata += '<tr>';
					objdata += '<td>'+obj.category_name+'</td>'; 
					objdata += '<td>'+obj.created_on+'</td>'; 
					objdata += '<td>'+obj.status+'</td>'; 
					objdata += '<td><a href="#" onClick="edit_category_info('+obj.category_id+');">Edit</a></td>'; 
					objdata += '<td><a href="#" onClick="delete_category_info('+obj.category_id+');">Delete</a></td>'; 
					objdata += '</tr>';
				});
				$(".list_content").html(objdata);
		            }
		      });
		}
		

            });
            
            
            
      $(document).ready(function(){
            var rts = $(location).attr('pathname');
            var cat_id = $("#cat_id").val();
            
            ajaxRequest( 'browsealbums' );
            $("#pag_id").val(1);

            $("#sky-tab1").on('click', function(){
                    ajaxRequest( 'browsealbums' );
                    $("#pag_id").val(1);
            });

          });
          
          
            $('.pagination').pagination({
		  items: <?php echo $count_songs; ?>,
		  itemsOnPage: 5,
		  cssStyle: 'light-theme',
		  onPageClick: function(){
                       var page_for = $('#pag_id').val();
                       
                       if( page_for == 1){
                             ajaxRequest( 'browsealbums' );
                       }
                 }
            });
                    
            function ajaxRequest( call_func )
            {
                 var current_page = $('.current').text();
                 
                       var cat_id = $("#cat_id").val();
                       
                     $.ajax({
                          type: "POST",
		          data: 'current_page='+current_page+'&cat_id='+cat_id,
                          url: dir_url+"/browse/"+call_func+"/"+cat_id,
                          async: false,
                          dataType: 'JSON',
                          success: function(sresponse) {
                              var output='';
                              var song_thumb = 'songs_thumb/';
                              var view_album = '/albums/details/';
                                  $.each(sresponse, function(i, obj) {
                                      output +="<div class='grid'><div class='imgholder'><a href=<?php echo Yii::app()->request->baseUrl; ?>"+view_album+obj.song_url_title+'/'+obj.song_id+"  ?><img src=<?php echo Yii::app()->params['song_url'].'"+song_thumb+obj.song_img_url+"'; ?>></a></div><a href='#' class='song-title'><strong>"+obj.song_title+"</strong><div class='song-date'>Released 07 July 2014</div></a><a href=<?php echo Yii::app()->request->baseUrl; ?>"+view_album+obj.song_url_title+'/'+obj.song_id+"  ?><div class='btn-wrap'><div class='buy-btn'>  BUY ALBUM FOR $"+obj.song_price+"</div></div></a></div>";
                                  });
                                           $('#container1').html(output);       // MOST Favourite ALbums
                                  
                                  
                          }
                         });
            }
   </script>
