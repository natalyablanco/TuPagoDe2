<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class PaymentForm extends CFormModel
{
	public $amount;
	public $merchant_usn;
	public $merchant_id;
	public $order_id;
	public $card_number;
	public $card_expiry;
	public $card_security;
	public $card_id;
	public $card_type;
	public $card_bank;
	
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			
			array('amount, merchant_usn, merchant_id, order_id, card_number, card_expiry, card_security, card_id, card_type, card_bank', 'required'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
}