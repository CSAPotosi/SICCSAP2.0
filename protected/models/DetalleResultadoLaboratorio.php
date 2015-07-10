<?php

/**
 * This is the model class for table "detalle_resultado_laboratorio".
 *
 * The followings are the available columns in table 'detalle_resultado_laboratorio':
 * @property integer $id_res_lab
 * @property integer $id_parametro
 * @property string $valor_resultado
 */
class DetalleResultadoLaboratorio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalle_resultado_laboratorio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_parametro, valor_resultado', 'required'),
			array('id_res_lab, id_parametro', 'numerical', 'integerOnly'=>true),
			array('valor_resultado', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_res_lab, id_parametro, valor_resultado', 'safe', 'on'=>'search'),
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
            'parametro'=>array(self::BELONGS_TO,'ParametroLaboratorio','id_parametro'),
            'resultadoLab'=>array(self::BELONGS_TO,'ResultadoLaboratorio','id_res_lab'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_res_lab' => 'Id Res Lab',
			'id_parametro' => 'Id Parametro',
			'valor_resultado' => 'Valor Resultado',
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

		$criteria->compare('id_res_lab',$this->id_res_lab);
		$criteria->compare('id_parametro',$this->id_parametro);
		$criteria->compare('valor_resultado',$this->valor_resultado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleResultadoLaboratorio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
