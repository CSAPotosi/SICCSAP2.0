<?php

/**
 * This is the model class for table "categoria_servicio".
 *
 * The followings are the available columns in table 'categoria_servicio':
 * @property integer $id_categoria_serv
 * @property string $nombre_categoria
 * @property string $descripcion_categoria_serv
 *
 * The followings are the available model relations:
 * @property ServicioMedico[] $servicioMedicos
 */
class CategoriaServicio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria_servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_categoria', 'required'),
			array('nombre_categoria, descripcion_categoria_serv', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_categoria_serv, nombre_categoria, descripcion_categoria_serv', 'safe', 'on'=>'search'),
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
			'servicioMedicos' => array(self::HAS_MANY, 'ServicioMedico', 'id_categoria_serv'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_categoria_serv' => 'Codigo',
			'nombre_categoria' => 'Nombre',
			'descripcion_categoria_serv' => 'Descripcion',
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

		$criteria->compare('id_categoria_serv',$this->id_categoria_serv);
		$criteria->compare('nombre_categoria',$this->nombre_categoria,true);
		$criteria->compare('descripcion_categoria_serv',$this->descripcion_categoria_serv,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoriaServicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
