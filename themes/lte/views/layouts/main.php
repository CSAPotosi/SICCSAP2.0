<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/elements/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css">
        <!-- Morris chart -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap time Picker -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <!-- Theme style -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/elements/css/style.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
	</head>
    <body class="skin-blue fixed">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo Yii::app()->homeUrl; ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <?php echo CHtml::encode(Yii::app()->name); ?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/elements/img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/elements/img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/elements/img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/elements/img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/elements/img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo Yii::app()->user->getState('nombre'); ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/elements/img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo 'Hola '.Yii::app()->user->getState('nombre'); ?>
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <?php echo CHtml::link("Salir",Yii::app()->createUrl('Site/logout'),array('class'=>'btn btn-default btn-flag')); ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo Yii::app()->theme->baseUrl;?>/elements/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola <?php echo Yii::app()->user->getState('nombre'); ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="C.I. o Nombre del Paciente"/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="#">
                                <span class="glyphicon glyphicon-folder-open"></span>
                                <span>Historial Medico</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Listar Historias",Yii::app()->createUrl('HistorialPaciente')) ?></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-clock-o"></i>
                                <span>Administrar Horarios</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Listar Horarios",Yii::app()->createUrl('Horario/index')) ?></li>
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Nuevo Horario",Yii::app()->createUrl('Horario/create')) ?></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-clock-o"></i>
                                <span>Administrar Asistencia</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Registrar Asistencia",Yii::app()->createUrl('Registro/registrar')) ?></li>
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Importar Asistencia",Yii::app()->createUrl('import/csv')) ?></li>
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Reportes",Yii::app()->createUrl('Registro/reporte')) ?></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Personas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Registrar Persona",Yii::app()->createUrl('Persona/create')) ?></li>
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Listar persona",Yii::app()->createUrl('Persona')) ?></li>
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Crear Medico",Yii::app()->createUrl('Medico/create')) ?></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>unidad</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Registrar Unidad",Yii::app()->createUrl('Unidad/create')) ?></li>
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Ver unidades",Yii::app()->createUrl('Unidad')) ?></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Horarios</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Registrar Horarios",Yii::app()->createUrl('Horario/create')) ?></li>
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Ver horarios",Yii::app()->createUrl('Horario')) ?></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Consulta externa</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Consulta Externa",Yii::app()->createUrl('DiagnosticoConsulta/create')) ?></li>
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Receta",Yii::app()->createUrl('Receta/create')) ?></li>
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Reconsulta",Yii::app()->createUrl('Reconsulta/create')) ?></li>

                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wheelchair"></i>
                                <span>Salas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Listar Salas",Yii::app()->createUrl('Sala')) ?></li>
                                <li><?php echo CHtml::link("<i class='fa fa-angle-double-right'></i> Crear nuevo tipo",Yii::app()->createUrl('Sala/create')) ?></li>

                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $this->pageTitle; ?>
                    </h1>
					<?php if(isset($this->breadcrumbs)):?>

						<?php $this->widget('zii.widgets.CBreadcrumbs', array(
							'links'=>$this->breadcrumbs,
							'htmlOptions'=>array('class'=>'breadcrumb'),
						)); ?><!-- breadcrumbs -->
					<?php endif?>

                </section>
				<?php echo $content; ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/jquery-2.1.1.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/jquery-ui.min.js"></script>
        <!-- InputMask -->
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

        <!-- Sparkline -->
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/AdminLTE/app.js" type="text/javascript"></script>


        <!-- Para el dashboard y las graficas-->

        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/raphael-min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/morris/morris.min.js" type="text/javascript"></script>


        <!-- bootstrap time picker -->
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/elements/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        
        <!-- Page script -->
        <script type="text/javascript">
            $(function() {
                //Mascara
                $("[data-mask]").inputmask();
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
            $('#Persona_dni').keyup(function(){
                $('#Persona_nit').val($(this).val())
            });

            $(document).ready(function(){

                });
            });
        </script>
    </body>
</html>
