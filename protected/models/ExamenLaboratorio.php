<?php

/**
 * This is the model class for table "examen_laboratorio".
 *
 * The followings are the available columns in table 'examen_laboratorio':
 * @property integer $id_servicio
 * @property integer $id_cat_lab
 *
 * The followings are the available model relations:
 * @property Servicio $idServicio
 * @property CategoriaExLaboratorio $idCatLab
 */
class ExamenLaboratorio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'examen_laboratorio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_servicio, id_cat_lab', 'required'),
			array('id_servicio, id_cat_lab', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_servicio, id_cat_lab', 'safe', 'on'=>'search'),
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
			'serviciodelab' => array(self::BELONGS_TO, 'Servicio', 'id_servicio'),
			'idCatLab' => array(self::BELONGS_TO, 'CategoriaExLaboratorio', 'id_cat_lab'),
            'parametros'=>array(self::MANY_MANY,'ParametroLaboratorio','examen_parametros(id_serv,id_par_lab)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_servicio' => 'Id Servicio',
			'id_cat_lab' => 'Id Cat Lab',
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

		$criteria->compare('id_servicio',$this->id_servicio);
		$criteria->compare('id_cat_lab',$this->id_cat_lab);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ExamenLaboratorio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getNombreInstitucion(){

    }
}
