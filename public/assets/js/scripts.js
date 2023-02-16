(function(window, undefined) {
  'use strict';

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */


})(window);

function drawChart(name,data,color,id){
  var gainedChartoptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false,
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      },
    },
    colors: [color],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 80, 100]
      }
    },
    series: [{
      name: name,
      data: data
    }],

    xaxis: {
      labels: {
        show: false,
      },
      axisBorder: {
        show: false,
      }
    },
    yaxis: [{
      y: 0,
      offsetX: 0,
      offsetY: 0,
      padding: { left: 0, right: 0 },
    }],
    tooltip: {
      x: { show: false }
    },
  }

  var gainedChart = new ApexCharts(
      document.querySelector("#"+id),
      gainedChartoptions
  );

  gainedChart.render();
}//end drawChart

function totalOrders(percentage){
  var supportChartoptions = {
    chart: {
      height: 270,
      type: 'radialBar',
    },
    plotOptions: {
      radialBar: {
        size: 150,
        startAngle: -150,
        endAngle: 150,
        offsetY: 20,
        hollow: {
          size: '65%',
        },
        track: {
          background: '#FFF',
          strokeWidth: '100%',

        },
        dataLabels: {
          value: {
            offsetY: 30,
            color: '#99a2ac',
            fontSize: '2rem'
          }
        }
      },
    },
    colors: ['#e73d3e'],
    fill: {
      type: 'gradient',
      gradient: {
        // enabled: true,
        shade: 'dark',
        type: 'horizontal',
        shadeIntensity: 0.5,
        gradientToColors: ['#3EB453'],
        inverseColors: true,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100]
      },
    },
    stroke: {
      dashArray: 8
    },
    series: [percentage],
    labels: ['Completed orders'],

  }

  var supportChart = new ApexCharts(
      document.querySelector("#total_orders_chart"),
      supportChartoptions
  );

  supportChart.render();
}//end totalOrders
