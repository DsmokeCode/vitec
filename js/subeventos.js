
$.post(baseurl + "csubeventos/getevento", {
			esteve: 1
		},
		function(data) {
			var c = JSON.parse(data);
			$.each(c, function(i, item) {
				$('#cbevento').append('<option value="' + item.codeve + '">' + item.nomeve + '</option>');
			});
		});

function llenarcbox() {
	$.post(baseurl + "csubeventos/getevento", {
				esteve: 1
			},
			function(data) {
				var c = JSON.parse(data);
				$.each(c, function(i, item) {
					$('#cbevento').append('<option value="' + item.codeve + '">' + item.nomeve + '</option>');
				});
			});

			$.post(baseurl + "csubeventos/getexpositor", {
					codperf: 2
				},
				function(data) {
					var c = JSON.parse(data);
					$.each(c, function(i, item) {
						$('#cbexpositor').append('<option value="' + item.codper + '">' + item.nomper + ' ' + item.appper + ' ' + item.apmper + '</option>');
						$('#mdlcbexpositor').append('<option value="' + item.codper + '">' + item.nomper + ' ' + item.appper + ' ' + item.apmper + '</option>');
					});
				});

				$.post(baseurl + "csubeventos/getLugar", {
						estlug: 1
					},
					function(data) {
						var c = JSON.parse(data);
						$.each(c, function(i, item) {
							$('#cblugar').append('<option value="' + item.codlug + '">' + item.nomlug + '</option>');
							$('#mdlcblugar').append('<option value="' + item.codlug + '">' + item.nomlug + '</option>');
						});
					});
};

$.post(baseurl + "csubeventos/getexpositor", {
		codperf: 2
	},
	function(data) {
		var c = JSON.parse(data);
		$.each(c, function(i, item) {
			$('#cbexpositor').append('<option value="' + item.codper + '">' + item.nomper + ' ' + item.appper + ' ' + item.apmper + '</option>');
			$('#mdlcbexpositor').append('<option value="' + item.codper + '">' + item.nomper + ' ' + item.appper + ' ' + item.apmper + '</option>');
		});
	});

$.post(baseurl + "csubeventos/getLugar", {
		estlug: 1
	},
	function(data) {
		var c = JSON.parse(data);
		$.each(c, function(i, item) {
			$('#cblugar').append('<option value="' + item.codlug + '">' + item.nomlug + '</option>');
			$('#mdlcblugar').append('<option value="' + item.codlug + '">' + item.nomlug + '</option>');
		});
	});

