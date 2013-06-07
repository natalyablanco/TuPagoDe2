<?php

class SiteController extends Controller
{
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','login','logout','inicio'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','inicio','compra','validate'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * pagina de compra
	 */
	public function actionCompra()
	{
		$this->render('compra');
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		/*if(isset($_POST['validate'])){
			$this->render('compra');
		}
		$this->render('compra',array('validate'=>""));*/
	}

	/**
	 * pagina de compra
	 */
	public function actionInicio()
	{
		
		$this->render('inicio');
	}

		/**
	 * pagina que realiza conexion con el banco y valida datos para compra
	 */
	public function actionValidate()
	{
		if(isset($_POST['form'])){
			/*
			$card_type = $_POST['form']['card_type'];
			$card_number = $_POST['form']['card_number'];
			$card_expiry = $_POST['form']['card_expiry'];
			$card_security = $_POST['form']['card_security'];
			$card_bank = $_POST['form']['card_bank'];
			$card_info = implode(';',$_POST['form']);
			$validate = "";

			if($card_expiry == "" || $card_security == "" || $card_number == ""){
				Yii::app()->user->setFlash('notice', "No puede dejar campos vacios");
				$this->redirect('compra');		
				Yii::app()->end();	
			}

			
			//validaciones del numero de tarjeta.
			// que concuerde el prefijo con el tipo y la longitud
			switch ($card_type) {
				case 'amex':
					# prefijo american express 34 o 37
					if(substr($card_number,0,2) != 34 || substr($card_number,0,2) != 37){
						$validate = "Numero de Tarjeta Errado - Prefijo no concuerda con tipo de tarjeta";
						break;
					}
					#longitud 15
					if(strlen($card_number) != 15){
						$validate = "Numero de Tarjeta Errado";	
						break;
					}
					if(strlen($card_security) != 4){
						$validate = "Codigo de Seguridad Errado";	
						break;
					}
					break;
				case 'mastercard':
					# code...51, 52, 53, 54, 55
					if(substr($card_number,0,2) < 51 || substr($card_number,0,2) > 55){
						$validate = "Numero de Tarjeta Errado - Prefijo no concuerda con tipo de tarjeta";
						break;
					}
					#longitud 16 o 19 codigo de seguridad 3 o 5 
					if(strlen($card_number) != 16 && strlen($card_number) != 19){
						$validate = "Numero de Tarjeta Errado";	
						break;
					}
					if(strlen($card_security) != 3 && strlen($card_security) != 5){
						$validate = "Codigo de Seguridad Errado";	
						break;
					}
					break;
				case 'visa':
					# code... 4
					if(substr($card_number,0,1) != 4){
						$validate = "Numero de Tarjeta Errado - Prefijo no concuerda con tipo de tarjeta";
						break;
					}
					#longitud 16 o 19 segun esitef
					if(strlen($card_number) != 16 && strlen($card_number) != 19){
						$validate = "Numero de Tarjeta Errado";	
						break;
					}
					if(strlen($card_security) != 3 && strlen($card_security) != 5){
						$validate = "Codigo de Seguridad Errado";	
						break;
					}
					break;
				case 'hipercard':
					# code...38 
					if(substr($card_number,0,2) != 38){
						$validate = "Numero de Tarjeta Errado - Prefijo no concuerda con tipo de tarjeta";
						break;
					}
					#longitud 16
					if(strlen($card_number) != 16){
						$validate = "Numero de Tarjeta Errado";	
						break;
					}
					if(strlen($card_security) != 3){
						$validate = "Codigo de Seguridad Errado";
						break;	
					}
					break;
				case 'diners':
					# code...36
					if(substr($card_number,0,2) != 36 || substr($card_number,0,2) != 30){
						$validate = "Numero de Tarjeta Errado - Prefijo no concuerda con tipo de tarjeta";
						break;
					}
					#longitud 14
					if(strlen($card_number) != 14){
						$validate = "Numero de Tarjeta Errado";	
						break;
					}
					if(strlen($card_security) != 3){
						$validate = "Codigo de Seguridad Errado";
						break;
					}
					break;
				default:
					# code...
					break;

			}

			//TERMINA validaciones del numero de tarjeta y prueba validaciones de fecha
			if($validate == ""){
				//Validacion: Fecha errada
				if(strlen($card_expiry) != 4){
					$validate = "Fecha Errada - Debe tener formato mmaa";	
				}elseif(substr($card_expiry,2,2) < date('y')){
					$validate = "Fecha Errada - El año no puede ser menor al actual";	
				}

			}else{
				//si falla alguna validacion de la tarjeta retorna a compra con mensaje de error
				Yii::app()->user->setFlash('notice', $validate);
				$this->redirect('compra');			
				Yii::app()->end();	
			}
			
			if($validate != ""){
				//si falla alguna validacion de fecha retorna al formulario con mesaje de error
				Yii::app()->user->setFlash('notice', $validate);
				$this->redirect('compra');
				Yii::app()->end();			
			}else{
				//REALIZAR CONEXION CON EL BANCO
				$crearConexion = new Puntoconexion();
				$crearConexion->info = $card_info;

				switch ($card_bank) {
					case 'banesco':
						$crearConexion->nombrePunto = '123pago';
						$conectionResponse = $crearConexion->createCon();
						$result = $conectionResponse;
						break;
					case 'provincial':
						$crearConexion->nombrePunto = 'esitef';
						$conectionResponse = $crearConexion->createCon();
						$result = $conectionResponse['paymentResponse']['transactionStatus'];
						break;
					default:
						break;
				}
				if($result == "NEG"){
					$validate = "Tarjeta Negada por el Banco";
				}elseif($result == "CON"){
					$validate = "Compra Exitosa";
				}else{
					$validate = $conectionResponse;
				}
			
				$this->render('validate',array('card_info'=>$card_info,'validate'=>$validate));
				//Yii::app()->end();		
			}*/
		}else{
			//$this->redirect(Yii::app()->homeUrl);
			//$this->redirect('site/compra');
			$this->redirect(array('site/compra'));
			Yii::app()->end();		
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}