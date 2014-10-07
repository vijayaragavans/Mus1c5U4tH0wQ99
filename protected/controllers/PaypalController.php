<?php

class PaypalController extends Controller
{
	public function actionBuy(){
               
		// set 
		//Yii::app()->request->getPost('uemail');
		$paymentInfo['Order']['theTotal'] = Yii::app()->request->getPost('amt');
		$paymentInfo['Order']['description'] = Yii::app()->request->getPost('description');
		$paymentInfo['Order']['quantity'] = '1';
		Yii::app()->session['theTotal']  = $paymentInfo['Order']['theTotal'];
		Yii::app()->session['song_id'] = Yii::app()->request->getPost('song_id');
		// call paypal 
		$result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo); 
		//Detect Errors 
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later';
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			echo $error;
			Yii::app()->end();
			
		}else { 
			// send user to paypal 
			$token = urldecode($result["TOKEN"]); 
			
			$payPalURL = Yii::app()->Paypal->paypalUrl.$token; 
			$this->redirect($payPalURL); 
		}
	}

	public function actionConfirm()
	{
		$token = trim($_GET['token']);
		$payerId = trim($_GET['PayerID']);
		$modal = new Payment;	
		$result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);
		$result['PAYERID'] = $payerId; 
		$result['TOKEN'] = $token; 
		$result['ORDERTOTAL'] = Yii::app()->session['theTotal'];
		//Detect errors 
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later';
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			echo $error;
			Yii::app()->end();
		}else{ 
			
			$paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
			//Detect errors  
			if(!Yii::app()->Paypal->isCallSucceeded($paymentResult)){
				if(Yii::app()->Paypal->apiLive === true){
					//Live mode basic error message
					$error = 'We were unable to process your request. Please try again later';
				}else{
					//Sandbox output the actual error message to dive in.
					$error = $paymentResult['L_LONGMESSAGE0'];
				}
				echo $error;
				Yii::app()->end();
			}else{
				//payment was completed successfully

				$modal->paypal_token = $token;
				$modal->paypal_payer_id = $payerId;
				$modal->paypal_timestamp = $paymentResult['TIMESTAMP'];
				$modal->paypal_correlation_id =$paymentResult['CORRELATIONID'];
				$modal->paypal_ack =$paymentResult['ACK'];
				$modal->paypal_version =$paymentResult['VERSION'];
				$modal->paypal_build =$paymentResult['BUILD'];
				$modal->paypal_transaction_id =$paymentResult['TRANSACTIONID'];
				$modal->paypal_transaction_type =$paymentResult['TRANSACTIONTYPE'];
				$modal->paypal_payment_type =$paymentResult['PAYMENTTYPE'];
				$modal->paypal_order_time =$paymentResult['ORDERTIME'];
				$modal->paypal_amt =$paymentResult['AMT'];
				$modal->paypal_feeamt =$paymentResult['FEEAMT'];
				$modal->paypal_taxamt =$paymentResult['TAXAMT'];
				$modal->paypal_currency_code =$paymentResult['CURRENCYCODE'];
				$modal->paypal_payment_status =$paymentResult['PAYMENTSTATUS'];
				$modal->paypal_pending_reason =$paymentResult['PENDINGREASON'];
				$modal->paypal_reason_code =$paymentResult['REASONCODE'];
				$modal->paid_by = Yii::app()->session['user_id'];
				$modal->album_id = Yii::app()->session['song_id'];
				$modal->paid_on = date('Y-m-d H:i:s');
				$modal->save();
				$this->redirect('/musicestore/paypal/success');
			}
			
		}
	}

     public function actionSuccess()
     {
     	//$this->_download( Yii::app()->session['song_id'] );
     	$this->render('confirm');
     }	
     public function actionDownload(  )
     {
     		$album_id = Yii::app()->session['song_id'];
		$error = "";
		$datas = TblSongsUrl::model()->findAllByAttributes(array('song_id' => $album_id ));
		$file_name = TblSongs::model()->findAllByAttributes(array('song_id' => $album_id ));
		$zip_file_name = $file_name[0]->song_url_title.'.zip';
		foreach($datas as $song ){
			//echo $main_dir.'\songs\\'.$song->song_url;
			$songs[ ] = $song->song_url;
			//$zip->addFile('../../images/songs/'.$song->song_url); // Adding files into zip
		}
		$song_path = $_SERVER['DOCUMENT_ROOT'].'/musicestore/images/songs/';
		$this->zipFilesAndDownload($songs,$zip_file_name,$song_path);
			
     }
	function zipFilesAndDownload($file_names,$archive_file_name,$file_path)
	{
	    $zip = new ZipArchive();
	    //create the file and throw the error if unsuccessful
	    if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE) {
	        exit("cannot open <$archive_file_name>\n");
	    }
	    //add each files of $file_name array to archive
	    foreach($file_names as $files)
	    {
	          $zip->addFile($file_path.$files,$files);
	        //echo $file_path.$files,$files."<br>";
	    }
	    $zip->close();
	    //then send the headers to foce download the zip file
	    header("Content-type: application/zip"); 
	    header("Content-Disposition: attachment; filename=$archive_file_name"); 
	    header("Pragma: no-cache"); 
	    header("Expires: 0"); 
	    readfile("$archive_file_name");
	    exit;
	}
    public function actionCancel()
	{
		//The token of the cancelled payment typically used to cancel the payment within your application
		$token = $_GET['token'];
		
		$this->render('cancel');
	}
	
	public function actionDirectPayment(){ 
		$paymentInfo = array('Member'=> 
			array( 
				'first_name'=>'name_here', 
				'last_name'=>'lastName_here', 
				'billing_address'=>'address_here', 
				'billing_address2'=>'address2_here', 
				'billing_country'=>'country_here', 
				'billing_city'=>'city_here', 
				'billing_state'=>'state_here', 
				'billing_zip'=>'zip_here' 
			), 
			'CreditCard'=> 
			array( 
				'card_number'=>'number_here', 
				'expiration_month'=>'month_here', 
				'expiration_year'=>'year_here', 
				'cv_code'=>'code_here' 
			), 
			'Order'=> 
			array('theTotal'=>1.00) 
		); 

	   /* 
		* On Success, $result contains [AMT] [CURRENCYCODE] [AVSCODE] [CVV2MATCH]  
		* [TRANSACTIONID] [TIMESTAMP] [CORRELATIONID] [ACK] [VERSION] [BUILD] 
		*  
		* On Fail, $ result contains [AMT] [CURRENCYCODE] [TIMESTAMP] [CORRELATIONID]  
		* [ACK] [VERSION] [BUILD] [L_ERRORCODE0] [L_SHORTMESSAGE0] [L_LONGMESSAGE0]  
		* [L_SEVERITYCODE0]  
		*/ 
	  
		$result = Yii::app()->Paypal->DoDirectPayment($paymentInfo); 
		
		//Detect Errors 
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later';
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			echo $error;
			
		}else { 
			//Payment was completed successfully, do the rest of your stuff
		}

		Yii::app()->end();
	} 
}