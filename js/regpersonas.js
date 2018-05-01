$.post(baseurl + "cregpersonas/getEventos", {
		esteve: 1
	},
	function(data) {
		var c = JSON.parse(data);
		$.each(c, function(i, item) {
			$('#cboevento').append('<option value="' + item.codeve + '">' + item.nomeve + '</option>');
		});
	});

$('#btndni').click(function() {
	var d = $('#txtBuscarDNI').val();

	$.post(baseurl + "cregpersonas/dnipersona", {
		dnip: d },
		function(data) {
				var obj = JSON.parse(data);
				$.each(obj, function(i, item) {					
						$('#txtnombres').val(item.Nombre);
						$('#txtapp').val(item.Paterno);
						$('#txtapm').val(item.Materno);
				});

		});

});


function llenar_tabla_asistencia() {
	var cbxeve = $('#cboevento').val();
	var cbxsub = $('#cbosubevento').val();
	$("#tblAsistencia").dataTable().fnDestroy();
	$('#tblAsistencia').DataTable({
		"lengthMenu": [
			[5, 10, 15, 20, ], [5, 10, 15, 20]
		],
		'paging': true,
		'info': true,
		'filter': true,
		'stateSave': true,
		'ajax': {
			"url": baseurl + "cregpersonas/getAsistencias/",
			"type": "POST",
			dataSrc: '',
			"dataType": 'json',
			"data": {
				'cbe': cbxeve,
				'cbs': cbxsub
			}
		},
		'columns': [{data: "rownum", 'sClass': 'dt-body-center'},
			{data: "dniper"},
			{data: "nomper"},
			{data: "appper"},
			{data: "apmper"},
			{data: "nomsubeve"},
			{data: "horasis"}
		],
		"order": [
			[0, "asc"]
		]
	});
};


$('#btnIngresar').click(function() {
	var d = $('#txtBuscarDNI').val();
	var n = $('#txtnombres').val();
	var p = $('#txtapp').val();
	var m = $('#txtapm').val();
	var c = $('#cboevento').val();
	var s = $('#cbosubevento').val();

//validar campos vacios
var cvacio = "";
var cbxvacio = "";
var mensajeError = "";
if (d == "") {cvacio = cvacio+"Dni, ";}
if (n == "") {cvacio = cvacio+"Nombre, ";}
if (p == "") {cvacio = cvacio+"Apellido Paterno, ";}
if (m == "") {cvacio = cvacio+"Apellido Materno, ";}
if (c == "") {cbxvacio = cbxvacio+"un Evento, ";}
if (s == "") {cbxvacio = cbxvacio+"un SubEvento, ";}
if (cvacio != "") {mensajeError = "<P>* el campo "+cvacio+mensajeError+"esta vacio<p>";}
if (cbxvacio != "") {mensajeError = "<P>* debe seleccionar "+cbxvacio+mensajeError;}

if (d.length < 8) {mensajeError = mensajeError+"<p>* el Dni debe tener minimo 8 </p>";}
if (mensajeError != "") {$('#MErrorAsistencia').html(mensajeError);}
else {
	$.post(baseurl + "cregpersonas/RegistroPersona",{
	dn: d, no: n, pa: p, ma: m, ce: c, cs: s },
	function (data) {
		if (data == 666) {
			$('#MErrorAsistencia').html("<p>* El Usuario ya ha sido registrado </p>");
		}else {
			llenar_tabla_asistencia();
			$('#txtnombres').val('');
			$('#txtapp').val('');
			$('#txtapm').val('');
			$('#txtBuscarDNI').val('');
			$('#MErrorAsistencia').html('');
		}
	});
}
});


$('#cboevento').change(function() {
			$('#cboevento option:selected').each(function() {
					var id = $('#cboevento').val();
					$('#cbosubevento').html(
						'<select id="cbosubevento" class="form-control">' +
						'<option value="">Eliga Sub Evento</option>' +
						'</select>');
						$.post(baseurl + "cregpersonas/getSubEventos", {
								codeve: id
							},
							function(data) {
								var s = JSON.parse(data);
								$.each(s, function(i, item) {
									$('#cbosubevento').append('<option value="' + item.codsubeve + '">' + item.nomsubeve + '</option>');
								});
							});
					});
			});

			$('#cbosubevento').change(function() {
				$('#cbosubevento option:selected').each(function() {
					llenar_tabla_asistencia();
				});
			});

