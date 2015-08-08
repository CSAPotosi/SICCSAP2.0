<?php

/**
 * This is the model class for table "convenio_institucion".
 *
 * The followings are the available columns in table 'convenio_institucion':
 * @property integer $id_convenio
 * @property string $nombre_convenio
 * @property integer $id_insti
 *
 * The followings are the available model relations:
 * @property Institucion $idInsti
 */
class ConvenioInstitucion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convenio_institucion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_convenio, id_insti', 'required'),
			array('id_insti', 'numerical', 'integerOnly'=>true),
			array('nombre_convenio', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_convenio, nombre_convenio, id_insti', 'safe', 'on'=>'search'),
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
			'idInsti' => array(self::BELONGS_TO, 'Institucion', 'id_insti'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_convenio' => 'Id Convenio',
			'nombre_convenio' => 'Nombre Convenio',
			'id_insti' => 'Id Insti',
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

		$criteria->compare('id_convenio',$this->id_convenio);
		$criteria->compare('nombre_convenio',$this->nombre_convenio,true);
		$criteria->compare('id_insti',$this->id_insti);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConvenioInstitucion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getInstitucion()
    {
        return CHtml::listData(Institucion::model()->findAll(),'id_insti','nombre');
    }
    public function getlistaConvenios(){
        return CHtml::listData(ConvenioInstitucion::model()->findAll(),'id_insti','nombre');
    }
}
