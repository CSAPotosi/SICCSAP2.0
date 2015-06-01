<?php

/**
 * This is the model class for table "detalle_solicitud_servicio".
 *
 * The followings are the available columns in table 'detalle_solicitud_servicio':
 * @property integer $id_solicitud
 * @property integer $id_servicio
 * @property double $cantidad
 * @property double $precio_servicio
 *
 * The followings are the available model relations:
 * @property SolicitudServicios $idSolicitud
 * @property Servicio $idServicio
 */
class DetalleSolicitudServicio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalle_solicitud_servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_solicitud, id_servicio, cantidad, precio_servicio', 'required'),
			array('id_solicitud, id_servicio', 'numerical', 'integerOnly'=>true),
			array('cantidad, precio_servicio', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_solicitud, id_servicio, cantidad, precio_servicio', 'safe', 'on'=>'search'),
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
			'idSolicitud' => array(self::BELONGS_TO, 'SolicitudServicios', 'id_solicitud'),
			'idServicio' => array(self::BELONGS_TO, 'Servicio', 'id_servicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_solicitud' => 'Id Solicitud',
			'id_servicio' => 'Id Servicio',
			'cantidad' => 'Cantidad',
			'precio_servicio' => 'Precio Servicio',
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

		$criteria->compare('id_solicitud',$this->id_solicitud);
		$criteria->compare('id_servicio',$this->id_servicio);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('precio_servicio',$this->precio_servicio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DetalleSolicitudServicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
