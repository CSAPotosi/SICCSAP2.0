<?php

/**
 * This is the model class for table "categoria_ex_laboratorio".
 *
 * The followings are the available columns in table 'categoria_ex_laboratorio':
 * @property integer $id_cat_lab
 * @property string $codigo_cat_lab
 * @property string $nombre_cat_lab
 *
 * The followings are the available model relations:
 * @property ExamenLaboratorio[] $examenLaboratorios
 */
class CategoriaExLaboratorio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria_ex_laboratorio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_cat_lab', 'required'),
			array('codigo_cat_lab', 'length', 'max'=>8),
			array('nombre_cat_lab', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cat_lab, codigo_cat_lab, nombre_cat_lab', 'safe', 'on'=>'search'),
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
			'examenLaboratorios' => array(self::HAS_MANY, 'ExamenLaboratorio', 'id_cat_lab'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cat_lab' => 'Id Cat Lab',
			'codigo_cat_lab' => 'Codigo Cat Lab',
			'nombre_cat_lab' => 'Nombre Cat Lab',
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

		$criteria->compare('id_cat_lab',$this->id_cat_lab);
		$criteria->compare('codigo_cat_lab',$this->codigo_cat_lab,true);
		$criteria->compare('nombre_cat_lab',$this->nombre_cat_lab,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoriaExLaboratorio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
