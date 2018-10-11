        var sp1 = $('#body #1').attr('data-name');
        var sp2 = $('#body #2').attr('data-name');
        var sp3 = $('#body #3').attr('data-name');
        var sp4 = $('#body #4').attr('data-name');
        var sp5 = $('#body #5').attr('data-name');

        var sum1 = $('#body #1').attr('data-sum');
        var sum2 = $('#body #2').attr('data-sum');
        var sum3 = $('#body #3').attr('data-sum');
        var sum4 = $('#body #4').attr('data-sum');
        var sum5 = $('#body #5').attr('data-sum');
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [sp1,sp2,sp3,sp4,sp5],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [sum1, sum2, sum3, sum4, sum5],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 20,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
