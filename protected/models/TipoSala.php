<?php

/**
 * This is the model class for table "tipo_sala".
 *
 * The followings are the available columns in table 'tipo_sala':
 * @property integer $id_tipo_sala
 * @property string $nombre_tipo_sala
 * @property string $descripcion_tipo_sala
 *
 * The followings are the available model relations:
 * @property Sala[] $salas
 * @property Servicio $idTipoSala
 */
class TipoSala extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_sala';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_tipo_sala', 'required'),
			array('id_tipo_sala', 'numerical', 'integerOnly'=>true),
			array('nombre_tipo_sala, descripcion_tipo_sala', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tipo_sala, nombre_tipo_sala, descripcion_tipo_sala', 'safe', 'on'=>'search'),
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
			'salas' => array(self::HAS_MANY, 'Sala', 'id_tipo_sala'),
			'idTipoSala' => array(self::BELONGS_TO, 'Servicio', 'id_tipo_sala'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipo_sala' => 'Codigo',
			'nombre_tipo_sala' => 'Nombre Tipo Sala',
			'descripcion_tipo_sala' => 'Descripcion',
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

		$criteria->compare('id_tipo_sala',$this->id_tipo_sala);
		$criteria->compare('nombre_tipo_sala',$this->nombre_tipo_sala,true);
		$criteria->compare('descripcion_tipo_sala',$this->descripcion_tipo_sala,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoSala the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave(){
        if($this->isNewRecord){
            $servicio=new Servicio;
            $servicio->save();
            $this->id_tipo_sala=$servicio->id_servicio;
        }
        return parent::beforeSave();
    }
}
