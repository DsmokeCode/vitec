$(function () {
  $('#fechainibusqueda').datepicker({
    format: "yyyy-mm-dd",
    todayBtn: "linked",
    clearBtn: true,
    language: "es",
    todayHighlight: true,
    autoclose: true
  });
  $('#fechafinbusqueda').datepicker({
    format: "yyyy-mm-dd",
    todayBtn: "linked",
    clearBtn: true,
    language: "es",
    todayHighlight: true,
    autoclose: true
  });
});

$('#btnbuscar').click(function() {
  var fbi = $('#fechainibusqueda').val();
  var fbf = $('#fechafinbusqueda').val();
  $("#tblhistorialeventos").dataTable().fnDestroy();
  $('#tblhistorialeventos').DataTable({
    "lengthMenu": [
      [5, 10, 15, 20, ],
      [5, 10, 15, 20]
    ],
    'paging': true,
    'info': true,
    'filter': true,
    'stateSave': true,
    'ajax': {
      "url": baseurl + "chistorial/gethistorialeventos/",
      "type": "POST",
      dataSrc: '',
      "dataType": 'json',
      "data": {
        'fechainibusqueda': fbi,
        'fechafinbusqueda': fbf
      }
    },
    'columns': [{				data: "rownum",
        'sClass': 'dt-body-center'			},
      {data: "nomeve"},
      {data: "enceve"},
      {data: "finieve"},
      {data: "ffineve"},
      {"orderable": true,
        render: function(data, type, row) {
          return '<span class="pull-right">' +
           '<div class="btn-group col-sm-12">' +
           '<button type="button" id="btnponente" class="btn btn-primary pull-right" onClick="selponentes(\'' + row.codeve + '\');">' +
           '<i class="glyphicon glyphicon-eye-open"></i>  Ver Ponencias</button>' +
            '</div> '+
            '</span>';
        }
      }
    ],
    "order": [
      [0, "asc"]
    ]
  });
});

selponentes = function (codeve) {
$('#codeventos').val(codeve);
var cod = $('#codeventos').val();
  $("#tblhistorialponencia").dataTable().fnDestroy();
  $('#tblhistorialponencia').DataTable({
    "lengthMenu": [
      [5, 10, 15, 20, ],
      [5, 10, 15, 20]
    ],
    'paging': true,
    'info': true,
    'filter': true,
    'stateSave': true,
    'ajax': {
      "url": baseurl + "chistorial/gethistorialponente/",
      "type": "POST",
      dataSrc: '',
      "dataType": 'json',
      "data": {
        'codeventos': cod
      }
    },
    'columns': [{data: "rownum",'sClass': 'dt-body-center'},
      {data: "nomsubeve"},
      {data: "nomper"},
      {data: "finisubeve"}
    ],
    "order": [
      [0, "asc"]
    ]
  });
};
//------------------------------------------
