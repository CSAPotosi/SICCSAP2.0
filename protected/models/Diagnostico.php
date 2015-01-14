<?php

/**
 * This is the model class for table "diagnostico".
 *
 * The followings are the available columns in table 'diagnostico':
 * @property integer $id_diagnostico
 * @property string $fecha_diagnostico
 * @property string $sintomas
 * @property string $diagnostico
 * @property string $tratamiento
 * @property string $observaciones
 * @property integer $id_historia
 *
 * The followings are the available model relations:
 * @property HistorialPaciente $idHistoria
 */
class Diagnostico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'diagnostico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_diagnostico, id_historia', 'required'),
			array('id_historia', 'numerical', 'integerOnly'=>true),
			array('sintomas, diagnostico, tratamiento, observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_diagnostico, fecha_diagnostico, sintomas, diagnostico, tratamiento, observaciones, id_historia', 'safe', 'on'=>'search'),
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
			'idHistoria' => array(self::BELONGS_TO, 'HistorialPaciente', 'id_historia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_diagnostico' => 'Id Diagnostico',
			'fecha_diagnostico' => 'Fecha Diagnostico',
			'sintomas' => 'Sintomas',
			'diagnostico' => 'Diagnostico',
			'tratamiento' => 'Tratamiento',
			'observaciones' => 'Observaciones',
			'id_historia' => 'Id Historia',
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

		$criteria->compare('id_diagnostico',$this->id_diagnostico);
		$criteria->compare('fecha_diagnostico',$this->fecha_diagnostico,true);
		$criteria->compare('sintomas',$this->sintomas,true);
		$criteria->compare('diagnostico',$this->diagnostico,true);
		$criteria->compare('tratamiento',$this->tratamiento,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('id_historia',$this->id_historia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Diagnostico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
