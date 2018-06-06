function loadChart(data){
  var dataArray = JSON.parse(data);

  var ctx = $("#prChart");
  var doughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
          data: dataArray,
          backgroundColor: [
            '#00a65a',                
            '#3c8dbc',
            '#f39c12',                
            '#dd4b39',                
          ],
      }],

      labels: [
        'Total a receber: R$',              
        'Total Inadimplência: R$',
        'Total a pagar: R$',
        'Total Dividas atrasadas: R$',
      ]
    }
  });    
}

