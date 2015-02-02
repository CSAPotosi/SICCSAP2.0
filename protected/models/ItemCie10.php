<?php

/**
 * This is the model class for table "item_cie10".
 *
 * The followings are the available columns in table 'item_cie10':
 * @property string $codigo
 * @property string $titulo
 * @property string $descripcion
 * @property string $codigo_item_padre
 * @property integer $id_cat_cie10
 *
 * The followings are the available model relations:
 * @property ItemCie10 $codigoItemPadre
 * @property ItemCie10[] $itemCie10s
 * @property CategoriaCie10 $idCatCie10
 */
class ItemCie10 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_cie10';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo, titulo, id_cat_cie10', 'required'),
			array('id_cat_cie10', 'numerical', 'integerOnly'=>true),
			array('codigo, codigo_item_padre', 'length', 'max'=>8),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('codigo, titulo, descripcion, codigo_item_padre, id_cat_cie10', 'safe', 'on'=>'search'),
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
			'codigoItemPadre' => array(self::BELONGS_TO, 'ItemCie10', 'codigo_item_padre'),
			'itemCie10s' => array(self::HAS_MANY, 'ItemCie10', 'codigo_item_padre'),
			'idCatCie10' => array(self::BELONGS_TO, 'CategoriaCie10', 'id_cat_cie10'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codigo' => 'Codigo',
			'titulo' => 'Titulo',
			'descripcion' => 'Descripcion',
			'codigo_item_padre' => 'Codigo Item Padre',
			'id_cat_cie10' => 'Id Cat Cie10',
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

		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('codigo_item_padre',$this->codigo_item_padre,true);
		$criteria->compare('id_cat_cie10',$this->id_cat_cie10);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemCie10 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
