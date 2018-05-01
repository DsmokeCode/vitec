
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema EveCap | Generar Usuario</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <h>Generar Usuario</h>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Ingrese DNI</p>

      <div class="form-group has-feedback">
        <input maxlength="8" type="text" class="form-control solonum" id="txtdni" name="txtdni" placeholder="Ingrese DNI">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
        </div> -->
        <div class="col-xs-4">
					<button type="button" id="btnregusu" class="btn btn-primary pull-rigth"><i class="glyphicon glyphicon-lock"></i> Registrar</button>
				</div>
        <!-- /.col -->
      </div>
    <!--</form>-->
    <div id="mensajeError" style="color: #3c8dbc;"></div>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- model de contraseñar y usuarios de aqui para abajo -->


<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <!-- CABECERA MODAL-->
      <div class="modal-header btn-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bienvenido al Sistema</h4>
      </div>
      <!-- FIN CABECERA MODAL-->
      <div class="modal-body">
        <form class="form-horizontal">
          <!-- parametros ocultos -->
          <input type="hidden" id="umdlpersona">
          <div class="box-body">
            <div class="col-sm-12">
            <div class="form-group">
              <div id="datospersona"></div>
              </div>
            </div>
            <div class="col-sm-12">
            <div class="form-group">
              <label>Porfavor actualiza tus datos...</label>
              <br>
            </div>
            <div class="col-sm-12">
            <div class="form-group">
             <label>Sexo: </label>
               <select class="form-control" id="mdlcbxSexo" name="mdlcbxSexo">
                 <option value="">Elija Su Sexo</option>
                 <option value="M">Masculino</option>
                 <option value="F">Femenino</option>
               </select>
             </div>
         </div>
            <div class="col-sm-12">
            <div class="form-group">
              <label >Email: </label>
                <input type="email" name="modalemail" class="form-control" id="modalemail" placeholder="Ingrese su email" style="width: 100%;">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label date">Fecha de Nacimiento: </label>
                <div class="col-sm-12 input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input maxlength="10" type="text" name="modalfecnacimiento" placeholder="YYYY-MM-DD" class="form-control pull-right" id="modalfecnacimiento" style="width: 100%;">
                </div>
              </div>
            </div>
            <div class="col-sm-12">
            <div class="form-group">
              <label>Celular: </label>
                <input maxlength="9" type="text" name="modaltelefono" class="form-control" id="modaltelefono" placeholder="Ingrese su N° de celular" style="width: 100%;">
              </div>
            </div>
          </div>
          <div id="mensajeErrorCampos" style="color:red;"></div>
        </form>
      </div>
      <!-- BOTONES -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modalcancelar" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn bg-primary" id="modalcrearUsuario">Crear Usuario</button>
      </div>
    </div>
  </div>
</div>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
};
  $(function () {

    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    $('#modalfecnacimiento').datepicker({
      format: "yyyy-mm-dd",
      todayBtn: "linked",
      clearBtn: true,
      language: "es",
      todayHighlight: true,
      autoclose: true
    });
    $('.solonum').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g,'');
    });

  });
  $('#btnregusu').click(function() {
    var dni = $('#txtdni').val();

    // Validar campos
    var mensajeError = "";

    if (dni == "") {mensajeError = mensajeError +"<p>* el Campo de Dni esta Vacio</p>";}
    if (dni.length < 8) {mensajeError = mensajeError +"<p>* el Dni debe tener 8 digitos</p>";}
    if (mensajeError != "") {$('#mensajeError').html(mensajeError);}
    else {
      $.post("<?php echo base_url();?>clogin/nusuario",
      {
        txtdni : dni
      },
  		function (data) {
  			if (data == 1) {
          $('#mensajeError').html("<p>* El DNI ya tiene un usuario registrado </p>");
  				}
  			if(data == 0){
          $('#mensajeError').html("<p>* El DNI No esta registrado en el sistema </p>");
          } else {
          var y = JSON.parse(data);
          $.each(y, function(i, item) {
            $('#umdlpersona').val(item.codper)
            $('#datospersona').html("<label>Hola "+item.nomper+", "+item.appper+" "+item.apmper+"</label>")
            });
          $('#modalUsuario').modal('show');
        }
  			});
    }
    });

    $('#modalcrearUsuario').click(function() {
      var d = $('#umdlpersona').val();
      var x = $('#mdlcbxSexo').val();
      var y = $('#modalemail').val();
      var z = $('#modalfecnacimiento').val();
      var w = $('#modaltelefono').val();

      var cvacio = "";
      var mensajeError = "";

      if (y == "") {cvacio = cvacio+"Email, ";}
      if (z == "") {cvacio = cvacio+"Fecha de Nacimiento, ";}
      if (w == "") {cvacio = cvacio+"Telefono, ";}
      if (x == "") {mensajeError = mensajeError+"Debe seleccionar un sexo ";}
      if (w.length < 8){mensajeError = mensajeError+ "El numero de celular debe tener 9 digitos";}
      if (isEmail(y) == false) {mensajeError = mensajeError+"<p>* Email no Valido escriba ej: username@dominio.com </p>"}
      if(w.length < 9){mensajeError = mensajeError+"<p>* El telefono debe tener 9 caracteres </p>";}
      if(cvacio != ""){mensajeError = "<P>* el campo"+cvacio+mensajeError+"esta vacio</P>";}
      if(mensajeError != ""){$('#mensajeErrorCampos').html(mensajeError);}
      else {
        $.post("<?php echo base_url();?>clogin/modalusuario",
    		{
    		 umdlpersona        :d,
    		 mdlcbxSexo         :x,
    		 modalemail         :y,
    		 modalfecnacimiento :z,
    		 modaltelefono      :w

    		},
    		function (data) {
          var z = JSON.parse(data);
          $.each(z, function(i, item) {
            $('#mensajeError').html("<label>Usuario: "+item.userper+"</label><br><label>Contraseña: "+item.dniper+"</label><br>* porfavor anote su usuario y contraseña");
            });
    			});
          $('#modalcancelar').click();
      }
    });
</script>
</body>
</html>
