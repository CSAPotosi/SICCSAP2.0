<?php

/**
 * This is the model class for table "signos_vitales".
 *
 * The followings are the available columns in table 'signos_vitales':
 * @property integer $id_sv
 * @property string $nombre_sv
 * @property string $nombre_corto_sv
 * @property string $tipo_sv
 * @property string $unidad_sv
 *
 * The followings are the available model relations:
 * @property ConsultaSignosVitales[] $consultaSignosVitales
 */
class SignosVitales extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'signos_vitales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_sv, nombre_corto_sv', 'required'),
			array('nombre_sv', 'length', 'max'=>128),
			array('nombre_corto_sv, tipo_sv', 'length', 'max'=>64),
			array('unidad_sv', 'length', 'max'=>16),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_sv, nombre_sv, nombre_corto_sv, tipo_sv, unidad_sv', 'safe', 'on'=>'search'),
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
			'consultaSignosVitales' => array(self::HAS_MANY, 'ConsultaSignosVitales', 'id_sv'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sv' => 'Id Sv',
			'nombre_sv' => 'Nombre Sv',
			'nombre_corto_sv' => 'Nombre Corto Sv',
			'tipo_sv' => 'Tipo Sv',
			'unidad_sv' => 'Unidad Sv',
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

		$criteria->compare('id_sv',$this->id_sv);
		$criteria->compare('nombre_sv',$this->nombre_sv,true);
		$criteria->compare('nombre_corto_sv',$this->nombre_corto_sv,true);
		$criteria->compare('tipo_sv',$this->tipo_sv,true);
		$criteria->compare('unidad_sv',$this->unidad_sv,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SignosVitales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
