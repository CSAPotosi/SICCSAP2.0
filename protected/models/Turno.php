<?php

/**
 * This is the model class for table "turno".
 *
 * The followings are the available columns in table 'turno':
 * @property integer $id_turno
 * @property string $nombre_turno
 * @property string $tipo_turno
 * @property string $hora_entrada
 * @property integer $inicio_entrada
 * @property integer $fin_entrada
 * @property string $hora_salida
 * @property integer $inicio_salida
 * @property integer $fin_salida
 * @property integer $tolerancia
 * @property string $dias
 * @property integer $id_horario
 *
 * The followings are the available model relations:
 * @property Horario $idHorario
 */
class Turno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'turno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_turno, hora_entrada, hora_salida', 'required'),
			array('inicio_entrada, fin_entrada, inicio_salida, fin_salida, tolerancia, id_horario', 'numerical', 'integerOnly'=>true),
			array('nombre_turno', 'length', 'max'=>32),
			array('tipo_turno', 'length', 'max'=>8),
			array('dias', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_turno, nombre_turno, tipo_turno, hora_entrada, inicio_entrada, fin_entrada, hora_salida, inicio_salida, fin_salida, tolerancia, dias, id_horario', 'safe', 'on'=>'search'),
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
			'idHorario' => array(self::BELONGS_TO, 'Horario', 'id_horario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_turno' => 'Id Turno',
			'nombre_turno' => 'Nombre Turno',
			'tipo_turno' => 'Tipo Turno',
			'hora_entrada' => 'Hora Entrada',
			'inicio_entrada' => 'Inicio Entrada',
			'fin_entrada' => 'Fin Entrada',
			'hora_salida' => 'Hora Salida',
			'inicio_salida' => 'Inicio Salida',
			'fin_salida' => 'Fin Salida',
			'tolerancia' => 'Tolerancia',
			'dias' => 'Dias',
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

		$criteria->compare('id_turno',$this->id_turno);
		$criteria->compare('nombre_turno',$this->nombre_turno,true);
		$criteria->compare('tipo_turno',$this->tipo_turno,true);
		$criteria->compare('hora_entrada',$this->hora_entrada,true);
		$criteria->compare('inicio_entrada',$this->inicio_entrada);
		$criteria->compare('fin_entrada',$this->fin_entrada);
		$criteria->compare('hora_salida',$this->hora_salida,true);
		$criteria->compare('inicio_salida',$this->inicio_salida);
		$criteria->compare('fin_salida',$this->fin_salida);
		$criteria->compare('tolerancia',$this->tolerancia);
		$criteria->compare('dias',$this->dias,true);
		$criteria->compare('id_horario',$this->id_horario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Turno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getTipoTurno(){
        return array(
            'MAÑANA'=>'MAÑANA',
            'TARDE'=>'TARDE',
            'NOCHE'=>'NOCHE',
            'CONTINUO'=>'CONTINUO',
            'DIA COMPLETO'=>'DIA COMPLETO',
        );
    }
}
