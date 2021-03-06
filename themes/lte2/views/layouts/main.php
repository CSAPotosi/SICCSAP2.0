<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SICCSAP 3.0</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Ionicons -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/font-ionicons/css/ionicons.min.css" rel="stylesheet" />
    <!-- Datetimepicker-->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css"/>

    <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/lte2theme/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/lte2theme/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme icheck style -->
    <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/lte2theme/css/Mystyle.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/html5shiv/html5shiv.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/html5shiv/html5shiv-printshiv.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/respond/respond.min.js"></script>
    <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue fixed sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo CHtml::normalizeUrl(['/']);?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>C</b>SA</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>SICCSAP</b> v.</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image
                                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>-->
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li><!-- end message -->
                                </ul><!-- /.menu -->
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li><!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li><!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->

                        <ul class="dropdown-menu" id="listardetalleservicios">
                            <div id="Layer1" style="height:350px;  overflow: scroll;">
                                <?php $this->renderPartial('/solicitudServicios/listardetallesolicitud')?>
                            </div>
                            <li class="footer"><?php echo CHtml::link("Ver Todo",Yii::app()->createUrl('SolicitudServicios/listasolicitudser'),array()); ?></li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?php echo Yii::app()->baseUrl.'/fotografias/'.Yii::app()->user->getState('foto');?>" class="user-image" alt="Imagen de usuario"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo Yii::app()->user->getState('nombre'); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />-->
                                <p>
                                    <?php echo Yii::app()->user->getState('nombre'); ?>
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <?php echo CHtml::link("Salir",array("site/logout"),array("class"=>"btn btn-default btn-flat"));?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-file-text-o"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo Yii::app()->baseUrl.'/fotografias/'.Yii::app()->user->getState('foto');?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo Yii::app()->user->getState('nombre'); ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">OPCIONES</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="<?php echo CHtml::normalizeUrl(['/']);?>" ><i class="fa fa-home"></i> <span>Inicio</span></a></li>
                <?php if(Yii::app()->user->checkAccess('ADMIN')):?>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-fw fa-user'></i> <span>Nuevo Paciente</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?php echo CHtml::normalizeUrl(['/persona/index'])?>" ><span>Pacientes</span></a></li>
                            <li class="active"><a href="<?php echo CHtml::normalizeUrl(['/historialpaciente/PacienteEmergencia'])?>" ></i><span>Paciente de Emergencia</span></a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if(Yii::app()->user->checkAccess('ADMIN')):?>
                    <li class="active"><a href="<?php echo CHtml::normalizeUrl(['/persona/Medicos'])?>" ><i class="fa fa-fw fa-stethoscope"></i> <span>Medicos</span></a></li>
                <?php endif; ?>
                <?php if(Yii::app()->user->checkAccess('ADMIN')):?>
                    <li class="active"><a href="<?php echo CHtml::normalizeUrl(['/persona/Empleado'])?>" ><i class="fa fa-suitcase"></i> <span>Empleado</span></a></li>
                <?php endif; ?>
                <li class="active"><a href="<?php echo CHtml::normalizeUrl(['/servicio'])?>" ><i class="fa fa-fw fa-plus-square"></i> <span>Servicios</span></a></li>
                <li class="active"><a href="<?php echo CHtml::normalizeUrl(['/agenda/atencionesmedicas'])?>" ><i class="fa fa-fw fa-medkit"></i><span>Atenciones medicas</span></a></li>

                <!--<li class="active"><a href="<?php echo CHtml::normalizeUrl(['/ConvenioInstitucion/Index'])?>" ><i class="fa fa-fw fa-shield"></i><span>Seguros Clinicos</span></a></li>
                    <li class="active"><a href="<?php echo CHtml::normalizeUrl(['/ConvenioInstitucion/Principal_Institucion'])?>" ><i class="fa fa-fw fa-building-o"></i><span>Institucion</span></a></li>-->
                <?php if(Yii::app()->user->checkAccess('ADMIN')):?>

                <?php endif; ?>
                <?php if(Yii::app()->user->checkAccess('ADMIN')):?>

                <?php endif; ?>
                <li class="treeview">
                    <a href="#"><i class='fa fa-fw fa-users'></i> <span>RR.HH</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="<?php echo CHtml::normalizeUrl(['/Unidad/index'])?>" ><span>Unidad</span></a></li>
                        <li class="active"><a href="<?php echo CHtml::normalizeUrl(['/Horario/index'])?>" ><span>Horarios</span></a></li>
                        <li class="active"><a href="<?php echo CHtml::normalizeUrl(['/Horario/IndexTurno'])?>" ><span>Turnos</span></a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-fw fa-shield'></i> <span>Seguros clinicos</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo CHtml::normalizeUrl(['/ConvenioInstitucion/Principal_Institucion'])?>" ><span>Institucion</span></a></li>
                        <li><a href="<?php echo CHtml::normalizeUrl(['/ConvenioInstitucion/Index'])?>" ><span>Convenios</span></a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-fw fa-shield'></i> <span>Agenda Medica</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo CHtml::normalizeUrl(['/Agenda/RegistrarCitas'])?>" ><span>Ver Citas</span></a></li>
                        <li><a href="<?php echo CHtml::normalizeUrl([''])?>" ><span>Sala de espera</span></a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-link fa-heartbeat'></i> <span>Quirofano</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo CHtml::normalizeUrl(['/cirugia/agenda'])?>">Agenda</a></li>
                        <li><a href="<?php echo CHtml::normalizeUrl(['/quirofano/index'])?>">Administracion de Quirofanos</a></li>
                        <li><a href="<?php echo CHtml::normalizeUrl(['/quirofano/create'])?>">Nuevo de Quirofanos</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-link fa-bed'></i> <span>Salas</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo CHtml::normalizeUrl(['/sala/index'])?>">Administracion de Salas</a></li>
                        <li><a href="<?php echo CHtml::normalizeUrl(['/sala/listsala'])?>">Control de Salas</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class='ion ion-beaker'></i> <span>Laboratorio</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo CHtml::normalizeUrl(['/solicitudservicios/listasolicitudser'])?>">Solicitudes</a></li>
                        <li><a href="<?php echo CHtml::normalizeUrl(['/laboratorio/index'])?>">Administracion de Parametros</a></li>
                        <li><a href="<?php echo CHtml::normalizeUrl(['/servicio/crearlab'])?>">Administracion de examenes</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class='fa fa-user-secret'></i> <span>Usuario</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo CHtml::normalizeUrl(['/usuario/index'])?>">Listar Usuarios</a></li>
                        <li><a href="<?php echo CHtml::normalizeUrl(['/usuario/create'])?>">Crear Usuarios</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class='ion ion-beaker'></i> <span>Rol</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo CHtml::normalizeUrl(['/rol/assign'])?>">Asignar Roles</a></li>
                        <li><a href="<?php echo CHtml::normalizeUrl(['/rol/create'])?>">Crear Roles</a></li>
                        <li><a href="<?php echo CHtml::normalizeUrl(['/rol/addchild'])?>">Asignar SubRoles</a></li>
                        <li><a href="<?php echo CHtml::normalizeUrl(['/rol/index'])?>">Listar Roles</a></li>
                    </ul>
                </li>


                <!--

                <li><a href="#"><i class='fa fa-link'></i> <span>Another Link</span></a></li>
                <li class="treeview">
                    <a href="#"><i class='fa fa-link'></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#">Link in level 2</a></li>
                        <li><a href="#">Link in level 2</a></li>
                    </ul>
                </li>

                -->

            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $this->pageTitle; ?>
            </h1>
            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'htmlOptions'=>array('class'=>'breadcrumb pull-rigth'),
                )); ?>
            <?php endif; ?>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php echo $content; ?>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    <section class="main-footer">
        <!-- Default to the left -->
        <strong>&copy; 2015 <a href="#">Clinica Santa Ana S.R.L.</a>.</strong> All rights reserved.
    </section>


    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-file-text-o"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Salas</h3>
                <ul class='control-sidebar-menu'>
                    <li>
                        <a href='<?php echo CHtml::normalizeUrl(['reportes/censoSalas']);?>' target="_blank">
                            <i class="menu-icon fa fa-bed bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Censo de salas</h4>
                                <p><?php echo date('d-m-Y');?></p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Servicios</h3>
                <ul class='control-sidebar-menu'>
                    <li class="treeview">
                        <a href='<?php echo CHtml::normalizeUrl(['reportes/ReporteServiciosLaboratorio']);?>' target="_blank">
                            <i class="menu-icon fa fa-fw fa-flask bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Servicos de Laboratorio</h4>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="menu-icon fa fa-fw fa-gratipay bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Servicios de Gabinete</h4>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href='<?php echo CHtml::normalizeUrl(['reportes/ReporteServiciootros']);?>' target="_blank">
                            <i class="menu-icon fa fa-fw fa-h-square bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Servicios de Clinicos</h4>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Pacientes</h3>
                <ul class='control-sidebar-menu'>
                    <li>
                        <a href='<?php echo CHtml::normalizeUrl(['reportes/ReportePacientesRegistrados']);?>' target="_blank">
                            <i class="menu-icon fa fa-fw fa-wheelchair bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Pacientes Santa Ana</h4>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class='control-sidebar-menu'>
                    <li>
                        <a href='<?php echo CHtml::normalizeUrl(['reportes/ReporteSegurosPacienteServicio']);?>' target="_blank">
                            <i class="menu-icon fa fa-fw fa-leanpub bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Pacientes Asegurados</h4>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class='control-sidebar-bg'></div>
</div><!-- ./wrapper -->



<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/jQueryUI/jquery-ui-1.10.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<!-- SlimScroll 1.3.0 -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/iCheck/icheck.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/lte2theme/js/app.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/lte2theme/js/pages/dashboard.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/lte2theme/js/MyStyle.js" type="text/javascript"></script>
<!-- bootstrap datetime picker -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/moment/moment-with-locales.min.js" type="text/javascript"></script>
<!-- bootstrap datetime picker -->
<!-- bootstrap datetime picker -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/moment/moment-with-locales.min.js" type="text/javascript"></script>
<!-- bootstrap datetime picker -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/fullcalendar/lang-all.js" type="text/javascript"></script>



</body>
</html>