$.post(baseurl + "ceventos/getencargado", {
    codperf: 5
  },
  function(data) {
    var c = JSON.parse(data);
    $.each(c, function(i, item) {
      $('#cbencargado').append('<option value="' + item.codper + '">' + item.nomper + ' ' + item.appper + ' ' + item.apmper + '</option>');
      $('#mcbencargado').append('<option value="' + item.codper + '">' + item.nomper + ' ' + item.appper + ' ' + item.apmper + '</option>');
    });
  });
$(function() {
  $('.select2').select2();
  $('#mdlfechainieve').datepicker({
    format: "yyyy-mm-dd",
    todayBtn: "linked",
    clearBtn: true,
    language: "es",
    todayHighlight: true,
    autoclose: true
  });
  $('#mdlfechafineve').datepicker({
    format: "yyyy-mm-dd",
    todayBtn: "linked",
    clearBtn: true,
    language: "es",
    todayHighlight: true,
    autoclose: true
  });
  $('#emdlfechainieve').datepicker({
    format: "yyyy-mm-dd",
    todayBtn: "linked",
    clearBtn: true,
    language: "es",
    todayHighlight: true,
    autoclose: true
  });
  $('#emdlfechafineve').datepicker({
    format: "yyyy-mm-dd",
    todayBtn: "linked",
    clearBtn: true,
    language: "es",
    todayHighlight: true,
    autoclose: true
  });
  $('.solofec').on('input', function () {
      this.value = this.value.replace(/[^0-9-]+/ig,"");
  });
});

$('#tblGesEvento').DataTable({
  "lengthMenu": [
    [5, 10, 15, 20, ],
    [5, 10, 15, 20]
  ],
  'paging': true,
  'info': true,
  'filter': true,
  'stateSave': true,
  'ajax': {
    "url": baseurl + "ceventos/getevento/",
    "type": "POST",
    dataSrc: '',
  },
  'columns': [{				data: "rownum",
      'sClass': 'dt-body-center'			},
    {data: "nomeve"},
    {data: "deseve"},
    {data: "fecha"},
    {data: "enceve"},
    {"orderable": true,
      render: function(data, type, row) {
        return '<span class="pull-right">' +
          '<div class="dropdown">' +
          '  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
          '    Acciones' +
          '  <span class="caret"></span>' +
          '  </button>' +
          '    <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">' +
          '    <li><a href="#" title="Editar Evento" data-toggle="modal" data-target="#modalEditarevento" onClick="selEve(\'' + row.codeve + '\',\'' + row.nomeve + '\',\'' + row.deseve + '\',\'' + row.enceve + '\');"><i class="glyphicon glyphicon-edit" style="color:#006699"></i> Editar</a></li>' +
          '    <li><a href="#" title="Eliminar Evento" data-toggle="modal" data-target="#modalEliminarevento" onClick="seleliminarEve(\'' + row.codeve + '\',\'' + row.nomeve + '\');"><i class="glyphicon glyphicon-remove" style="color:#c63218"></i> Eliminar </a></li>' +
          '    </ul>' +
          '</div>' +
          '</span>';
      }
    }
  ],
  "order": [
    [0, "asc"]
  ],"language":{
						"lengthMenu": "Mostrar _MENU_ registros",
						"info": "Mostrando página _PAGE_ de _PAGES_ de _MAX_ registros",
						"infoEmpty": "No hay registros disponibles",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"loadingRecords": "Cargando...",
						"processing":     "Procesando...",
						"search": "Buscar:",
						"zeroRecords":    "No se encontraron registros coincidentes",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior"
						},
					}
});

$('#mbtnRegistrareve').click(function () {

  var a = $('#mdltxtnomeve').val();
  var b = $('#mtxtdesceve').val();
  var c = $('#mdlfechainieve').val();
  var d = $('#mdlfechafineve').val();
  var e = $('#cbencargado').val();


  //verificar parametros vacios
  var cvacio = "";
  var mensajeError = "";

  if (a == "") {cvacio = cvacio+"Nombre del Evento, ";}
  if (c == "") {cvacio = cvacio+"Fecha inicio, ";}
  if (d == "") {cvacio = cvacio+"fecha Fin, ";}
  if (e == "") {cvacio = cvacio+"Encargado, ";}

  if (cvacio != "") {mensajeError = "<P>* el campo "+cvacio+mensajeError+"esta vacio<p>";}
  if (mensajeError != "") {$('#Merrorevento').html(mensajeError);}
  else {
    $.post(baseurl+"ceventos/RegistrarEvento",
  {
   mdltxtnomeve   :a,
   mtxtdesceve    :b,
   mdlfechainieve :c,
   mdlfechafineve :d,
   cbencargado   :e
  },
  function (data) {
    if (data == 1) {
      $('#mbtnCerrarModaleve').click();
      location.reload();
      }
    });
  }
});

selEve = function (codeve, nomeve, deseve, enceve) {
$('#emdlevento').val(codeve);
$('#emdltxtnomeve').val(nomeve);
$('#emtxtdesceve').val(deseve);
$('#mcbencargado').val(enceve);
}

$('#embtnActualizareve').click(function () {

  var z = $('#emdlevento').val();
  var a = $('#emdltxtnomeve').val();
  var b = $('#emtxtdesceve').val();
  var c = $('#emdlfechainieve').val();
  var d = $('#emdlfechafineve').val();
  var e = $('#mcbencargado').val();

  //verificar parametros vacios
  var cvacio = "";
  var mensajeError = "";

  if (a == "") {cvacio = cvacio+"Nombre del Evento, ";}
  if (c == "") {cvacio = cvacio+"Fecha inicio, ";}
  if (d == "") {cvacio = cvacio+"fecha Fin, ";}
  if (e == "") {cvacio = cvacio+"Encargado, ";}

  if (cvacio != "") {mensajeError = "<P>* el campo "+cvacio+mensajeError+"esta vacio<p>";}
  if (mensajeError != "") {$('#MErrorEditareve').html(mensajeError);}
  else {
    $.post(baseurl+"ceventos/Updevento",
  {
   emdlevento      :z,
   emdltxtnomeve   :a,
   emtxtdesceve    :b,
   emdlfechainieve :c,
   emdlfechafineve :d,
   mcbencargado   :e
  },
  function (data) {
    if (data == 2) {
      $('#embtnCerrarModaleve').click();
      location.reload();
      }
    });
  }
});

seleliminarEve = function (codeve, nomeve) {
  $('#dmdlevento').val(codeve);
  $('#nombevento').html(nomeve);
}

$('#dmbtnEliminarevento').click(function() {
  var codeve = $('#dmdlevento').val();
  $.post(baseurl+"ceventos/deleteevento",
  {
    dmdlevento : codeve
  },
   function(data) {
     if (data == 3) {
       $('#dmbtncancelareve').click();
       location.reload();
       }
  });
});
