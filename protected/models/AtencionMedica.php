<?php

/**
 * This is the model class for table "atencion_medica".
 *
 * The followings are the available columns in table 'atencion_medica':
 * @property integer $id_servicio
 * @property string $tipo_atencion
 * @property integer $id_m_e
 *
 * The followings are the available model relations:
 * @property Servicio $idServicio
 * @property MedicoEspecialidad $idME
 */
class AtencionMedica extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'atencion_medica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_servicio, tipo_atencion, id_m_e', 'required'),
			array('id_servicio, id_m_e', 'numerical', 'integerOnly'=>true),
			array('tipo_atencion', 'length', 'max'=>16),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_servicio, tipo_atencion, id_m_e', 'safe', 'on'=>'search'),
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
			'idServicio' => array(self::BELONGS_TO, 'Servicio', 'id_servicio'),
			'idME' => array(self::BELONGS_TO, 'MedicoEspecialidad', 'id_m_e'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_servicio' => 'Id Servicio',
			'tipo_atencion' => 'Tipo Atencion',
			'id_m_e' => 'Id M E',
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

		$criteria->compare('id_servicio',$this->id_servicio);
		$criteria->compare('tipo_atencion',$this->tipo_atencion,true);
		$criteria->compare('id_m_e',$this->id_m_e);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AtencionMedica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
