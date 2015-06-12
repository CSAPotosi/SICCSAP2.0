<p class="login-box-msg">Ingrese sus datos para iniciar sesion.</p>

<?php echo CHtml::beginForm();?>
    <div class="form-group has-feedback">
        <?php echo CHtml::activeTextField($model,'username',['class'=>'form-control','placeholder'=>'Usuario']);?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php echo CHtml::error($model,'username',['class'=>'label label-danger']);?>
    </div>
    <div class="form-group has-feedback">
        <?php echo CHtml::activePasswordField($model,'password',['class'=>'form-control','placeholder'=>'Password']);?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo CHtml::error($model,'password',['class'=>'label label-danger']);?>
    </div>
    <div class="row">
        <div class="col-xs-offset-7 col-xs-5">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesion</button>
        </div><!-- /.col -->
    </div>
<?php echo CHtml::endForm();?>

