<?php

/**
 * This is the model class for table "categoria_ex_gabinete".
 *
 * The followings are the available columns in table 'categoria_ex_gabinete':
 * @property integer $id_cat_gab
 * @property string $codigo_cat_gab
 * @property string $nombre_cat_gab
 *
 * The followings are the available model relations:
 * @property ExamenGabinete[] $examenGabinetes
 */
class CategoriaExGabinete extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria_ex_gabinete';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_cat_gab', 'required'),
			array('codigo_cat_gab', 'length', 'max'=>8),
			array('nombre_cat_gab', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cat_gab, codigo_cat_gab, nombre_cat_gab', 'safe', 'on'=>'search'),
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
			'examenGabinetes' => array(self::HAS_MANY, 'ExamenGabinete', 'id_cat_gab'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cat_gab' => 'Id Cat Gab',
			'codigo_cat_gab' => 'Codigo Cat Gab',
			'nombre_cat_gab' => 'Nombre Cat Gab',
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

		$criteria->compare('id_cat_gab',$this->id_cat_gab);
		$criteria->compare('codigo_cat_gab',$this->codigo_cat_gab,true);
		$criteria->compare('nombre_cat_gab',$this->nombre_cat_gab,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoriaExGabinete the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
