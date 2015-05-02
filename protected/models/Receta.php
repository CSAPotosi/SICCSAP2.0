<?php

/**
 * This is the model class for table "receta".
 *
 * The followings are the available columns in table 'receta':
 * @property integer $id_receta
 * @property integer $id_med
 * @property integer $cantidad
 * @property string $duracion_tratamiento
 * @property string $indicaciones
 * @property string $via
 * @property string $info_adicional
 * @property integer $id_tratamiento
 *
 * The followings are the available model relations:
 * @property Medicamento $idMed
 * @property Tratamiento $idTratamiento
 */
class Receta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'receta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_med, cantidad, id_tratamiento', 'required'),
			array('id_med, cantidad, id_tratamiento', 'numerical', 'integerOnly'=>true),
			array('duracion_tratamiento, via', 'length', 'max'=>128),
			array('indicaciones, info_adicional', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_receta, id_med, cantidad, duracion_tratamiento, indicaciones, via, info_adicional, id_tratamiento', 'safe', 'on'=>'search'),
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
			'idMed' => array(self::BELONGS_TO, 'Medicamento', 'id_med'),
			'idTratamiento' => array(self::BELONGS_TO, 'Tratamiento', 'id_tratamiento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_receta' => 'Id Receta',
			'id_med' => 'Id Med',
			'cantidad' => 'Cantidad',
			'duracion_tratamiento' => 'Duracion Tratamiento',
			'indicaciones' => 'Indicaciones',
			'via' => 'Via',
			'info_adicional' => 'Info Adicional',
			'id_tratamiento' => 'Id Tratamiento',
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

		$criteria->compare('id_receta',$this->id_receta);
		$criteria->compare('id_med',$this->id_med);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('duracion_tratamiento',$this->duracion_tratamiento,true);
		$criteria->compare('indicaciones',$this->indicaciones,true);
		$criteria->compare('via',$this->via,true);
		$criteria->compare('info_adicional',$this->info_adicional,true);
		$criteria->compare('id_tratamiento',$this->id_tratamiento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Receta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
