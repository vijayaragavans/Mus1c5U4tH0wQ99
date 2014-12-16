<?php

/**
 * This is the model class for table "payment".
 *
 * The followings are the available columns in table 'payment':
 * @property integer $paypal_id
 * @property string $paypal_token
 * @property string $paypal_payer_id
 * @property string $paypal_timestamp
 * @property string $paypal_correlation_id
 * @property string $paypal_ack
 * @property double $paypal_version
 * @property string $paypal_build
 * @property string $paypal_transaction_id
 * @property string $paypal_transaction_type
 * @property string $paypal_payment_type
 * @property string $paypal_order_time
 * @property double $paypal_amt
 * @property double $paypal_feeamt
 * @property double $paypal_taxamt
 * @property string $paypal_currency_code
 * @property string $paypal_payment_status
 * @property string $paypal_pending_reason
 * @property string $paypal_reason_code
 * @property integer $paid_by
 * @property integer $album_id
 * @property string $paid_on
 */
class Payment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Payment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('paid_by, album_id', 'numerical', 'integerOnly'=>true),
			array('paypal_version, paypal_amt, paypal_feeamt, paypal_taxamt', 'numerical'),
			array('paypal_token, paypal_payer_id, paypal_correlation_id, paypal_transaction_type, paypal_payment_type', 'length', 'max'=>50),
			array('paypal_timestamp', 'length', 'max'=>60),
			array('paypal_ack, paypal_payment_status', 'length', 'max'=>30),
			array('paypal_build, paypal_reason_code', 'length', 'max'=>20),
			array('paypal_transaction_id', 'length', 'max'=>75),
			array('paypal_currency_code', 'length', 'max'=>10),
			array('paypal_pending_reason', 'length', 'max'=>40),
			array('paypal_order_time, paid_on', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('paypal_id, paypal_token, paypal_payer_id, paypal_timestamp, paypal_correlation_id, paypal_ack, paypal_version, paypal_build, paypal_transaction_id, paypal_transaction_type, paypal_payment_type, paypal_order_time, paypal_amt, paypal_feeamt, paypal_taxamt, paypal_currency_code, paypal_payment_status, paypal_pending_reason, paypal_reason_code, paid_by, album_id, paid_on', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'paypal_id' => 'Paypal',
			'paypal_token' => 'Paypal Token',
			'paypal_payer_id' => 'Paypal Payer',
			'paypal_timestamp' => 'Paypal Timestamp',
			'paypal_correlation_id' => 'Paypal Correlation',
			'paypal_ack' => 'Paypal Ack',
			'paypal_version' => 'Paypal Version',
			'paypal_build' => 'Paypal Build',
			'paypal_transaction_id' => 'Paypal Transaction',
			'paypal_transaction_type' => 'Paypal Transaction Type',
			'paypal_payment_type' => 'Paypal Payment Type',
			'paypal_order_time' => 'Paypal Order Time',
			'paypal_amt' => 'Paypal Amt',
			'paypal_feeamt' => 'Paypal Feeamt',
			'paypal_taxamt' => 'Paypal Taxamt',
			'paypal_currency_code' => 'Paypal Currency Code',
			'paypal_payment_status' => 'Paypal Payment Status',
			'paypal_pending_reason' => 'Paypal Pending Reason',
			'paypal_reason_code' => 'Paypal Reason Code',
			'paid_by' => 'Paid By',
			'album_id' => 'Album',
			'paid_on' => 'Paid On',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('paypal_id',$this->paypal_id);
		$criteria->compare('paypal_token',$this->paypal_token,true);
		$criteria->compare('paypal_payer_id',$this->paypal_payer_id,true);
		$criteria->compare('paypal_timestamp',$this->paypal_timestamp,true);
		$criteria->compare('paypal_correlation_id',$this->paypal_correlation_id,true);
		$criteria->compare('paypal_ack',$this->paypal_ack,true);
		$criteria->compare('paypal_version',$this->paypal_version);
		$criteria->compare('paypal_build',$this->paypal_build,true);
		$criteria->compare('paypal_transaction_id',$this->paypal_transaction_id,true);
		$criteria->compare('paypal_transaction_type',$this->paypal_transaction_type,true);
		$criteria->compare('paypal_payment_type',$this->paypal_payment_type,true);
		$criteria->compare('paypal_order_time',$this->paypal_order_time,true);
		$criteria->compare('paypal_amt',$this->paypal_amt);
		$criteria->compare('paypal_feeamt',$this->paypal_feeamt);
		$criteria->compare('paypal_taxamt',$this->paypal_taxamt);
		$criteria->compare('paypal_currency_code',$this->paypal_currency_code,true);
		$criteria->compare('paypal_payment_status',$this->paypal_payment_status,true);
		$criteria->compare('paypal_pending_reason',$this->paypal_pending_reason,true);
		$criteria->compare('paypal_reason_code',$this->paypal_reason_code,true);
		$criteria->compare('paid_by',$this->paid_by);
		$criteria->compare('album_id',$this->album_id);
		$criteria->compare('paid_on',$this->paid_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	function Downloaded_Albums( $user_id )
	{
		$rows = Yii::app()->db->createCommand()
		            ->select('apc.album_page_category as page_category, tac.album_category_name as category, tsg.song_id, tsg.song_url_title, tsg.song_title, tsg.song_img_url, tsg.song_price, tsg.song_description, tsg.song_tags, pay.paid_on')
		            ->from('payment pay')
		            ->leftjoin('tbl_songs tsg', 'tsg.song_id = pay.album_id')
		            ->leftjoin('album_page_categories apc','apc.album_page_category_id = tsg.song_album_page_category_id')
		            ->leftjoin('tbl_songs_url tsu','tsu.song_id = tsg.song_id')
		            ->leftjoin('tbl_album_category tac', 'tac.album_category_id = tsg.song_category')
		            ->where('pay.paid_by=:paid_by', array(':paid_by'=>$user_id))
		            ->group('tsg.song_id')
		            ->queryAll();

		return $rows;		
	}
}