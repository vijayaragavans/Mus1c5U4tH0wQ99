<?php
$this->breadcrumbs=array(
	'Paypa'=>array('/paypal'),
	'Confirm',
);

?>

<div>
	<h3>Payment Confirmation</h3>
	<p>
		Payment completed successfully
	</p>
</div>
<div style="margin-top:75px;">
	<input type='button' name='download' id='download' value='Download Album' />
</div>
<?php
	function download_albums(){
             $file_name = PaypalController::_download( Yii::app()->session['song_id'] );
	// push to download the zip
	header('Content-type: application/zip');
	header('Content-Disposition: attachment; filename="'.$file_name.'"');
	readfile($file_name);
	// remove zip file is exists in temp path
	unlink($file_name);

	}

?>

<script type='text/javascript'>
	$(document).ready(function(){
		$("#download").on('click', function(){
			<?php  //download_albums(); ?> 
		});
	});
</script>