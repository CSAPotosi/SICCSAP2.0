<?php

/**
 * This is the model class for table "consulta_cie10".
 *
 * The followings are the available columns in table 'consulta_cie10':
 * @property integer $id_consulta
 * @property string $codigo_cie10
 */
class ConsultaCie10 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consulta_cie10';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_consulta, codigo_cie10', 'required'),
			array('id_consulta', 'numerical', 'integerOnly'=>true),
			array('codigo_cie10', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_consulta, codigo_cie10', 'safe', 'on'=>'search'),
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
            'itemCie' => array(self::BELONGS_TO, 'ItemCie10', 'codigo_cie10'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_consulta' => 'Id Consulta',
			'codigo_cie10' => 'Codigo Cie10',
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
		$criteria->compare('codigo_cie10',$this->codigo_cie10,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConsultaCie10 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
