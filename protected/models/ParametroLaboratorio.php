<?php

/**
 * This is the model class for table "parametro_laboratorio".
 *
 * The followings are the available columns in table 'parametro_laboratorio':
 * @property integer $id_par_lab
 * @property string $nombre_par_lab
 * @property string $unidad_par_lab
 * @property integer $estado_par_lab
 *
 * The followings are the available model relations:
 * @property Servicio[] $servicios
 * @property RangosParametro[] $rangosParametros
 */
class ParametroLaboratorio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parametro_laboratorio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_par_lab', 'required'),
			array('estado_par_lab', 'numerical', 'integerOnly'=>true),
			array('nombre_par_lab', 'length', 'max'=>64),
			array('unidad_par_lab', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_par_lab, nombre_par_lab, unidad_par_lab, estado_par_lab', 'safe', 'on'=>'search'),
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
			'servicios' => array(self::MANY_MANY, 'Servicio', 'examen_parametros(id_par_lab, id_serv)'),
			'rangosParametros' => array(self::HAS_MANY, 'RangosParametro', 'id_par_lab'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_par_lab' => 'Id Par Lab',
			'nombre_par_lab' => 'Nombre',
			'unidad_par_lab' => 'Unidad',
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

		$criteria->compare('id_par_lab',$this->id_par_lab);
		$criteria->compare('nombre_par_lab',$this->nombre_par_lab,true);
		$criteria->compare('unidad_par_lab',$this->unidad_par_lab,true);
		$criteria->compare('estado_par_lab',$this->estado_par_lab);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ParametroLaboratorio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeValidate(){
        if($this->isNewRecord){
            $this->estado_par_lab=1;
        }
        return parent::beforeValidate();
    }
}
