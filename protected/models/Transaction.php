<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * @property string $merchant_usn
 * @property integer $amount
 * @property string $nit
 * @property string $trans_status
 * @property string $message
 * @property string $payment_type
 * @property string $order_id
 * @property string $punto
 */
class Transaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Transaction the static model class
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
		return 'transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, trans_status, message, payment_type, order_id, punto', 'required'),
			array('amount', 'numerical', 'integerOnly'=>true),
			array('merchant_usn', 'length', 'max'=>12),
			array('nit', 'length', 'max'=>64),
			array('trans_status', 'length', 'max'=>3),
			array('message', 'length', 'max'=>500),
			array('payment_type', 'length', 'max'=>1),
			array('order_id', 'length', 'max'=>20),
			array('punto', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('merchant_usn, amount, nit, trans_status, message, payment_type, order_id, punto', 'safe', 'on'=>'search'),
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
			'merchant_usn' => 'Merchant Usn',
			'amount' => 'Amount',
			'nit' => 'Nit',
			'trans_status' => 'Trans Status',
			'message' => 'Message',
			'payment_type' => 'Payment Type',
			'order_id' => 'Order',
			'punto' => 'Punto',
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

		$criteria->compare('merchant_usn',$this->merchant_usn,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('nit',$this->nit,true);
		$criteria->compare('trans_status',$this->trans_status,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('payment_type',$this->payment_type,true);
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('punto',$this->punto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function createTransaction($merchant_usn,$amount,$nit,$trans_status,$message,$payment_type,$orderid,$punto) {

		$model = new Transaction();
		$model->merchant_usn = $merchant_usn;
		$model->amount = $amount;
		$model->nit = $nit;
		$model->trans_status = $trans_status;
		$model->message = $message;
		$model->payment_type = $payment_type;
		$model->order_id = $orderid;
		$model->punto = $punto;

		//var_dump($model->validate());
		if($model->hasErrors()){
			return false;
		}else{

			return $model->saveTransaction();
		}

	}

	public function saveTransaction() {
		
		if($this->hasErrors()){
			return false;
		}else{

			return $this->save();
		}

	}

	/*Se actualiza la transaccion con id = $merchant_usn*/
	public function updateTransaction($merchant_usn,$amount,$nit,$trans_status,$message,$payment_type,$orderid,$punto) {

		$model = Transaction::model()->findByPk($orderid);
		
		$model->amount = $amount;
		$model->nit = $nit;
		$model->trans_status = $trans_status;
		$model->message = $message;
		$model->payment_type = $payment_type;
		$model->order_id = $orderid;
		$model->punto = $punto;

		if($model->hasErrors()){
			return false;
		}else{

			return $model->update();
		}

	}

	/*Pregunta si una transaction esta aprovada*/
	public function itsApprove($orderid) {

		$model = Transaction::model()->findByPk($orderid);
			
		if($model->trans_status === "CON"){
				return true;
		}elseif($model->trans_status === "NEG"){
			return false;
		}
	}

	public function using($punto){
		$model = new Transaction();
		$model->punto = $punto->nombrePunto;
	}


}