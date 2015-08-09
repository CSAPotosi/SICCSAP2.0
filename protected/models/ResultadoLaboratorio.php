<?php

/**
 * This is the model class for table "resultado_laboratorio".
 *
 * The followings are the available columns in table 'resultado_laboratorio':
 * @property integer $id_res_lab
 * @property string $diagnostico
 * @property string $observaciones
 * @property string $fecha_examen
 * @property integer $id_historial
 *
 * The followings are the available model relations:
 * @property ParametroLaboratorio[] $parametroLaboratorios
 * @property HistorialPaciente $idHistorial
 */
class ResultadoLaboratorio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'resultado_laboratorio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_detalle_servicio', 'required'),
			array('id_detalle_servicio', 'numerical', 'integerOnly'=>true),
			array('diagnostico, observaciones, fecha_examen', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_res_lab, diagnostico, observaciones, fecha_examen, id_detalle_servicio', 'safe', 'on'=>'search'),
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
			'parametroLaboratorios' => array(self::MANY_MANY, 'ParametroLaboratorio', 'detalle_resultado_laboratorio(id_res_lab, id_parametro)'),
			'detalleSolicitud' => array(self::BELONGS_TO, 'DetalleSolicitudServicio', 'id_detalle_servicio'),
            'detalleResultados'=>array(self::HAS_MANY,'DetalleResultadoLaboratorio','id_res_lab'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_res_lab' => 'Id Res Lab',
			'diagnostico' => 'DIAGNOSTICO PRESUNTIVO',
			'observaciones' => 'OBSERVACIONES',
			'fecha_examen' => 'Fecha Examen',
			'id_detalle_servicio' => 'Id Historial',
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

		$criteria->compare('id_res_lab',$this->id_res_lab);
		$criteria->compare('diagnostico',$this->diagnostico,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('fecha_examen',$this->fecha_examen,true);
		$criteria->compare('id_detalle_servicio',$this->id_detalle_servicio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ResultadoLaboratorio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeValidate(){
        if($this->isNewRecord){
            $this->fecha_examen=date('d/m/Y h:i:s A');
        }
        return parent::beforeValidate();
    }
}
