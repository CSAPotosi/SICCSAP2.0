<?php

/**
 * This is the model class for table "cita".
 *
 * The followings are the available columns in table 'cita':
 * @property integer $id_cita
 * @property integer $id_historial
 * @property string $descripcion
 * @property string $tipo_cita
 * @property string $nota_cita
 * @property string $fecha
 * @property string $hora
 * @property string $duracion
 *
 * The followings are the available model relations:
 * @property HistorialPaciente $idHistorial
 */
class Cita extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cita';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_historial', 'numerical', 'integerOnly'=>true),
			array('descripcion, nota_cita', 'length', 'max'=>256),
			array('tipo_cita', 'length', 'max'=>64),
			array('fecha, hora, duracion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cita, id_historial, descripcion, tipo_cita, nota_cita, fecha, hora, duracion', 'safe', 'on'=>'search'),
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
			'idHistorial' => array(self::BELONGS_TO, 'HistorialPaciente', 'id_historial'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cita' => 'Id Cita',
			'id_historial' => 'Id Historial',
			'descripcion' => 'Descripcion',
			'tipo_cita' => 'Tipo Cita',
			'nota_cita' => 'Nota Cita',
			'fecha' => 'Fecha',
			'hora' => 'Hora',
			'duracion' => 'Duracion',
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

		$criteria->compare('id_cita',$this->id_cita);
		$criteria->compare('id_historial',$this->id_historial);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('tipo_cita',$this->tipo_cita,true);
		$criteria->compare('nota_cita',$this->nota_cita,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('duracion',$this->duracion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cita the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