$(function () {
	$('.select2').select2();
	$('.solonum').on('input', function () {
	this.value = this.value.replace(/[^0-9]/g,'');
		});
	$('.sololet').on('input', function () {
	this.value = this.value.replace(/[^ a-zA-Záéíóúüñ]+/ig,"");
		});
});
/*
$('#btnIngresar').click(function() {
	var d = $('#txtdni').val();
	var n = $('#txtnombres').val();
	var p = $('#txtapp').val();
	var m = $('#txtapm').val();
	var c = $('#cboevento').val();
 	var s = $('#cbosubevento').val();
	$.ajax({
    data:  {
			'dn': d,
			'no': n,
			'pa': p,
			'ma': m,
			'ce': c,
			'cs': s
		},
    url:   baseurl + "cregpersonas/RegistroPersona/",
    type:  'post',
    dataSrc: '',
		"dataType": 'json'
				});
}); */

		// LLenado de tabla por JSON
		/*
		$('#cbosubevento').change(function() {
			$('#cbosubevento option:selected').each(function() {
				var cbxeve = $('#cboevento').val();
				var cbxsub = $('#cbosubevento').val();
				$('#tblPersonas tbody').html('')
				$.post(baseurl + "cregpersonas/getAsistencias/", {
						cbe: cbxeve,
						cbs: cbxsub
					},
					function(data) {
						var p = JSON.parse(data);
						$.each(p, function(i, item) {
							$('#tblAsistencia tbody').append(
								'<tr>' +
								'<td>' + item.rownum + '</td>' +
								'<td>' + item.dniper + '</td>' +
								'<td>' + item.nomper + '</td>' +
								'<td>' + item.appper + '</td>' +
								'<td>' + item.apmper + '</td>' +
								'<td>' + item.nomsubeve + '</td>' +
								'<td>' + item.horasis + '</td>' +
								'</tr>'
							);
						});
						$('#tblAsistencia').DataTable({
							'paging': true,
							'info'  : true,
							'filter': true,
						});
					});
				//-------------fin JSON------------------
			});
		});*/



/*
$('#btnIngresar').click(function() {
	var cbxeve = $('#cboevento').val();
	var cbxsub = $('#cbosubevento').val();
	$("#tblAsistencia").dataTable().fnDestroy();
	$('#tblAsistencia').DataTable({
		"lengthMenu": [
			[5, 10, 15, 20, ], [5, 10, 15, 20]
		],
		'paging': true,
		'info': true,
		'filter': true,
		'stateSave': true,
		'ajax': {
			"url": baseurl + "cregpersonas/getAsistencias/",
			"type": "POST",
			dataSrc: '',
			"dataType": 'json',
			"data": {
				'cbe': cbxeve,
				'cbs': cbxsub
			}
		},
		'columns': [{data: "rownum", 'sClass': 'dt-body-center'},
			{data: "dniper"},
			{data: "nomper"},
			{data: "appper"},
			{data: "apmper"},
			{data: "nomsubeve"},
			{data: "horasis"}
		],
		"order": [
			[0, "asc"]
		]
	});
}); */
/*
$('#btndni').click(function() {
  alert("hola");
});*/
/*
		$('#tblAsistencia').DataTable({
		  "lengthMenu": [[5, 10, 15, 20,], [5, 10, 15, 20]],
			'paging': true,
			'info': true,
			'filter': true,
			'stateSave': true,

		 'processing': true,
		 'serverSide': true,
		 'ajax': {
		        "url":baseurl+"cregpersonas/getAsistencias/",
		        "type":"POST",
		},
		'colums': [
			{"data": "rownum",'sClass':'dt-body-center'},
		  {"data": "dniper"},
		  {"data": "nomper"},
		  {"data": "appper"},
		  {"data": "apmper"},
		  {"data": "nomsubeve"},
		  {"data": "horasis"}
		],
		"order": [[0, "asc"]]
		});
		*/
