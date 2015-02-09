<?php

/**
 * This is the model class for table "categoria_cie10".
 *
 * The followings are the available columns in table 'categoria_cie10':
 * @property integer $id_cat_cie10
 * @property string $titulo_cat_cie10
 * @property string $descripcion
 * @property string $codigo_inicial
 * @property string $codigo_final
 * @property string $num_capitulo
 *
 * The followings are the available model relations:
 * @property ItemCie10[] $itemCie10s
 * @property CapituloCie10 $numCapitulo
 */
class CategoriaCie10 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria_cie10';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo_cat_cie10, codigo_inicial, codigo_final, num_capitulo', 'required'),
			array('codigo_inicial, codigo_final, num_capitulo', 'length', 'max'=>8),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cat_cie10, titulo_cat_cie10, descripcion, codigo_inicial, codigo_final, num_capitulo', 'safe', 'on'=>'search'),
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
			'itemCie10s' => array(self::HAS_MANY, 'ItemCie10', 'id_cat_cie10'),
			'numCapitulo' => array(self::BELONGS_TO, 'CapituloCie10', 'num_capitulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cat_cie10' => 'Id Cat Cie10',
			'titulo_cat_cie10' => 'Titulo Cat Cie10',
			'descripcion' => 'Descripcion',
			'codigo_inicial' => 'Codigo Inicial',
			'codigo_final' => 'Codigo Final',
			'num_capitulo' => 'Num Capitulo',
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

		$criteria->compare('id_cat_cie10',$this->id_cat_cie10);
		$criteria->compare('titulo_cat_cie10',$this->titulo_cat_cie10,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('codigo_inicial',$this->codigo_inicial,true);
		$criteria->compare('codigo_final',$this->codigo_final,true);
		$criteria->compare('num_capitulo',$this->num_capitulo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoriaCie10 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
