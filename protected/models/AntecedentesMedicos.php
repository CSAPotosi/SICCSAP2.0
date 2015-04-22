<?php

/**
 * This is the model class for table "antecedentes_medicos".
 *
 * The followings are the available columns in table 'antecedentes_medicos':
 * @property integer $id_ant
 * @property string $nombre_ant
 * @property string $tipo_ant
 * @property string $descripcion_ant
 *
 * The followings are the available model relations:
 * @property HistorialPaciente[] $historialPacientes
 */
class AntecedentesMedicos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'antecedentes_medicos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_ant, tipo_ant', 'length', 'max'=>64),
			array('descripcion_ant', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ant, nombre_ant, tipo_ant, descripcion_ant', 'safe', 'on'=>'search'),
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
			'historialPacientes' => array(self::MANY_MANY, 'HistorialPaciente', 'historia_antecedentes(id_ant, id_historia)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ant' => 'Id Ant',
			'nombre_ant' => 'Nombre Ant',
			'tipo_ant' => 'Tipo Ant',
			'descripcion_ant' => 'Descripcion Ant',
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

		$criteria->compare('id_ant',$this->id_ant);
		$criteria->compare('nombre_ant',$this->nombre_ant,true);
		$criteria->compare('tipo_ant',$this->tipo_ant,true);
		$criteria->compare('descripcion_ant',$this->descripcion_ant,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AntecedentesMedicos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
