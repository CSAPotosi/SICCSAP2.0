<?php

/**
 * This is the model class for table "tipo_antecedente".
 *
 * The followings are the available columns in table 'tipo_antecedente':
 * @property integer $id_tipo_ant
 * @property string $titulo
 * @property string $genero_aplicado
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property AntecedenteMedico[] $antecedenteMedicos
 */
class TipoAntecedente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_antecedente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo', 'required','message'=>'Este Campo es requerido'),
			array('titulo', 'length', 'max'=>32),
			array('genero_aplicado', 'length', 'max'=>1),
			array('descripcion', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tipo_ant, titulo, genero_aplicado, descripcion', 'safe', 'on'=>'search'),

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
			'antecedenteMedicos' => array(self::HAS_MANY, 'AntecedenteMedico', 'id_tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipo_ant' => 'Id Tipo Ant',
			'titulo' => 'Titulo',
			'genero_aplicado' => 'Genero Aplicado',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('id_tipo_ant',$this->id_tipo_ant);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('genero_aplicado',$this->genero_aplicado,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoAntecedente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
