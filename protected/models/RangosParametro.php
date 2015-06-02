<?php

/**
 * This is the model class for table "rangos_parametro".
 *
 * The followings are the available columns in table 'rangos_parametro':
 * @property integer $id_rango
 * @property double $valor_min
 * @property double $valor_max
 * @property integer $sexo_rango
 * @property integer $id_par_lab
 *
 * The followings are the available model relations:
 * @property ParametroLaboratorio $idParLab
 */
class RangosParametro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rangos_parametro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_par_lab', 'required'),
			array('sexo_rango, id_par_lab', 'numerical', 'integerOnly'=>true),
			array('valor_min, valor_max', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rango, valor_min, valor_max, sexo_rango, id_par_lab', 'safe', 'on'=>'search'),
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
			'idParLab' => array(self::BELONGS_TO, 'ParametroLaboratorio', 'id_par_lab'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rango' => 'Id Rango',
			'valor_min' => 'Valor Min',
			'valor_max' => 'Valor Max',
			'sexo_rango' => 'Sexo Rango',
			'id_par_lab' => 'Id Par Lab',
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

		$criteria->compare('id_rango',$this->id_rango);
		$criteria->compare('valor_min',$this->valor_min);
		$criteria->compare('valor_max',$this->valor_max);
		$criteria->compare('sexo_rango',$this->sexo_rango);
		$criteria->compare('id_par_lab',$this->id_par_lab);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RangosParametro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
