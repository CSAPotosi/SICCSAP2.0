<?php

/**
 * This is the model class for table "solicitud_servicios".
 *
 * The followings are the available columns in table 'solicitud_servicios':
 * @property integer $id_solicitud
 * @property integer $id_historial
 * @property string $estado
 * @property string $observaciones
 * @property double $tipo
 * @property double $total
 *
 * The followings are the available model relations:
 * @property DetalleSolicitudServicio[] $detalleSolicitudServicios
 * @property HistorialPaciente $idHistorial
 */
class SolicitudServicios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitud_servicios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_historial', 'required'),
			array('id_historial', 'numerical', 'integerOnly'=>true),
			array('total', 'numerical'),
			array('estado', 'length', 'max'=>32),
			array('observaciones', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_solicitud, id_historial, estado, observaciones, tipo, total', 'safe', 'on'=>'search'),
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
            'detalleSolicitudServicios' => array(self::HAS_MANY, 'DetalleSolicitudServicio', 'id_solicitud'),
            'idHistorial' => array(self::BELONGS_TO, 'HistorialPaciente', 'id_historial'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_solicitud' => 'Id Solicitud',
			'id_historial' => 'Id Historial',
			'estado' => 'Estado',
			'observaciones' => 'Observaciones',
			'tipo' => 'Tipo',
			'total' => 'Total',
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
		$criteria->compare('id_historial',$this->id_historial);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('descuento',$this->descuento);
		$criteria->compare('total',$this->total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SolicitudServicios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
