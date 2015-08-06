<?php

/**
 * This is the model class for table "convenio_servicios".
 *
 * The followings are the available columns in table 'convenio_servicios':
 * @property integer $id_con_ser
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property double $descuento_servicio
 * @property integer $estado
 * @property string $descripcion
 * @property integer $id_convenio_institucion
 * @property integer $id_servicio
 *
 * The followings are the available model relations:
 * @property ConvenioInstitucion $idConvenioInstitucion
 * @property Servicio $idServicio
 */
class ConvenioServicios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convenio_servicios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_creacion, fecha_actualizacion, descuento_servicio, id_convenio_institucion, id_servicio', 'required'),
			array('estado, id_convenio_institucion, id_servicio', 'numerical', 'integerOnly'=>true),
			array('descuento_servicio', 'numerical'),
			array('descripcion', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_con_ser, fecha_creacion, fecha_actualizacion, descuento_servicio, estado, descripcion, id_convenio_institucion, id_servicio', 'safe', 'on'=>'search'),
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
			'idConvenioInstitucion' => array(self::BELONGS_TO, 'ConvenioInstitucion', 'id_convenio_institucion'),
			'idServicio' => array(self::BELONGS_TO, 'Servicio', 'id_servicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_con_ser' => 'Id Con Ser',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_actualizacion' => 'Fecha Actualizacion',
			'descuento_servicio' => 'Descuento Servicio',
			'estado' => 'Estado',
			'descripcion' => 'Descripcion',
			'id_convenio_institucion' => 'Id Convenio Institucion',
			'id_servicio' => 'Id Servicio',
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

		$criteria->compare('id_con_ser',$this->id_con_ser);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_actualizacion',$this->fecha_actualizacion,true);
		$criteria->compare('descuento_servicio',$this->descuento_servicio);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('id_convenio_institucion',$this->id_convenio_institucion);
		$criteria->compare('id_servicio',$this->id_servicio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConvenioServicios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    protected function beforeValidate(){
        $this->fecha_actualizacion=date('d-m-Y H:i:s');
        if($this->isNewRecord){
            $this->fecha_creacion=date('d-m-Y H:i:s');
        }
        return parent::beforeValidate();
    }
}
