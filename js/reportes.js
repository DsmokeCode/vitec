var paramEven = [];
var paramAsis = [];

/*$.post(baseurl + "csubeventos/getevento", {
			esteve: 1
		},
		function(data) {
			var c = JSON.parse(data);
			$.each(c, function(i, item) {
				$('#idcbevento').append('<option value="' + item.codeve + '">' + item.nomeve + '</option>');
			});
		});

$('btngraficar1').click(function() {
  var ideve =  $('#idcbevento').val();
  $.$.post(baseurl + "creportes/getPonxAsixEve", {
  idcbevento: ideve
},
  function(data) {
    var obj = JSON.parse(data);
    var paramPonencia = [];
    var paramAsis = [];
    $.each(obj, function (i,item) {
      var r = Math.random() * 255;
      r = Math.round(r);

      var g = Math.random() * 255;
      g = Math.round(g);

      var b = Math.random() * 255;
      b = Math.round(b);

      bgColor.push('rgba('+r+','+g+','+b+',0.2)');
      bgBorder.push('rgba('+r+','+g+','+b+',1)');
      paramPonencia.push(item.nomsubeve);
      paramAsis.push(item.total_asistencia);
    });
    $('#lineChart1').remove();
    $('#contenedor_grafico1').append("<canvas id='lineChart1' height='500'></canvas>");

    var ctx = $('#lineChart1').get(0).getContext('2d');
    var lineChart = new Chart(ctx,{
      type: 'horizontalBar',
      data: {
     labels: paramPonencia,
     datasets: [
       {
         label: "Asistencias por Ponencias",
         backgroundColor: bgColor,
         data: paramAsis
       }
     ]
   },
   options: {
     legend: { display: false },
     title: {
       display: true,
       text: 'Este Grafico mide el grado de Asistencia por el ponencia'
     }
   }
    });
  });
}); */

$('#btngraficar3').click(function () {
  $.post(baseurl + "creportes/getEvexAsi",
    function (data) {
      var obj = JSON.parse(data);
      var paramEven = [];
      var paramAsis = [];
      $.each(obj, function (i,item) {
        paramEven.push(item.nomeve);
        paramAsis.push(item.total_asistencia);
      });
      $('#lineChart3').remove();
      $('#contenedor_grafico3').append("<canvas id='lineChart3' height='500'></canvas>");

      var ctx = $('#lineChart3').get(0).getContext('2d');
      var lineChart = new Chart(ctx,{
      type: 'line',
        data: {
          labels: paramEven,
          datasets: [{
              label: "Asistencias por Eventos",
              fill: true,
              lineTension: 0.1,
              backgroundColor: "rgba(75,192,192,0.4)",
              borderColor: "rgba(75,192,192,1)",
              borderCapStyle: 'butt',
              borderDash: [],
              borderDashOffset: 0.0,
              borderJoinStyle: 'miter',
              pointBorderColor: "rgba(75,192,192,1)",
              pointBackgroundColor: "#fff",
              pointBorderWidth: 10,
              pointHoverRadius: 5,
              pointHoverBackgroundColor: "rgba(75,192,192,1)",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointHoverBorderWidth: 5,
              pointRadius: 1,
              pointHitRadius: 10,
              data: paramAsis, //paramValores,//vertical
              spanGaps: false,
            }
          ]
        },
        options: {
            title: {
              display: true,
              text: 'Este Grafico mide el grado de Asistencia por el total de Eventos'
            },
      	        scales: {
      	            yAxes: [{
      	                ticks: {
      	                    beginAtZero:true
      	                }
      	            }]
      	        }
      	    }
      });
    });
});


var paramPon = [];
var bgBorder = [];
var bgColor = [];
$('#btngraficar4').click(function () {
  $.post(baseurl + "creportes/getPonxAsi",
    function (data) {
      var obj = JSON.parse(data);
      var paramPon = [];
      var paramAsis = [];
      var bgBorder = [];
      var bgColor = [];
      $.each(obj, function (i,item) {
        var r = Math.random() * 255;
        r = Math.round(r);

        var g = Math.random() * 255;
        g = Math.round(g);

        var b = Math.random() * 255;
        b = Math.round(b);

        paramPon.push(item.nomsubeve);
        paramAsis.push(item.total_asistencia);
        bgColor.push('rgba('+r+','+g+','+b+',0.2)');
        bgBorder.push('rgba('+r+','+g+','+b+',1)');
      });
      $('#lineChart4').remove();
      $('#contenedor_grafico4').append("<canvas id='lineChart4' height='500'></canvas>");
      // Bar chart
      var ctx = $('#lineChart4').get(0).getContext('2d');
      var lineChart = new Chart(ctx,{
            type: 'bar',
            data: {
              labels: paramPon,
              datasets: [
                {
                  label: "Asistencias por Ponencias",
                  backgroundColor: bgColor,
                  borderColor: bgBorder,
                  borderwidth: 1,
                  data: paramAsis
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Este Grafico mide el grado de Asistencia por el total de Ponencias'
              }
            }
        });
    });
});

new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
    datasets: [{
        data: [6,3,2,2,7,26,82,172,312,433],
        label: "North America",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    }
  }
});
