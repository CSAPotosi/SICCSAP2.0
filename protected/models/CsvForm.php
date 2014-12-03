<?php
class CsvForm extends CFormModel {
    public $archivo;
    public function rules()
    {
        return array(
            array('archivo', 'file', 'allowEmpty'=>false,
                'types'=>'csv,txt,dat'),
        );
    }
    public function attributeLabels(){
        return array(
            "archivo"=>"Archivo Csv",
        );
    }
}