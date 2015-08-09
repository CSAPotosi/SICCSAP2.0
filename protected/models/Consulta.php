<?php

/**
 * This is the model class for table "consulta".
 *
 * The followings are the available columns in table 'consulta':
 * @property integer $id_consulta
 * @property string $fecha_diagnostico
 * @property string $anamnesis
 * @property string $exploracion
 * @property string $diagnostico
 * @property string $tratamiento
 * @property string $observaciones
 * @property integer $id_historia
 *
 * The followings are the available model relations:
 * @property Receta[] $recetas
 * @property HistorialPaciente $idHistoria
 * @property ConsultaSignosVitales[] $consultaSignosVitales
 * @property Reconsulta[] $reconsultas
 */
class Consulta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consulta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_diagnostico, id_historia, anamnesis', 'required'),
			array('id_historia', 'numerical', 'integerOnly'=>true),
			array('anamnesis, exploracion, diagnostico,  observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_consulta, fecha_diagnostico, anamnesis, exploracion, diagnostico, observaciones, id_historia', 'safe', 'on'=>'search'),
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
			'recetas' => array(self::HAS_MANY, 'Receta', 'id_consulta'),
			'idHistoria' => array(self::BELONGS_TO, 'HistorialPaciente', 'id_historia'),
			'consultaSignosVitales' => array(self::HAS_MANY, 'ConsultaSignosVitales', 'id_consulta'),
			'tratamientos' => array(self::HAS_MANY, 'Tratamiento', 'id_consulta','order'=>'fecha_trat DESC'),
            'itemsCie'=>array(self::HAS_MANY,'ConsultaCie10','id_consulta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_consulta' => 'Id Consulta',
			'fecha_diagnostico' => 'Fecha Diagnostico',
			'anamnesis' => 'Anamnesis',
			'exploracion' => 'Exploracion',
			'diagnostico' => 'Diagnostico',
			'observaciones' => 'Observaciones',
			'id_historia' => 'Id Historia',
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

		$criteria->compare('id_consulta',$this->id_consulta);
		$criteria->compare('fecha_diagnostico',$this->fecha_diagnostico,true);
		$criteria->compare('anamnesis',$this->anamnesis,true);
		$criteria->compare('exploracion',$this->exploracion,true);
		$criteria->compare('diagnostico',$this->diagnostico,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('id_historia',$this->id_historia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Consulta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    protected function beforeValidate(){
        if($this->isNewRecord){
            $this->fecha_diagnostico=date('Y-m-d H:i');
        }
        return parent::beforeValidate();
    }

    public function getDiagnosticoCorto(){
        if(strlen($this->diagnostico)>35)
            return substr($this->diagnostico,0,33)."...";
        return $this->diagnostico;
    }
}
