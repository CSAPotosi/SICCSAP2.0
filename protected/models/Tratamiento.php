<?php

/**
 * This is the model class for table "tratamiento".
 *
 * The followings are the available columns in table 'tratamiento':
 * @property integer $id_tratamiento
 * @property string $fecha_tratamiento
 * @property string $indicaciones
 * @property integer $id_consulta
 *
 * The followings are the available model relations:
 * @property Receta[] $recetas
 * @property Consulta $idConsulta
 */
class Tratamiento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tratamiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_tratamiento', 'required'),
			array('id_consulta', 'numerical', 'integerOnly'=>true),
			array('indicaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tratamiento, fecha_tratamiento, indicaciones, id_consulta', 'safe', 'on'=>'search'),
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
			'recetas' => array(self::HAS_MANY, 'Receta', 'id_tratamiento'),
			'idConsulta' => array(self::BELONGS_TO, 'Consulta', 'id_consulta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tratamiento' => 'Id Tratamiento',
			'fecha_tratamiento' => 'Fecha Tratamiento',
			'indicaciones' => 'Indicaciones',
			'id_consulta' => 'Id Consulta',
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

		$criteria->compare('id_tratamiento',$this->id_tratamiento);
		$criteria->compare('fecha_tratamiento',$this->fecha_tratamiento,true);
		$criteria->compare('indicaciones',$this->indicaciones,true);
		$criteria->compare('id_consulta',$this->id_consulta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tratamiento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
