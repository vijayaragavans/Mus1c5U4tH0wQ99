
<script src="//connect.facebook.net/en_US/all.js"></script>
<script language="javascript" type="text/javascript">
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1468178786757324', // App ID
      channelUrl : 'http://demo.localhost.com/musicestore/',
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
    };
 

    (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>

<script language="javascript" type="text/javascript">
function FbLogin() {
 FB.login(function(response) {
           if (response.authResponse) 
           {
                getUserInfo(); // Get User Information.
 
            } else
            {
             console.log('Authorization failed.');
            }
         },{scope: 'email'});          
    }
    function getPhoto()
    {
      FB.api('/me/picture?type=normal', function(response) {
          $("#user_avatar").val( response.data.url );
    });
    }

function getUserInfo() {
        FB.api('/me', function(response) {
          var test = getPhoto();
      var str="<b>Name</b> : "+response.name+"<br>";
          str +="<b>Link: </b>"+response.link+"<br>";
          str +="<b>Username:</b> "+response.username+"<br>";
          str +="<b>id: </b>"+response.id+"<br>";
          str +="<b>Email:</b> "+response.email+"<br>";
          str +="<input type='button' value='Get Photo' onclick='getPhoto();'/>";
          str +="<input type='button' value='Logout' onclick='Logout();'/>";
          //document.getElementById("status").innerHTML=str;
          if(test != ''){
	          var user_avatar = $("#user_avatar").val();
	          var params = 'uid=' +response.id+'&uname='+response.name+'&ufirstname='+response.first_name+'&ulastname='+response.last_name+'&uemail='+response.email+'&ulink='+response.link+'&user_avatar='+user_avatar+'&ugender='+response.gender;
 	//alert( 'avara' +user_avatar );
		$.ajax({
		            type: "POST",
		            url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php/users/fb",
		            data: params,
		            async: false,
		            success: function(sresponse) {
                                window.location.reload();
  		            }
		          });

          }

    });
    }
    </script>
<div id="fb-root"></div>
<input type='hidden' name='user_avatar' id='user_avatar' value="" />