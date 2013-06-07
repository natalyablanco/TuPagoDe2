<?php

Yii::import('application.extensions.GWebService.nusoap.nusoap',true);

/**
 * This is the model class for table "puntoconexion".
 *
 * The followings are the available columns in table 'puntoconexion':
 * @property integer $id
 * @property string $nombrePunto
 * @property string $info
 */
class Puntoconexion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Puntoconexion the static model class
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
		return 'puntoconexion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombrePunto', 'required'),
			array('nombrePunto', 'length', 'max'=>128),
			array('info', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombrePunto, info', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'nombrePunto' => 'Nombre Punto',
			'info' => 'Info',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombrePunto',$this->nombrePunto,true);
		$criteria->compare('info',$this->info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function createCon()
	{
		//REALIZAR CONEXION CON EL PUNTO RESPECTIVO $this->nombrePunto;
		if($this->nombrePunto == '123pago'){
			//wsdl de 123pago		
			$cedula=Yii::app()->user->id;
			$user=User::model()->findBySql("SELECT * from tbl_user where cedula = :cedula", array(':cedula'=>$cedula));
			$atributos = $user->attributes;

			$info = explode(";",$this->info);
			// Create the client instance
		/*$client = new nusoap_client("http://190.153.48.115:80/ms_123pagoPOSEngine/ms123pago_realizarPagoTarjetaService?wsdl",true);			

			$err = $client->getError();
			if($err){
				return "Error en la conexion";
			}
*/
			$parameters = array('parameters' => array(
													'cedula' => $info['7'],
													'nombre' => $atributos['nombres'],
													'apellido' => $atributos['apellidos'],
													'email' => $atributos['correo'],
													'direccion' => $atributos['direccion'],
													//acomodar formato de fecha
													'fechaNac' =>  $atributos['fechaNacimiento'],
													'nuTelefono1' => $atributos['numeroTelefono'],
													'nuCelular1' => $atributos['numeroCelular'],
													'nuTarjeta' => $info['4'],
													'cvv2' => $info['6'],
													'mesVencimientoTarj' => $info['5'],
													'anioVencimientoTarj' => $info['5'],
													'nbproveedor' => 'TODOCASH',
													'concepto' => 'prueba movil',
													'idpromocion' => '0',
													'control' => '2013052812345',
													'ipCliente' => '192.168.1.117'
												));
			if(isset($atributos['nombres'])){
				$result = "CON";
			}else{
				$result = "NEG";
			}
			
			
			return $result;
		
		}elseif($this->nombrePunto == 'esitef'){
			
			$client = new nusoap_client("https://esitef-homologacao.softwareexpress.com.br/e-sitef/Payment2?wsdl",true);
			$info = explode(";",$this->info);
			
			$err = $client->getError();
			if($err){
				return "Error en la conexion";
			}

			$transactionRequest = array('transactionRequest' => array
																(
																	'amount' => $info['0'],
																	'merchantId' => $info['2'],
																	'merchantUSN' => $info['1'],
																	'orderId' => $info['3']
																));
			$payment = $client->getProxy();
			
			try{
				$transactionResponse = $payment->beginTransaction($transactionRequest);
			}catch(Exception $e){
				return "No se pudo iniciar la transaccion con el banco ".$e;
			}
			
			$nit = $transactionResponse['transactionResponse']['nit'];

			//para colocar el codigo del autorizador.. authorizerId
			switch ($info['8']) {
				case 'visa':
					# code...
					$authorizerId = 1;
					break;
				case 'mastercard':
					# code...
					$authorizerId = 2;
					break;
				case 'amex':
					# code...
					$authorizerId = 3;
					break;
				case 'dinners':
					# code...
					$authorizerId = 33;
					break;
				default:
					# code...
					$authorizerId = 0;
					break;
			}
			$paymentRequest = array('paymentRequest' => array
														(
															'authorizerId' => $authorizerId,
															'autoConfirmation' => 'true',
															'cardExpiryDate' => $info['5'],
															'cardNumber' =>$info['4'],
															'cardSecurityCode' => $info['6'],
															'customerId' => $info['7'],
															'installmentType' => '3',
															'installments' => '1',
															'nit' => $nit
														));
			$result = $payment->doPayment($paymentRequest);
			
			return $result;

		}else{
			return "nobank";
		}

		return "NEG";

	}
}