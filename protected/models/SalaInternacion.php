<?php

/**
 * This is the model class for table "sala_internacion".
 *
 * The followings are the available columns in table 'sala_internacion':
 * @property integer $id_inter
 * @property integer $id_sala
 * @property string $fecha_entrada
 * @property string $fecha_salida
 *
 * The followings are the available model relations:
 * @property Internacion $idInter
 * @property Sala $idSala
 */
class SalaInternacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sala_internacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_inter, id_sala, fecha_entrada', 'required'),
			array('id_inter, id_sala', 'numerical', 'integerOnly'=>true),
			array('fecha_salida', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_inter, id_sala, fecha_entrada, fecha_salida', 'safe', 'on'=>'search'),
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
			'sala' => array(self::BELONGS_TO, 'Sala', 'id_sala'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_inter' => 'Id Inter',
			'id_sala' => 'Id Sala',
			'fecha_entrada' => 'Fecha Entrada',
			'fecha_salida' => 'Fecha Salida',
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

		$criteria->compare('id_inter',$this->id_inter);
		$criteria->compare('id_sala',$this->id_sala);
		$criteria->compare('fecha_entrada',$this->fecha_entrada,true);
		$criteria->compare('fecha_salida',$this->fecha_salida,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SalaInternacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeValidate(){
        $this->fecha_entrada=date('d-m-Y H:i:s');
        return parent::beforeValidate();
    }
}
