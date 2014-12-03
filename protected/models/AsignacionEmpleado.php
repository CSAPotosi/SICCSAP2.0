<?php

/**
 * This is the model class for table "asignacion_empleado".
 *
 * The followings are the available columns in table 'asignacion_empleado':
 * @property integer $id_asignacion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $id_empleado
 * @property integer $id_cargo
 * @property integer $id_horario
 *
 * The followings are the available model relations:
 * @property Registro[] $registros
 * @property Empleado $idEmpleado
 * @property Cargo $idCargo
 * @property Horario $idHorario
 */
class AsignacionEmpleado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asignacion_empleado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_empleado, id_cargo, id_horario', 'numerical', 'integerOnly'=>true),
			array('fecha_inicio, fecha_fin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_asignacion, fecha_inicio, fecha_fin, id_empleado, id_cargo, id_horario', 'safe', 'on'=>'search'),
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
			'registros' => array(self::HAS_MANY, 'Registro', 'id_asignacion'),
			'idEmpleado' => array(self::BELONGS_TO, 'Empleado', 'id_empleado'),
			'idCargo' => array(self::BELONGS_TO, 'Cargo', 'id_cargo'),
			'idHorario' => array(self::BELONGS_TO, 'Horario', 'id_horario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_asignacion' => 'Id Asignacion',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'id_empleado' => 'Id Empleado',
			'id_cargo' => 'Id Cargo',
			'id_horario' => 'Id Horario',
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

		$criteria->compare('id_asignacion',$this->id_asignacion);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('id_empleado',$this->id_empleado);
		$criteria->compare('id_cargo',$this->id_cargo);
		$criteria->compare('id_horario',$this->id_horario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AsignacionEmpleado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
