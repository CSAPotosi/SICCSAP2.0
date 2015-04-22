<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property integer $id
 * @property string $codigo
 * @property string $dni
 * @property string $nombres
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $sexo
 * @property string $fecha_nacimiento
 * @property string $estado_civil
 * @property integer $pais_nacimiento
 * @property string $provincia
 * @property string $localidad
 * @property string $nivel_estudio
 * @property integer $pais_vive
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property string $fotografia
 *
 * The followings are the available model relations:
 * @property Pais $paisNacimiento
 * @property Pais $paisVive
 */
class Persona extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombres, primer_apellido', 'required'),
			array('pais_nacimiento, pais_vive', 'numerical', 'integerOnly'=>true),
			array('dni, sexo, estado_civil, nivel_estudio, telefono, celular', 'length', 'max'=>32),
			array('nombres, email, fotografia', 'length', 'max'=>128),
			array('primer_apellido, segundo_apellido, provincia, localidad, direccion', 'length', 'max'=>64),
            array('dni','default','value'=>0),
            array('fecha_nacimiento','default','value'=>'01-01-0001'),
			array('fecha_nacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, codigo, dni, nombres, primer_apellido, segundo_apellido, sexo, fecha_nacimiento, estado_civil, pais_nacimiento, provincia, localidad, nivel_estudio, pais_vive, direccion, telefono, celular, email, fotografia', 'safe', 'on'=>'search'),
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
			'paisNacimiento' => array(self::BELONGS_TO, 'Pais', 'pais_nacimiento'),
			'paisVive' => array(self::BELONGS_TO, 'Pais', 'pais_vive'),
            'paciente'=>array(self::HAS_ONE,'Paciente','id_paciente'),
            'empleado'=>array(self::HAS_ONE,'Empleado','id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codigo' => 'Codigo',
			'dni' => 'Dni',
			'nombres' => 'Nombres',
			'primer_apellido' => 'Primer Apellido',
			'segundo_apellido' => 'Segundo Apellido',
			'sexo' => 'Sexo',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'estado_civil' => 'Estado Civil',
			'pais_nacimiento' => 'Pais Nacimiento',
			'provincia' => 'Provincia',
			'localidad' => 'Localidad',
			'nivel_estudio' => 'Nivel Estudio',
			'pais_vive' => 'Pais Vive',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'email' => 'Email',
			'fotografia' => 'Fotografia',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('primer_apellido',$this->primer_apellido,true);
		$criteria->compare('segundo_apellido',$this->segundo_apellido,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('estado_civil',$this->estado_civil,true);
		$criteria->compare('pais_nacimiento',$this->pais_nacimiento);
		$criteria->compare('provincia',$this->provincia,true);
		$criteria->compare('localidad',$this->localidad,true);
		$criteria->compare('nivel_estudio',$this->nivel_estudio,true);
		$criteria->compare('pais_vive',$this->pais_vive);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('fotografia',$this->fotografia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Persona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getSexo(){
        return array(
            'Masculino'=>'MASCULINO',
            'Femenino'=>'FEMENINO',
        );
    }
    public function getEstadoCivil(){
        return array(
            ''=>'ELIJA ESTADO CIVIL',
            'SOLTERO'=>'SOLTERO',
            'CASADO'=>'CASADO',
            'DIVORCIADO'=>'DIVORCIADO',
        );
    }
    public function getPais()
    {
        return CHtml::listData(pais::model()->findAll(),'id_pais','nombre');
    }

    public function getNombreCompleto(){
        return join(" ",array($this->primer_apellido,$this->segundo_apellido,$this->nombres));
    }
    public function getNivelestudio(){
        return array(
            ''=>'SELECCIONE NIVEL DE ESTUDIO',
            'BASICO'=>'BASICO',
            'INTERMEDIO'=>'INTERMEDIO',
            'SUPERIOR'=>'SUPERIOR',
        );
    }
}
