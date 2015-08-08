<?php

/**
 * This is the model class for table "seguro_convenio".
 *
 * The followings are the available columns in table 'seguro_convenio':
 * @property integer $id_seg_con
 * @property integer $id_convenio_institucion
 * @property integer $id_paciente
 * @property string $fecha_inicio
 * @property string $fecha_actualizacion
 * @property string $tipo_asegurado
 * @property integer $id_paciente_titular
 * @property boolean $estado
 *
 * The followings are the available model relations:
 * @property Paciente $idPaciente
 * @property ConvenioInstitucion $idConvenioInstitucion
 * @property Paciente $idPacienteTitular
 */
class SeguroConvenio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'seguro_convenio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_convenio_institucion, id_paciente, fecha_inicio', 'required'),
			array('id_convenio_institucion, id_paciente, id_paciente_titular', 'numerical', 'integerOnly'=>true),
			array('tipo_asegurado', 'length', 'max'=>16),
			array('fecha_actualizacion, estado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_seg_con, id_convenio_institucion, id_paciente, fecha_inicio, fecha_actualizacion, tipo_asegurado, id_paciente_titular, estado', 'safe', 'on'=>'search'),
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
            'PacienteAsegurado' => array(self::BELONGS_TO, 'Paciente', 'id_paciente'),
            'ConvenioInstitucional' => array(self::BELONGS_TO, 'ConvenioInstitucion', 'id_convenio_institucion'),
            'PacienteTitular' => array(self::BELONGS_TO, 'Paciente', 'id_paciente_titular'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_seg_con' => 'Id Seg Con',
			'id_convenio_institucion' => 'Id Convenio Institucion',
			'id_paciente' => 'Id Paciente',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_actualizacion' => 'Fecha Actualizacion',
			'tipo_asegurado' => 'Tipo Asegurado',
			'id_paciente_titular' => 'Id Paciente Titular',
			'estado' => 'Estado',
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

		$criteria->compare('id_seg_con',$this->id_seg_con);
		$criteria->compare('id_convenio_institucion',$this->id_convenio_institucion);
		$criteria->compare('id_paciente',$this->id_paciente);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_actualizacion',$this->fecha_actualizacion,true);
		$criteria->compare('tipo_asegurado',$this->tipo_asegurado,true);
		$criteria->compare('id_paciente_titular',$this->id_paciente_titular);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SeguroConvenio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    protected function beforeValidate(){
        if(!$this->isNewRecord)
            $this->fecha_actualizacion=$this->fecha_inicio;
        return parent::beforeValidate();
    }
}
