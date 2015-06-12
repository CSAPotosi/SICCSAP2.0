<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SICCSAP | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

        <!-- Ionicons -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/font-ionicons/css/ionicons.min.css" rel="stylesheet" />
        <!-- Theme style -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/lte2theme/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. -->
        <link href="<?php echo Yii::app()->theme->baseUrl;?>/resources/lte2theme/css/skins/skin-red.min.css" rel="stylesheet" type="text/css" />

        <!-- Datetimepicker-->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css"/>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/html5shiv/html5shiv.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/html5shiv/html5shiv-printshiv.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/respond/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>SICCSAP</b> 3.0</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <?php echo $content;?>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/resources/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>