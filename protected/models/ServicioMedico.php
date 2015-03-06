<?php

/**
 * This is the model class for table "servicio_medico".
 *
 * The followings are the available columns in table 'servicio_medico':
 * @property integer $id_servicio_medico
 * @property string $nombre_servicio
 * @property string $descripcion_servicio
 * @property integer $id_categoria_serv
 *
 * The followings are the available model relations:
 * @property Servicio $idServicioMedico
 * @property CategoriaServicio $idCategoriaServ
 */
class ServicioMedico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicio_medico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_servicio, id_categoria_serv', 'required'),
			array('id_servicio_medico, id_categoria_serv', 'numerical', 'integerOnly'=>true),
			array('nombre_servicio, descripcion_servicio', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_servicio_medico, nombre_servicio, descripcion_servicio, id_categoria_serv', 'safe', 'on'=>'search'),
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
			'idServicioMedico' => array(self::BELONGS_TO, 'Servicio', 'id_servicio_medico'),
			'idCategoriaServ' => array(self::BELONGS_TO, 'CategoriaServicio', 'id_categoria_serv'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_servicio_medico' => 'Codigo',
			'nombre_servicio' => 'Nombre',
			'descripcion_servicio' => 'Descripcion',
			'id_categoria_serv' => 'Id Categoria Serv',
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

		$criteria->compare('id_servicio_medico',$this->id_servicio_medico);
		$criteria->compare('nombre_servicio',$this->nombre_servicio,true);
		$criteria->compare('descripcion_servicio',$this->descripcion_servicio,true);
		$criteria->compare('id_categoria_serv',$this->id_categoria_serv);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ServicioMedico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave(){
        if($this->isNewRecord){
            $servicio=new Servicio;
            $servicio->save();
            $this->id_servicio_medico =$servicio->id_servicio;
        }
        return parent::beforeSave();
    }
}
