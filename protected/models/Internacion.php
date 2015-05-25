<?php

/**
 * This is the model class for table "internacion".
 *
 * The followings are the available columns in table 'internacion':
 * @property integer $id_inter
 * @property integer $id_historial
 * @property string $fecha_ingreso
 * @property string $motivo_ingreso
 * @property string $observacion_ingreso
 * @property string $procedencia_ingreso
 * @property integer $id_diagnostico_ingreso
 * @property string $fecha_alta
 * @property string $tipo_alta
 * @property integer $id_diagnostico_alta
 * @property string $observacion_alta
 * @property string $fecha_egreso
 *
 * The followings are the available model relations:
 * @property HistorialPaciente $idHistorial
 * @property Consulta $idDiagnosticoIngreso
 * @property Consulta $idDiagnosticoAlta
 */
class Internacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'internacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_historial, fecha_ingreso, motivo_ingreso', 'required'),
			array('id_historial, id_diagnostico_ingreso, id_diagnostico_alta', 'numerical', 'integerOnly'=>true),
			array('motivo_ingreso', 'length', 'max'=>32),
			array('observacion_ingreso, observacion_alta', 'length', 'max'=>256),
			array('procedencia_ingreso, tipo_alta', 'length', 'max'=>16),
			array('fecha_alta, fecha_egreso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_inter, id_historial, fecha_ingreso, motivo_ingreso, observacion_ingreso, procedencia_ingreso, id_diagnostico_ingreso, fecha_alta, tipo_alta, id_diagnostico_alta, observacion_alta, fecha_egreso', 'safe', 'on'=>'search'),
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
			'historial' => array(self::BELONGS_TO, 'HistorialPaciente', 'id_historial'),
			'idDiagnosticoIngreso' => array(self::BELONGS_TO, 'Consulta', 'id_diagnostico_ingreso'),
			'idDiagnosticoAlta' => array(self::BELONGS_TO, 'Consulta', 'id_diagnostico_alta'),
            'salaActual' => array(self::HAS_ONE, 'SalaInternacion', 'id_inter','condition'=>'fecha_salida is null'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_inter' => 'Id Inter',
			'id_historial' => 'Id Historial',
			'fecha_ingreso' => 'Fecha Ingreso',
			'motivo_ingreso' => 'Motivo Ingreso',
			'observacion_ingreso' => 'Observacion Ingreso',
			'procedencia_ingreso' => 'Procedencia Ingreso',
			'id_diagnostico_ingreso' => 'Id Diagnostico Ingreso',
			'fecha_alta' => 'Fecha Alta',
			'tipo_alta' => 'Tipo Alta',
			'id_diagnostico_alta' => 'Id Diagnostico Alta',
			'observacion_alta' => 'Observacion Alta',
			'fecha_egreso' => 'Fecha Egreso',
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

		$criteria->compare('id_inter',$this->id_inter);
		$criteria->compare('id_historial',$this->id_historial);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('motivo_ingreso',$this->motivo_ingreso,true);
		$criteria->compare('observacion_ingreso',$this->observacion_ingreso,true);
		$criteria->compare('procedencia_ingreso',$this->procedencia_ingreso,true);
		$criteria->compare('id_diagnostico_ingreso',$this->id_diagnostico_ingreso);
		$criteria->compare('fecha_alta',$this->fecha_alta,true);
		$criteria->compare('tipo_alta',$this->tipo_alta,true);
		$criteria->compare('id_diagnostico_alta',$this->id_diagnostico_alta);
		$criteria->compare('observacion_alta',$this->observacion_alta,true);
		$criteria->compare('fecha_egreso',$this->fecha_egreso,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Internacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getMotivo(){
        return [
            'ENFERMEDAD'=>'ENFERMEDAD',
            'ACCIDENTE'=>'ACCIDENTE',
            'EMBARAZO'=>'EMBARAZO'
        ];
    }

    public function getProcedencia(){
        return [
            'CONSULTA EXTERNA'=>'CONSULTA EXTERNA',
            'EMERGENCIA'=>'EMERGENCIA',
            'REFERIDO'=>'REFERIDO'
        ];
    }


}
