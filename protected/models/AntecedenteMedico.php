<?php

/**
 * This is the model class for table "antecedente_medico".
 *
 * The followings are the available columns in table 'antecedente_medico':
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $descripcion_ant
 * @property integer $id_historia
 * @property integer $id_tipo
 *
 * The followings are the available model relations:
 * @property HistorialPaciente $idHistoria
 * @property TipoAntecedente $idTipo
 */
class AntecedenteMedico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'antecedente_medico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' fecha_creacion,id_historia, id_tipo', 'required'),
			array('id_historia, id_tipo', 'numerical', 'integerOnly'=>true),
			array('fecha_modificacion, descripcion_ant', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('fecha_creacion, fecha_modificacion, descripcion_ant, id_historia, id_tipo', 'safe', 'on'=>'search'),
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
			'idHistoria' => array(self::BELONGS_TO, 'HistorialPaciente', 'id_historia'),
			'TipoAntecedente' => array(self::BELONGS_TO, 'TipoAntecedente', 'id_tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_modificacion' => 'Fecha Modificacion',
			'descripcion_ant' => 'Descripcion Ant',
			'id_historia' => 'Id Historia',
			'id_tipo' => 'Id Tipo',
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

		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);
		$criteria->compare('descripcion_ant',$this->descripcion_ant,true);
		$criteria->compare('id_historia',$this->id_historia);
		$criteria->compare('id_tipo',$this->id_tipo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AntecedenteMedico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    protected function beforeValidate(){
        $this->fecha_modificacion=date('d/m/Y h:i:s');
        if($this->IsNewRecord)
        $this->fecha_creacion=date('d/m/Y h:i:s');
        return parent::beforeValidate();
    }
}
