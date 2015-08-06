<?php

/**
 * This is the model class for table "evolucion".
 *
 * The followings are the available columns in table 'evolucion':
 * @property integer $id_evo
 * @property string $fecha_evo
 * @property string $exploracion_evo
 * @property string $estado_paciente
 * @property string $recomendaciones_evo
 * @property integer $id_trat
 *
 * The followings are the available model relations:
 * @property Tratamiento $idTrat
 */
class Evolucion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evolucion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estado_paciente, id_trat', 'required'),
			array('id_trat', 'numerical', 'integerOnly'=>true),
			array('fecha_evo, exploracion_evo, recomendaciones_evo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_evo, fecha_evo, exploracion_evo, estado_paciente, recomendaciones_evo, id_trat', 'safe', 'on'=>'search'),
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
			'idTrat' => array(self::BELONGS_TO, 'Tratamiento', 'id_trat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_evo' => 'Id Evo',
			'fecha_evo' => 'Fecha Evo',
			'exploracion_evo' => 'Exploracion',
			'estado_paciente' => 'Estado del paciente',
			'recomendaciones_evo' => 'Recomendaciones',
			'id_trat' => 'Id Trat',
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

		$criteria->compare('id_evo',$this->id_evo);
		$criteria->compare('fecha_evo',$this->fecha_evo,true);
		$criteria->compare('exploracion_evo',$this->exploracion_evo,true);
		$criteria->compare('estado_paciente',$this->estado_paciente,true);
		$criteria->compare('recomendaciones_evo',$this->recomendaciones_evo,true);
		$criteria->compare('id_trat',$this->id_trat);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evolucion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    public function beforeValidate(){
        if($this->isNewRecord){
            $this->fecha_evo=date('d-m-Y H:i:s');
        }
        return parent::beforeValidate();
    }
}
