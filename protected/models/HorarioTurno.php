<?php

/**
 * This is the model class for table "horario_turno".
 *
 * The followings are the available columns in table 'horario_turno':
 * @property integer $id_turno_horario
 * @property integer $id_horario
 * @property integer $id_turno
 * @property integer $dia_semana
 *
 * The followings are the available model relations:
 * @property Horario $idHorario
 * @property Turno $idTurno
 */
class HorarioTurno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'horario_turno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_horario, id_turno, dia_semana', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_turno_horario, id_horario, id_turno, dia_semana', 'safe', 'on'=>'search'),
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
			'horario' => array(self::BELONGS_TO, 'Horario', 'id_horario'),
			'turno' => array(self::BELONGS_TO, 'Turno', 'id_turno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_turno_horario' => 'Id Turno Horario',
			'id_horario' => 'Id Horario',
			'id_turno' => 'Id Turno',
			'dia_semana' => 'Dia Semana',
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

		$criteria->compare('id_turno_horario',$this->id_turno_horario);
		$criteria->compare('id_horario',$this->id_horario);
		$criteria->compare('id_turno',$this->id_turno);
		$criteria->compare('dia_semana',$this->dia_semana);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HorarioTurno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
