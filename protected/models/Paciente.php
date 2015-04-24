<?php

/**
 * This is the model class for table "paciente".
 *
 * The followings are the available columns in table 'paciente':
 * @property integer $id_paciente
 * @property string $ocupacion_paciente
 * @property string $grupo_sanguineo_paciente
 * @property string $estado_paciente
 * @property integer $id_contacto_paciente
 *
 * The followings are the available model relations:
 * @property Persona $idPaciente
 * @property Persona $idContactoPaciente
 */
class Paciente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'paciente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_contacto_paciente', 'numerical', 'integerOnly'=>true),
			array('ocupacion_paciente, estado_paciente', 'length', 'max'=>32),
			array('grupo_sanguineo_paciente', 'length', 'max'=>16),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_paciente, ocupacion_paciente, grupo_sanguineo_paciente, estado_paciente, id_contacto_paciente', 'safe', 'on'=>'search'),
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
			'personapa' => array(self::BELONGS_TO, 'Persona', 'id_paciente'),
			'idContactoPaciente' => array(self::BELONGS_TO, 'Persona', 'id_contacto_paciente'),
            'contacto'=>array(self::HAS_ONE,'Persona','id'),
            'pacihisto'=>array(self::HAS_ONE,'historialPaciente','id_historial')
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_paciente' => 'Id Paciente',
			'ocupacion_paciente' => 'Ocupacion Paciente',
			'grupo_sanguineo_paciente' => 'Grupo Sanguineo Paciente',
			'estado_paciente' => 'Estado Paciente',
			'id_contacto_paciente' => 'Id Contacto Paciente',
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

		$criteria->compare('id_paciente',$this->id_paciente);
		$criteria->compare('ocupacion_paciente',$this->ocupacion_paciente,true);
		$criteria->compare('grupo_sanguineo_paciente',$this->grupo_sanguineo_paciente,true);
		$criteria->compare('estado_paciente',$this->estado_paciente,true);
		$criteria->compare('id_contacto_paciente',$this->id_contacto_paciente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Paciente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getTiposangre(){
        return array(
            ''=>'ELIJA TIPO DE SANGRE',
            'O+'=>'O+',
            'A+'=>'A+',
            'A-'=>'A-',
            'B+'=>'B+',
            'B-'=>'B-',
            'AB+'=>'AB+',
            'AB-'=>'AB-',
            'O-'=>'O-',
        );
    }
}
