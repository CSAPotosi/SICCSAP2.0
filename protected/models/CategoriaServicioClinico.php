<?php

/**
 * This is the model class for table "categoria_servicio_clinico".
 *
 * The followings are the available columns in table 'categoria_servicio_clinico':
 * @property integer $id_cat_cli
 * @property string $codigo_cat_cli
 * @property string $nombre_cat_cli
 *
 * The followings are the available model relations:
 * @property ServicioClinico[] $servicioClinicos
 */
class CategoriaServicioClinico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria_servicio_clinico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_cat_cli', 'required'),
			array('codigo_cat_cli', 'length', 'max'=>8),
			array('nombre_cat_cli', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cat_cli, codigo_cat_cli, nombre_cat_cli', 'safe', 'on'=>'search'),
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
			'servicioClinicos' => array(self::HAS_MANY, 'ServicioClinico', 'id_cat_cli'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cat_cli' => 'Id Cat Cli',
			'codigo_cat_cli' => 'Codigo Cat Cli',
			'nombre_cat_cli' => 'Nombre Cat Cli',
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

		$criteria->compare('id_cat_cli',$this->id_cat_cli);
		$criteria->compare('codigo_cat_cli',$this->codigo_cat_cli,true);
		$criteria->compare('nombre_cat_cli',$this->nombre_cat_cli,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoriaServicioClinico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
