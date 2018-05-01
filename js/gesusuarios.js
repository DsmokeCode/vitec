

$.post(baseurl + "cgesusuarios/getPerfiles", {
		estperf: 1,
	},
	function(data) {
		var c = JSON.parse(data);
		$.each(c, function(i, item) {
			$('#mdlcbxPerfil').append('<option value="' + item.codperf + '">' + item.desperf + '</option>');
			$('#emdlcbxPerfil').append('<option value="' + item.codperf + '">' + item.desperf + '</option>');
		});
	});

	function isEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	};

	$(function() {
		$('#mdlfechaNacimiento').datepicker({
			format: "yyyy-mm-dd",
			todayBtn: "linked",
			clearBtn: true,
			language: "es",
			todayHighlight: true,
			autoclose: true
		});
		$('#emdlfechaNacimiento').datepicker({
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
		$('.sololet').on('input', function () {
        this.value = this.value.replace(/[^ a-zA-Záéíóúüñ]+/ig,"");
		});
		$('.solofec').on('input', function () {
        this.value = this.value.replace(/[^0-9-]+/ig,"");
		});

	});

	$('#tblgetUsuarios').DataTable({

		"lengthMenu": [[5, 10, 15, 20, ],[5, 10, 15, 20]],
		'paging': true,
		'info': true,
		'filter': true,
		'stateSave': true,

		'processing' : true,
		'serverSide' : true,
		'ajax': {
			"url": baseurl + "cgesusuarios/getUsuarios/",
			"type": "POST",
		},
		'columns': [
			{data: "rownum",'sClass':'dt-body-center'},
			{data: "dniper"},
			{data: "nomper"},
			{data: "appper"},
			{data: "apmper"},
			{data: "sexo"},
			{data: "desperf"},
			{data: "telper"},
			{data: "email"},
			{data: "fnacper"},
			{"orderable": true,
				render: function(data, type, row) {
					return '<span class="pull-right">' +
						'<div class="dropdown">' +
						'  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
						'    Acciones' +
						'  <span class="caret"></span>' +
						'  </button>' +
						'    <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">' +
						'    <li><a href="#" title="Editar informacion" data-toggle="modal" data-target="#modalEditarUsuario" '+
						'    onClick="selPersonas(\'' + row.codper + '\',\'' + row.dniper + '\',\'' + row.nomper + '\',\'' + row.appper + '\',\'' + row.apmper +
						'\',\'' + row.telper + '\',\''+ row.email + '\');"><i class="glyphicon glyphicon-edit" style="color:#006699"></i> Editar</a></li>'+
						'    <li><a href="#" title="Usuario formato" data-toggle="modal" data-target="#modalUsuarioClave" onClick="selUser(\'' + row.codusu +
						'\',\'' + row.codper + '\',\'' + row.userper + '\',\'' + row.nomper + '\',\'' + row.appper + '\');"><i class="glyphicon glyphicon-lock" style="color:#7c7c7c"></i> Crear Usuario </a></li>' +
						'    <li><a href="#" title="Eliminar formato" data-toggle="modal" data-target="#modalEliminarUsuario" onClick="selEliminar(\'' + row.codper + '\',\'' + row.nomper+ '\',\'' + row.appper+ '\');"><i class="glyphicon glyphicon-remove" style="color:#c63218"></i> Eliminar </a></li>' +
						'    </ul>' +
						'</div>' +
						'</span>';
				}
			}
		], "order": [
			[0, "asc"]
		],
	});

	$('#mbtnRegistrar').click(function () {
	  var z = $('#mdltxtdni').val();
		var a = $('#mdltxtNombre').val();
		var b = $('#mdltxtApPaterno').val();
		var c = $('#mdltxtApMaterno').val();
		var d = $('#mdlcbxSexo').val();
		var e = $('#mdlcbxPerfil').val();
		var f = $('#mdlfechaNacimiento').val();
		var g = $('#mdlTelefono').val();
		var h = $('#mdlEmail').val();

		//verificar parametros vacios
		var cvacio = "";
		var cbxvacio = "";
		var mensajeError = "";
		if (z == "") {cvacio = cvacio+"Dni, ";}
		if (a == "") {cvacio = cvacio+"Nombre, ";}
		if (b == "") {cvacio = cvacio+"Apellido Paterno, ";}
		if (c == "") {cvacio = cvacio+"Apellido Materno, ";}
		if (f == "") {cvacio = cvacio+"fecha de Nacimiento, ";}
		if (g == "") {cvacio = cvacio+"Telefono, ";}
		if (h == "") {cvacio = cvacio+"Email, ";}
		if (d == "") {cbxvacio = cbxvacio+"Un Sexo, ";}
		if (e == "") {cbxvacio = cbxvacio+"Un Perfil, ";}
		if (cvacio != "") {mensajeError = "<P>* el campo "+cvacio+mensajeError+"esta vacio<p>";}
		if (cbxvacio != "") {mensajeError = "<P>* debe seleccionar "+cbxvacio+mensajeError;}

		if (g.length < 9) {mensajeError = mensajeError+"<p>* el telefono debe tener minimo 9 </p>";}
		if (z.length < 8) {mensajeError = mensajeError+"<p>* el Dni debe tener minimo 8 </p>";}
		if (isEmail(h)==false) {mensajeError = mensajeError+"<p>* Email no Valido escriba ej: username@dominio.com </p>";}
		if (mensajeError != "") {$('#MerroIngresar').html(mensajeError);}
		else {
			$.post(baseurl+"cgesusuarios/Registrarpersona",
		{
		 mdltxtdni         :z,
		 mdltxtNombre      :a,
		 mdltxtApPaterno   :b,
		 mdltxtApMaterno   :c,
		 mdlcbxSexo        :d,
		 mdlcbxPerfil      :e,
		 mdlfechaNacimiento:f,
		 mdlTelefono       :g,
		 mdlEmail          :h
		},
		function (data) {
			if (data == 1) {
				$('#mbtnCerrarModal').click();
				location.reload();
				}
			if(data == 0){$('#MerroIngresar').html("<p>* El N° de DNI ya Existe </p>");}
			});
		}
	});

	selPersonas = function (codper, dniper, nomper, appper, apmper, telper, email)
	{
  $('#emdlCodPersona').val(codper);
	$('#emdltxtdni').val(dniper);
	$('#emdltxtNombre').val(nomper);
	$('#emdltxtApPaterno').val(appper);
	$('#emdltxtApMaterno').val(apmper);
	$('#emdlTelefono').val(telper);
	$('#emdlEmail').val(email);
};

	$('#embtnActualizar').click(function () {
		var x = $('#emdlCodPersona').val();
		var z = $('#emdltxtdni').val();
		var a = $('#emdltxtNombre').val();
		var b = $('#emdltxtApPaterno').val();
		var c = $('#emdltxtApMaterno').val();
		var d = $('#emdlcbxSexo').val();
		var e = $('#emdlcbxPerfil').val();
		var f = $('#emdlfechaNacimiento').val();
		var g = $('#emdlTelefono').val();
		var h = $('#emdlEmail').val();

		//verificacion de campos vacios
		var ecvacio = "";
		var ecbxvacio = "";
		var emensajeError = "";
		if (z == "") {ecvacio = ecvacio+"Dni, ";}
		if (a == "") {ecvacio = ecvacio+"Nombre, ";}
		if (b == "") {ecvacio = ecvacio+"Apellido Paterno, ";}
		if (c == "") {ecvacio = ecvacio+"Apellido Materno, ";}
		if (f == "") {ecvacio = ecvacio+"fecha de Nacimiento, ";}
		if (g == "") {ecvacio = ecvacio+"Telefono, ";}
		if (h == "") {ecvacio = ecvacio+"Email, ";}
		if (d == "") {ecbxvacio = ecbxvacio+"Un Sexo, ";}
		if (e == "") {ecbxvacio = ecbxvacio+"Un Perfil, ";}
		if (ecvacio != "") {emensajeError = "<P>* el campo "+ecvacio+emensajeError+"esta vacio<p>";}
		if (ecbxvacio != "") {emensajeError = "<P>* debe seleccionar "+ecbxvacio+emensajeError;}

		if (g.length < 9) {emensajeError = emensajeError+"<p>* el telefono debe tener minimo 9 </p>";}
		if (z.length < 8) {emensajeError = emensajeError+"<p>* el Dni debe tener minimo 8 </p>";}
		if (isEmail(h)==false) {emensajeError = emensajeError+"<p>* Email no Valido escriba ej: username@dominio.com </p>";}
		if (emensajeError != "") {$('#MErrorEditar').html(emensajeError);}
		else {
		$.post(baseurl+"cgesusuarios/Updpersona",
		{
		 emdlCodPersona     :x,
		 emdltxtdni         :z,
		 emdltxtNombre      :a,
		 emdltxtApPaterno   :b,
		 emdltxtApMaterno   :c,
		 emdlcbxSexo        :d,
		 emdlcbxPerfil      :e,
		 emdlfechaNacimiento:f,
		 emdlTelefono       :g,
		 emdlEmail          :h
		},
		function (data) {
			if (data == 2) {
				$('#embtnCerrarModal').click();
				location.reload();
				}
			});
			}
	});


	selUser = function (codusu, codper, userper, nomper, appper)
	{
		if (userper == 'null') {
		$('#umdltxtUsuario').val('');
	}else {
		$('#umdltxtUsuario').val(userper);
	}
		$('#umdlcodusu').val(codusu);
		$('#umdlcodper').val(codper);
		$('#nuevo').html('<H> USUARIO: '+nomper+' '+appper+'</H>');
	};

	$('#mbtnCrearUsuario').click(function () {
		var x = $('#umdlcodusu').val();
		var xx = $('#umdlcodper').val();
		var w = $('#umdltxtUsuario').val();
		var y = $('#umdlpassword').val();
		var z = $('#umdlpasswordconfirm').val();
//verificacion de campos vacios
		var cvacio = "";
		var mensajeError = "";
		if (w == "") {cvacio = cvacio+"usuario, ";}
		if (y == "") {cvacio = cvacio+"contraseña, ";}
		if (z == "") {cvacio = cvacio+"confirmar contraseña, ";}
		if (cvacio != "") {mensajeError = "<P>* el campo "+cvacio+mensajeError+"esta vacio<p>";}
		if (y != z) {mensajeError = mensajeError + "<p>* las contraseñas no coinciden</p>";}
//pinta el error
		if (mensajeError != "") {$('#mensajeErrorCampos').html(mensajeError);}
		else {
			$.post(baseurl+"cgesusuarios/UdpUsuario",
			{
			 umdlcodusu          :x,
			 umdlcodper          :xx,
			 umdltxtUsuario      :w,
			 umdlpassword        :y
			},
			function (data) {
				if (data == 3) {
					$('#umbtnCancelar').click();
					location.reload();
					}
				});
		}
	});

	selEliminar = function (codper, nomper, appper) {
		$('#dmdlPersona').val(codper);
		$('#UsuarioNombre').html(nomper+' '+appper);
	}

	$('#dmbtnEliminarUsuario').click(function() {
		var codpersona = $('#dmdlPersona').val();

		$.post(baseurl+"cgesusuarios/deletepersona",
		{
			dmdlPersona : codpersona
		},
		 function(data) {
			 if (data == 4) {
				 $('#dmbtneliminar').click();
				 location.reload();
				 }
		});
	});
