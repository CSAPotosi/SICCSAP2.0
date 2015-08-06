<?php

/**
 * This is the model class for table "cirugia".
 *
 * The followings are the available columns in table 'cirugia':
 * @property integer $id_c
 * @property string $fecha_hora_prog
 * @property integer $duracion_aprox
 * @property string $fecha_hora_ent
 * @property string $fecha_hora_sal
 * @property string $detalle_instru
 * @property string $tipo_anestesia
 * @property string $estado_cirugia
 * @property integer $id_historial
 * @property integer $id_q
 *
 * The followings are the available model relations:
 * @property Persona[] $personas
 * @property HistorialPaciente $historial
 * @property Quirofano $idQ
 */
class Cirugia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cirugia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_historial, id_q, duracion_aprox', 'required'),
            array('fecha_hora_prog', 'required','on'=>'programacion'),
			array('duracion_aprox, id_historial, id_q', 'numerical', 'integerOnly'=>true),
			array('tipo_anestesia', 'length', 'max'=>32),
            array('duracion_aprox','numerical','min'=>0,'max'=>'5760','tooSmall'=>'DURACION no puede ser un numero negativo'),
			array('estado_cirugia', 'length', 'max'=>10),
			array('fecha_hora_prog, fecha_hora_ent, fecha_hora_sal, detalle_instru', 'safe'),
            array('fecha_hora_prog, fecha_hora_ent, fecha_hora_sal','date','format'=>'yyyy-mm-dd HH:mm'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_c, fecha_hora_prog, duracion_aprox, fecha_hora_ent, fecha_hora_sal, detalle_instru, tipo_anestesia, estado_cirugia, id_historial, id_q', 'safe', 'on'=>'search'),
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
			'personas' => array(self::MANY_MANY, 'Persona', 'participante_cirugia(id_c, id_per)'),
			'historial' => array(self::BELONGS_TO, 'HistorialPaciente', 'id_historial'),
			'quirofano' => array(self::BELONGS_TO, 'Quirofano', 'id_q'),
            'participantes'=>array(self::HAS_MANY,'ParticipanteCirugia','id_c'),
            'responsable'=>array(self::HAS_ONE,'ParticipanteCirugia','id_c','condition'=>'es_responsable=true'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_c' => 'Id C',
			'fecha_hora_prog' => 'FECHA Y HORA',
			'duracion_aprox' => 'DURACION APROX. (en min.)',
			'fecha_hora_ent' => 'Fecha Hora Ent',
			'fecha_hora_sal' => 'Fecha Hora Sal',
			'detalle_instru' => 'Detalle Instru',
			'tipo_anestesia' => 'Tipo Anestesia',
			'estado_cirugia' => 'Estado Cirugia',
			'id_historial' => 'Id Historial',
			'id_q' => 'QUIROFANO',
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

		$criteria->compare('id_c',$this->id_c);
		$criteria->compare('fecha_hora_prog',$this->fecha_hora_prog,true);
		$criteria->compare('duracion_aprox',$this->duracion_aprox);
		$criteria->compare('fecha_hora_ent',$this->fecha_hora_ent,true);
		$criteria->compare('fecha_hora_sal',$this->fecha_hora_sal,true);
		$criteria->compare('detalle_instru',$this->detalle_instru,true);
		$criteria->compare('tipo_anestesia',$this->tipo_anestesia,true);
		$criteria->compare('estado_cirugia',$this->estado_cirugia,true);
		$criteria->compare('id_historial',$this->id_historial);
		$criteria->compare('id_q',$this->id_q);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cirugia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeValidate(){
        if($this->scenario=='programacion')
            $this->estado_cirugia='PROGRAMADA';
        return parent::beforeValidate();
    }
}
