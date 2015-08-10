<?php

/**
 * This is the model class for table "servicio".
 *
 * The followings are the available columns in table 'servicio':
 * @property integer $id_servicio
 * @property string $codigo_serv
 * @property string $nombre_serv
 * @property string $unidad_serv
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property integer $id_insti
 * @property integer $estado_serv
 *
 * The followings are the available model relations:
 * @property ServicioClinico $servicioClinico
 * @property ExamenGabinete $examenGabinete
 * @property ExamenLaboratorio $examenLaboratorio
 * @property Institucion $idInsti
 * @property AtencionMedica $atencionMedica
 * @property TipoSala $tipoSala
 * @property PrecioServicio[] $precioServicios
 */
class Servicio extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'servicio';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fecha_creacion, fecha_actualizacion, id_insti,nombre_serv', 'required'),
            array('id_insti, estado_serv', 'numerical', 'integerOnly'=>true),
            array('codigo_serv', 'length', 'max'=>16),
            array('nombre_serv', 'length', 'max'=>128),
            array('unidad_serv', 'length', 'max'=>64),
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
            'servicioClinico' => array(self::HAS_ONE, 'ServicioClinico', 'id_servicio'),
            'examenGabinete' => array(self::HAS_ONE, 'ExamenGabinete', 'id_servicio'),
            'examenLaboratorio' => array(self::HAS_ONE, 'ExamenLaboratorio', 'id_servicio'),
            'idInsti' => array(self::BELONGS_TO, 'Institucion', 'id_insti'),
            'atencionMedica' => array(self::HAS_ONE, 'AtencionMedica', 'id_servicio'),
            'tipoSala' => array(self::HAS_ONE, 'TipoSala', 'id_tipo_sala'),
            'precioServicio' => array(self::HAS_ONE, 'PrecioServicio', 'id_servicio','condition'=>'fecha_fin is null'),
            'precioServicio1' => array(self::HAS_ONE, 'PrecioServicio', 'id_servicio','condition'=>'fecha_fin is not null'),
            'examenLaboratorios' => array(self::HAS_MANY, 'ExamenLaboratorio', 'id_cat_lab'),
            'detalleSolicitudServicios' => array(self::HAS_MANY, 'DetalleSolicitudServicio', 'id_servicio'),
            'parametrosLaboratorio' => array(self::MANY_MANY, 'ParametroLaboratorio', 'examen_parametros(id_serv,id_par_lab)'),
        );
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id_servicio' => 'Id Servicio',
            'codigo_serv' => 'Codigo',
            'nombre_serv' => 'Nombre',
            'unidad_serv' => 'Unidad',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'id_insti' => 'Institucion',
            'estado_serv'=>'Estado Servicio',
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

        $criteria->compare('id_servicio',$this->id_servicio);
        $criteria->compare('codigo_serv',$this->codigo_serv,true);
        $criteria->compare('nombre_serv',$this->nombre_serv,true);
        $criteria->compare('unidad_serv',$this->unidad_serv,true);
        $criteria->compare('fecha_creacion',$this->fecha_creacion,true);
        $criteria->compare('fecha_actualizacion',$this->fecha_actualizacion,true);
        $criteria->compare('id_insti',$this->id_insti);
        $criteria->compare('estado_serv',$this->estado_serv);


        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Servicio the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function getInstitucion()
    {
        return CHtml::listData(Institucion::model()->findAll(),'id_insti','nombre');
    }

    protected function beforeValidate(){
        $this->fecha_actualizacion=date('d-m-Y H:i:s');
        if($this->isNewRecord){
            $this->fecha_creacion=date('d-m-Y H:i:s');
            $this->estado_serv=1;
        }
        if($this->id_insti==null||$this->id_insti=='')
            $this->id_insti=1;
        return parent::beforeValidate();
    }
}
