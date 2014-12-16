		<?php

class HistoryController extends Controller
{
	public function actionIndex()
	{
		$logged_in_id = Yii::app()->session['user_id'];
		$model = new Payment();
		$downloaded = $model->Downloaded_Albums( $logged_in_id );		// International Hits
		$this->render('index', array( 'downloaded_albums' => $downloaded ) );
	}
}