<?php
/* @var $this SiteController */

$this->pageTitle="Pagina Principal";
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
                <form  role="search">
                    <div class="form-group has-primary">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">
                                    CSA - <span class="caret"></span>
                                </button>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">CSA -</a></li>
                                    <li><a href="#">NOMBRE:</a></li>
                                    <li><a href="#">DNI</a></li>
                                </ul>
                            </div>
                            <input type="text" class="form-control col-md-10" placeholder="Escribe para empezar a buscar">
                            <span class="input-group-btn">
                                <button class="btn btn-flat btn-primary" type="submit">Buscar</button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <a class="btn btn-block btn-social btn-bitbucket">
                            <i class="fa fa-bitbucket"></i>Agregar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class='col-sm-6'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <a href="http://eonasdan.github.io/bootstrap-datetimepicker/#using-locales">PAgina de datetimepicker</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/elements/js/moment.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/elements/js/bootstrap-datetimepicker.min.js',CClientScript::POS_END);

Yii::app()->clientScript->registerScript('datetime','
    $(function(){
        $("#datetimepicker1").datetimepicker({
        	locale:"es",
        	defaultDate:"04/20/2015",
        	format:"DD-MM-YYYY HH:mm A",
        	maxDate:"04/24/2015"
        });
    });
',CClientScript::POS_END);
?>

