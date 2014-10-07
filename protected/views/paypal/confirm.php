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
	<form name='download' name='download' method='POST' action='<?php echo Yii::app()->request->baseUrl; ?>/paypal/download' >
		<input type='submit' name='download' id='download' value='Download Album' />
	</form>
</div>
