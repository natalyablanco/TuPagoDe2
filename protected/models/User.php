<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property integer $cedula
 * @property string $nombres
 * @property string $apellidos
 * @property string $correo
 * @property string $clave
 * @property string $direccion
 * @property integer $numeroTelefono
 * @property integer $numeroCelular
 * @property string $fechaNacimiento
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cedula, nombres, apellidos, correo, clave, direccion, fechaNacimiento', 'required'),
			array('cedula, numeroTelefono, numeroCelular', 'numerical', 'integerOnly'=>true),
			array('nombres, apellidos, correo, clave, direccion', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cedula, nombres, apellidos, correo, clave, direccion, numeroTelefono, numeroCelular, fechaNacimiento', 'safe', 'on'=>'search'),
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
			'cedula' => 'Cedula',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'correo' => 'Correo',
			'clave' => 'Clave',
			'direccion' => 'Direccion',
			'numeroTelefono' => 'Numero Telefono',
			'numeroCelular' => 'Numero Celular',
			'fechaNacimiento' => 'Fecha Nacimiento',
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
		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('numeroTelefono',$this->numeroTelefono);
		$criteria->compare('numeroCelular',$this->numeroCelular);
		$criteria->compare('fechaNacimiento',$this->fechaNacimiento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function validatePassword($password)
 	{
 		return $this->hashPassword($password)===$this->clave;
 	}
 	
 	public function hashPassword($password)
 	{
 		return md5($password);
 	}
}