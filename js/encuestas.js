$.post(baseurl + "cencuestas/getevento", {
			esteve: 1
		},
		function(data) {
			var c = JSON.parse(data);
			$.each(c, function(i, item) {
				$('#cbevento').append('<option value="' + item.codeve + '">' + item.nomeve + '</option>');
			});
		});

$(function() {
	$('.select2').select2();
	$('#finicio').datepicker({
		format: "yyyy-mm-dd",
		todayBtn: "linked",
		clearBtn: true,
		language: "es",
		todayHighlight: true,
		autoclose: true
	});
	$('#ffin').datepicker({
		format: "yyyy-mm-dd",
		todayBtn: "linked",
		clearBtn: true,
		language: "es",
		todayHighlight: true,
		autoclose: true
	});
  $('#mdlfinicioenc').datepicker({
		format: "yyyy-mm-dd",
		todayBtn: "linked",
		clearBtn: true,
		language: "es",
		todayHighlight: true,
		autoclose: true
	});
  $('#mdlffinenc').datepicker({
		format: "yyyy-mm-dd",
		todayBtn: "linked",
		clearBtn: true,
		language: "es",
		todayHighlight: true,
		autoclose: true
	});
});

function llenado_tabla_encuesta() {
	var ce = $('#cbevento').val();
	$("#tblEncuesta").dataTable().fnDestroy();
	$('#tblEncuesta').DataTable({
		"lengthMenu": [
			[5, 10, 15, 20, ],
			[5, 10, 15, 20]
		],
		'paging': true,
		'info': true,
		'filter': true,
		'stateSave': true,
		'ajax': {
			"url": baseurl + "cencuestas/getencuesta/",
			"type": "POST",
			dataSrc: '',
			"dataType": 'json',
			"data": {
				'cbe': ce
			}
		},
		'columns': [{				data: "rownum",
				'sClass': 'dt-body-center'			},
			{data: "nomenc"},
			{data: "desenc"},
			{data: "finienc"},
			{data: "ffinenc"},
			{"orderable": true,
				render: function(data, type, row) {
					return '<span class="pull-right">' +
						'<div class="dropdown">' +
						'  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
						'    Acciones' +
						'  <span class="caret"></span>' +
						'  </button>' +
						'    <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">' +
						'    <li><a href="#" title="Editar informacion" data-toggle="modal" data-target="#modalEditarEncuesta" onClick="selEnc(\'' + row.codenc + '\',\'' + row.nomenc + '\',\'' + row.desenc + '\');"><i class="glyphicon glyphicon-edit" style="color:#006699"></i> Editar</a></li>' +
						'    <li><a href="#" title="Eliminar subeve" data-toggle="modal" data-target="#modalEliminarEncuesta" onClick="seleliminarEnc(\'' + row.codenc + '\',\'' + row.nomenc + '\');"><i class="glyphicon glyphicon-remove" style="color:#c63218"></i> Eliminar </a></li>' +
						'    </ul>' +
						'</div>' +
						'</span>';
				}
			}
		],
		"order": [
			[0, "asc"]
		]
	});
};

$('#cbevento').change(function() {
	$('#cbevento option:selected').each(function() {
		llenado_tabla_encuesta();
	});
});


$('#btnguardarenc').click(function() {
	var a = $('#txtnomenc').val();
	var b = $('#txtdescenc').val();
	var c = $('#cbevento').val();
	var d = $('#finicio').val();
	var e = $('#ffin').val();

//validar campos
var ecvacio = "";
var ecbxvacio = "";
var emensajeError = "";
if (a == "") {ecvacio = ecvacio+"Nombre Encuesta, ";}
if (c == "") {ecbxvacio = ecbxvacio+"un Evento. ";}
if (d == "") {ecvacio = ecvacio+"fecha inicio, ";}
if (e == "") {ecvacio = ecvacio+"fecha fin, ";}

if (ecvacio != "") {emensajeError = "<P>* el campo "+ecvacio+emensajeError+"esta vacio<p>";}
if (ecbxvacio != "") {emensajeError = "<P>* debe seleccionar "+ecbxvacio+emensajeError;}

if (emensajeError != "") {$('#MErrorencuesta').html(emensajeError);}
else {
	$.post(baseurl + "cencuestas/guardarencuesta", {
  txtnomenc  : a,
  txtdescenc : b,
  cbevento   : c,
  finicio    : d,
  ffin       : e
	});
	llenado_tabla_encuesta();
}
});

selEnc = function (codenc, nomenc, desenc) {
  $('#mdlidencuesta').val(codenc);
  $('#mdltxtnomenc').val(nomenc);
  $('#mdltxtdesenc').val(desenc);
}

$('#mbtnUpdEncuesta').click(function() {
  var z = $('#mdlidencuesta').val();
	var a = $('#mdltxtnomenc').val();
	var b = $('#mdltxtdesenc').val();
	var d = $('#mdlfinicioenc').val();
	var e = $('#mdlffinenc').val();

//validar campos
var ecvacio = "";
var emensajeError = "";
if (a == "") {ecvacio = ecvacio+"Nombre Encuesta, ";}
if (d == "") {ecvacio = ecvacio+"fecha inicio, ";}
if (e == "") {ecvacio = ecvacio+"fecha fin, ";}

if (ecvacio != "") {emensajeError = "<P>* el campo "+ecvacio+emensajeError+"esta vacio<p>";}

if (emensajeError != "") {$('#MErrorEditenc').html(emensajeError);}
else {
	$.post(baseurl + "cencuestas/EditarEncuesta",
	{
  mdlidencuesta : z,
  mdltxtnomenc  : a,
  mdltxtdesenc  : b,
  mdlfinicioenc : d,
  mdlffinenc    : e
	},
  function (data) {
		if (data == 1) {
			$('#mbtnCerrarModalenc').click();
			llenado_tabla_encuesta();
			}
		});
}
});

$('#btnlimpiarenc').click(function() {
 location.reload();
});


seleliminarEnc = function (codenc, nomenc) {
  $('#dmdlencuesta').val(codenc);
  $('#nombreencuesta').html(nomenc);
};

$('#dmbtnEliminarencuesta').click(function() {
	var codenc = $('#dmdlencuesta').val();

	$.post(baseurl+"cencuestas/deleteencuesta",
	{
		dmdlencuesta: codenc
	},
	 function(data) {
		 if (data == 777) {
			 $('#dmbtncancelarencuesta').click();
			 //--------------------->//
			 $('#mdltxtnomenc').val('');
			 $('#mdltxtdesenc').val('');
			 $('#mdlfinicioenc').val('');
			 $('#mdlffinenc').val('');
			llenado_tabla_encuesta();
			 }
	});
});
