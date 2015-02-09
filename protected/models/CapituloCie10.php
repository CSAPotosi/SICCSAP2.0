<?php

/**
 * This is the model class for table "capitulo_cie10".
 *
 * The followings are the available columns in table 'capitulo_cie10':
 * @property string $num_capitulo
 * @property string $titulo_cap
 * @property string $descripcion_cap
 * @property string $codigo_inicial
 * @property string $codigo_final
 *
 * The followings are the available model relations:
 * @property CategoriaCie10[] $categoriaCie10s
 */
class CapituloCie10 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public function tableName()
	{
		return 'capitulo_cie10';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num_capitulo, titulo_cap, codigo_inicial, codigo_final', 'required'),
			array('num_capitulo, codigo_inicial, codigo_final', 'length', 'max'=>8),
			array('descripcion_cap', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('num_capitulo, titulo_cap, descripcion_cap, codigo_inicial, codigo_final', 'safe', 'on'=>'search'),
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
			'categoriaCie10s' => array(self::HAS_MANY, 'CategoriaCie10', 'num_capitulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'num_capitulo' => 'Num Capitulo',
			'titulo_cap' => 'Titulo Cap',
			'descripcion_cap' => 'Descripcion Cap',
			'codigo_inicial' => 'Codigo Inicial',
			'codigo_final' => 'Codigo Final',
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

		$criteria->compare('num_capitulo',$this->num_capitulo,true);
		$criteria->compare('titulo_cap',$this->titulo_cap,true);
		$criteria->compare('descripcion_cap',$this->descripcion_cap,true);
		$criteria->compare('codigo_inicial',$this->codigo_inicial,true);
		$criteria->compare('codigo_final',$this->codigo_final,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CapituloCie10 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getCustomTitle(){
        return  '['.$this->codigo_inicial.'-'.$this->codigo_final.'] '.$this->titulo_cap;
    }



}