function llenado_tabla_subevento() {
	var ce = $('#cbevento').val();
	$("#tblSubEvento").dataTable().fnDestroy();
	$('#tblSubEvento').DataTable({
		"lengthMenu": [
			[5, 10, 15, 20, ],
			[5, 10, 15, 20]
		],
		'paging': true,
		'info': true,
		'filter': true,
		'stateSave': true,
		'ajax': {
			"url": baseurl + "csubeventos/getsubevento/",
			"type": "POST",
			dataSrc: '',
			"dataType": 'json',
			"data": {
				'cbe': ce
			}
		},
		'columns': [{				data: "rownum",
				'sClass': 'dt-body-center'			},
			{data: "nomsubeve"},
			{data: "dessubeve"},
			{data: "nomper"},
			{data: "nomlug"},
			{data: "finisubeve"},
			{data: "hora"},
			{"orderable": true,
				render: function(data, type, row) {
					return '<span class="pull-right">' +
						'<div class="dropdown">' +
						'  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
						'    Acciones' +
						'  <span class="caret"></span>' +
						'  </button>' +
						'    <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">' +
						'    <li><a href="#" title="Editar informacion" data-toggle="modal" data-target="#modalEditarSubevento" onClick="selSubEve(\'' + row.codsubeve + '\',\'' + row.nomsubeve + '\',\'' + row.dessubeve + '\');"><i class="glyphicon glyphicon-edit" style="color:#006699"></i> Editar</a></li>' +
						'    <li><a href="#" title="Eliminar subeve" data-toggle="modal" data-target="#modalEliminarSubEvento" onClick="seleliminarSubEve(\'' + row.codsubeve + '\',\'' + row.nomsubeve + '\');"><i class="glyphicon glyphicon-remove" style="color:#c63218"></i> Eliminar </a></li>' +
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

$(function() {
	$('.select2').select2();
	$('#datepicker').datepicker({
		format: "yyyy-mm-dd",
		todayBtn: "linked",
		clearBtn: true,
		language: "es",
		todayHighlight: true,
		autoclose: true
	});
	$('#datepicker1').datepicker({
		format: "yyyy-mm-dd",
		todayBtn: "linked",
		clearBtn: true,
		language: "es",
		todayHighlight: true,
		autoclose: true
	});
	$('.timepicker').timepicker({

		showMeridian: false,
		showInputs: false
	});
	/*var f = new Date();
  document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());*/
});

$('#btnguardar').click(function() {
	var ce  = $('#cbevento').val();
	var ns  = $('#txtnomsub').val();
	var cex = $('#cbexpositor').val();
	var cl  = $('#cblugar').val();
	var des = $('#txtdescsub').val();
	var fe  = $('#datepicker').val();
	var hi  = $('#hinicio').val();
	var hf  = $('#hfin').val();
//validar campos
var ecvacio = "";
var ecbxvacio = "";
var emensajeError = "";
if (ce == "") {ecbxvacio = ecbxvacio+"un Evento, ";}
if (ns == "") {ecvacio = ecvacio+"Nombre SubEvento, ";}
if (cex == "") {ecbxvacio = ecbxvacio+"un Expocitor, ";}
if (cl == "") {ecbxvacio = ecbxvacio+"un Lugar, ";}
if (fe == "") {ecvacio = ecvacio+"fecha del subvento, ";}
if (hi == "") {ecvacio = ecvacio+"Hora Inicio subevento, ";}
if (hf == "") {ecvacio = ecvacio+"Hora Fin subevento, ";}
if (hi >= hf) {emensajeError = emensajeError+"<p>* la hora de inicio debe ser menor a la hora fin </P>";}
if (ecvacio != "") {emensajeError = "<P>* el campo "+ecvacio+emensajeError+"esta vacio<p>";}
if (ecbxvacio != "") {emensajeError = "<P>* debe seleccionar "+ecbxvacio+emensajeError;}
if (emensajeError != "") {$('#MErrorsubeve').html(emensajeError);}
else {
	$.post(baseurl + "csubeventos/guardarsubevento", {
		cbxe : ce,
		txts : ns,
		cbxex: cex,
		cbxl : cl,
		txtds: des,
		fechs: fe,
		hrini: hi,
		hrfin: hf
	});
	llenado_tabla_subevento();
}
});



$('#btnlimpiar').click(function() {
	/*$('#txtnomsub').val('');
	$('#txtdescsub').val('');
	$('#cbevento').html('<select class="form-control select2" name="cbevento" id="cbevento" style="width: 100%;">'+
	'<option selected="selected" value="">Escoje el Evento</option>'+
	'</select>');
	$('#cbexpositor').html('<select class="form-control select2" name="cbexpositor" id="cbexpositor" style="width: 100%;">'+
						'<option selected="selected" value="">Escoje el Expositor</option>'+
					'</select>');
	$('#cblugar').html('<select class="form-control select2" name="cblugar" id="cblugar" style="width: 100%;">'+
						'<option selected="selected" value="">Escoje el Lugar</option>'+
					'</select>');
	llenarcbox();
	$('#datepicker').val('');
	// $("#tblSubEvento").dataTable().fnDestroy();
	// $('#tblSubEvento').html('<table id="tblSubEvento" class="table table-bordered table-hover">'+
	// 		'<tr>'+
	// 			'<th style="width:  2%;">N°</th>'+
	// 			'<th style="width: 12%;">Nombre del Sub Evento</th>'+
	// 			'<th style="width: 10%;">Descripcion</th>'+
	// 			'<th style="width: 10%;">Expositor</th>'+
	// 			'<th style="width: 10%;">Lugar</th>'+
	// 			'<th style="width: 11%;">Fecha de SubEvento</th>'+
	// 			'<th style="width: 10%;">Hora: Inicio - Fin</th>'+
	// 			'<th style="width: 5%;">Accion</th>'+
	// 		'</tr>'+
	// 		'</thead>'+
	// 		'<tbody></tbody>'+
	// 	'</table>');
	// llenado_tabla_subevento();*/
	location.reload();
});


$('#cbevento').change(function() {
	$('#cbevento option:selected').each(function() {
		llenado_tabla_subevento();
	});
});

selSubEve = function(codsubeve, nomsubeve, dessubeve) {
	$('#mdlidsubevento').val(codsubeve);
	$('#mdltxtnomsub').val(nomsubeve);
	$('#mdltxtdescsub').val(dessubeve);
};

$('#mbtnUpdSubEventos').click(function () {
  var z = $('#mdlidsubevento').val();
	var a = $('#mdltxtnomsub').val();
	var b = $('#mdltxtdescsub').val();
	var c = $('#mdlcbexpositor').val();
	var d = $('#mdlcblugar').val();
	var e = $('#datepicker1').val();
	var f = $('#timepicker').val();
	var g = $('#timepicker1').val();

	//validar campos de Editar
	var ecvacio = "";
	var ecbxvacio = "";
	var emensajeError = "";

	if (a == "") {ecvacio = ecvacio+"Nombre SubEvento, ";}
	if (c == "") {ecbxvacio = ecbxvacio+"un Expocitor, ";}
	if (d == "") {ecbxvacio = ecbxvacio+"un Lugar, ";}
	if (e == "") {ecvacio = ecvacio+"fecha del subvento, ";}
	if (f == "") {ecvacio = ecvacio+"Hora Inicio subevento, ";}
	if (g == "") {ecvacio = ecvacio+"Hora Fin subevento, ";}

	if (ecvacio != "") {emensajeError = "<P>* el campo "+ecvacio+emensajeError+"esta vacio<p>";}
	if (ecbxvacio != "") {emensajeError = "<P>* debe seleccionar "+ecbxvacio+emensajeError;}

	if (emensajeError != "") {$('#MErrorEditSubeve').html(emensajeError);}
else {

		$.post(baseurl+"csubeventos/updsubeventos",
	{
				mdlidsubevento:z,
				mdltxtnomsub  :a,
				mdltxtdescsub :b,
				mdlcbexpositor:c,
				mdlcblugar    :d,
				datepicker1   :e,
				timepicker    :f,
				timepicker1   :g
	},
	function (data) {
		if (data == 1) {
			$('#mbtnCerrarModal').click();
			llenado_tabla_subevento();
			}
		});
}
});

seleliminarSubEve = function (codsubeve, nomsubeve) {
	$('#dmdlsubevento').val(codsubeve);
	$('#nombresubeve').html(nomsubeve);
};

$('#dmbtnEliminarsubevento').click(function() {
	var codsubeve = $('#dmdlsubevento').val();

	$.post(baseurl+"csubeventos/deletesubevento",
	{
		dmdlsubevento : codsubeve
	},
	 function(data) {
		 if (data == 777) {
			 $('#dmbtncancelarsubevento').click();
			 //location.reload();
			 $('#txtnomsub').val('');
		 	$('#txtdescsub').val('');
		 	$('#cbexpositor').html('<select class="form-control select2" name="cbexpositor" id="cbexpositor" style="width: 100%;">'+
		 						'<option selected="selected" value="">Escoje el Expositor</option>'+
		 					'</select>');
		 	$('#cblugar').html('<select class="form-control select2" name="cblugar" id="cblugar" style="width: 100%;">'+
		 						'<option selected="selected" value="">Escoje el Lugar</option>'+
		 					'</select>');
		 	llenarcbox();
		 	$('#datepicker').val('');
			llenado_tabla_subevento();
			 }
	});
});
