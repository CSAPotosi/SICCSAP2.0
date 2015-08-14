<?php

/**
 * This is the model class for table "receta".
 *
 * The followings are the available columns in table 'receta':
 * @property integer $id_trat
 * @property integer $cant_solicitada
 * @property integer $cant_dosis
 * @property string $via
 * @property string $pauta
 * @property integer $id_med
 */
class Receta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'receta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cant_solicitada, cant_dosis, via, id_med', 'required'),
			array('id_trat, cant_solicitada, cant_dosis, id_med', 'numerical', 'integerOnly'=>true),
            array('cant_solicitada,cant_dosis','numerical','min'=>1),
			array('via', 'length', 'max'=>30),
			array('pauta', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_trat, cant_solicitada, cant_dosis, via, pauta, id_med', 'safe', 'on'=>'search'),
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
            'tratamiento'=>array(self::BELONGS_TO,'Tratamiento','id_trat'),
            'medicamento'=>array(self::BELONGS_TO,'Medicamento','id_med'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_trat' => 'Id Trat',
			'cant_solicitada' => 'Cantidad',
			'cant_dosis' => 'Dosis',
			'via' => 'Via',
			'pauta' => 'Pauta',
			'id_med' => 'Medicamento',
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

		$criteria->compare('id_trat',$this->id_trat);
		$criteria->compare('cant_solicitada',$this->cant_solicitada);
		$criteria->compare('cant_dosis',$this->cant_dosis);
		$criteria->compare('via',$this->via,true);
		$criteria->compare('pauta',$this->pauta,true);
		$criteria->compare('id_med',$this->id_med);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Receta the static model class
	 */
    public function getOptionVia()
    {
        return [
            'ORAL' => 'ORAL',
            'RECTAL'=>'RECTAL',
            'SUBLINGUAL' => 'SUBLINGUAL',
            'GASTROENTERICA' => 'GASTROENTERICA',
            'INTRAVENOSA'=>'INTRAVENOSA',
            'INTRAARTERIAL'=>'INTRAARTERIAL',
            'INTRAMUSCULAR'=>'INTRAMUSCULAR',
            'SUBCUTANEA'=>'SUBCUTANEA',
            'RESPIRATORIA'=>'RESPIRATORIA',
            'OFTALMICA'=>'OFTALMICA',
            'OTICA'=>'OTICA',
            'TRANSDERMICA'=>'TRANSDERMICA'
        ];
    }

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
