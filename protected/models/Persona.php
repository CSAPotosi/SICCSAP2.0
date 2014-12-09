<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property integer $id
 * @property string $dni
 * @property string $nit
 * @property string $nombres
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $sexo
 * @property string $fecha_nacimiento
 * @property string $estado_civil
 * @property string $pais
 * @property string $provincia
 * @property string $localidad
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property string $fotografia
 *
 * The followings are the available model relations:
 * @property Medico $medico
 * @property Empleado $empleado
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
			array('dni, nit, estado_civil, telefono, celular', 'length', 'max'=>32),
			array('nombres, email, fotografia', 'length', 'max'=>128),
			array('primer_apellido, segundo_apellido, pais, provincia, localidad', 'length', 'max'=>64),
			array('sexo', 'length', 'max'=>16),
			array('fecha_nacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, dni, nit, nombres, primer_apellido, segundo_apellido, sexo, fecha_nacimiento, estado_civil, pais, provincia, localidad, telefono, celular, email, fotografia', 'safe', 'on'=>'search'),
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
			'medico' => array(self::HAS_ONE, 'Medico', 'id'),
			'empleado' => array(self::HAS_ONE, 'Empleado', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'dni' => 'Dni',
			'nit' => 'Nit',
			'nombres' => 'Nombres',
			'primer_apellido' => 'Primer Apellido',
			'segundo_apellido' => 'Segundo Apellido',
			'sexo' => 'Sexo',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'estado_civil' => 'Estado Civil',
			'pais' => 'Pais',
			'provincia' => 'Provincia',
			'localidad' => 'Localidad',
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
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('nit',$this->nit,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('primer_apellido',$this->primer_apellido,true);
		$criteria->compare('segundo_apellido',$this->segundo_apellido,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('estado_civil',$this->estado_civil,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('provincia',$this->provincia,true);
		$criteria->compare('localidad',$this->localidad,true);
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
            ''=>'IND',
            'M'=>'MASCULINO',
            'F'=>'FEMENINO',
        );
    }
    public function getEstadoCivil(){
        return array(
            'SOLTERO'=>'SOLTERO',
        );
    }
}
