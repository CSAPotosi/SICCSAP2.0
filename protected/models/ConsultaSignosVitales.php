<?php

/**
 * This is the model class for table "consulta_signos_vitales".
 *
 * The followings are the available columns in table 'consulta_signos_vitales':
 * @property integer $id_consulta
 * @property integer $id_sv
 * @property string $fecha
 * @property double $valor
 * @property string $observacion
 *
 * The followings are the available model relations:
 * @property Consulta $idConsulta
 * @property SignosVitales $idSv
 */
class ConsultaSignosVitales extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consulta_signos_vitales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_sv, fecha', 'required'),
			array('id_consulta, id_sv', 'numerical', 'integerOnly'=>true),
			array('valor', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_consulta, id_sv, fecha, valor, observacion', 'safe', 'on'=>'search'),
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
			'idConsulta' => array(self::BELONGS_TO, 'Consulta', 'id_consulta'),
			'SignosVitales' => array(self::BELONGS_TO, 'SignosVitales', 'id_sv'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_consulta' => 'Id Consulta',
			'id_sv' => 'Id Sv',
			'fecha' => 'Fecha',
			'valor' => 'Valor',
			'observacion' => 'Observacion',
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

		$criteria->compare('id_consulta',$this->id_consulta);
		$criteria->compare('id_sv',$this->id_sv);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('observacion',$this->observacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConsultaSignosVitales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeValidate(){
        $this->fecha=new CDbExpression('NOW()');
        return parent::beforeValidate();
    }
}
