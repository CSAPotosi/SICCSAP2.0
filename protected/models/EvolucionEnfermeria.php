<?php

/**
 * This is the model class for table "evolucion_enfermeria".
 *
 * The followings are the available columns in table 'evolucion_enfermeria':
 * @property integer $id_evo_enf
 * @property integer $id_inter
 * @property string $fecha_evo_enf
 * @property string $respuesta_tratamiento
 * @property string $dieta
 *
 * The followings are the available model relations:
 * @property Internacion $idInter
 */
class EvolucionEnfermeria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evolucion_enfermeria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_inter,respuesta_tratamiento', 'required'),
			array('id_inter', 'numerical', 'integerOnly'=>true),
			array('fecha_evo_enf, respuesta_tratamiento, dieta', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_evo_enf, id_inter, fecha_evo_enf, respuesta_tratamiento, dieta', 'safe', 'on'=>'search'),
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
			'internacion' => array(self::BELONGS_TO, 'Internacion', 'id_inter'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_evo_enf' => 'Id Evo Enf',
			'id_inter' => 'Id Inter',
			'fecha_evo_enf' => 'Fecha Evo Enf',
			'respuesta_tratamiento' => 'RESPUESTA TRATAMIENTO',
			'dieta' => 'DIETA',
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

		$criteria->compare('id_evo_enf',$this->id_evo_enf);
		$criteria->compare('id_inter',$this->id_inter);
		$criteria->compare('fecha_evo_enf',$this->fecha_evo_enf,true);
		$criteria->compare('respuesta_tratamiento',$this->respuesta_tratamiento,true);
		$criteria->compare('dieta',$this->dieta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EvolucionEnfermeria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeValidate(){
        if($this->isNewRecord)
            $this->fecha_evo_enf=date('d-m-Y H:i:s');
        return parent::beforeValidate();
    }
}
