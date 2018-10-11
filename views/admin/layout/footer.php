  </div>
  <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Fashe Mobile 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="public/admin/vendor/jquery/jquery.min.js"></script>
    <script src="public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $( function() {
        $( "#datepicker" ).datepicker({
           dateFormat: 'yy-mm-dd'
        });
      });
    </script>

    <!-- Core plugin JavaScript-->
    <script src="public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="public/admin/vendor/chart.js/Chart.min.js"></script>
    <script src="public/admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="public/admin/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="public/admin/js/sb-admin.js"></script>

    <!-- Demo scripts for this page-->
    <script src="public/admin/js/demo/datatables-demo.js"></script>
    <!-- <script src="public/admin/js/demo/chart-bar-demo.js"></script> -->
          <script type="text/javascript">
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
            label: "Tổng số lượng: ",
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
                max: 30,
                maxTicksLimit: 6
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
            </script>
            <script type="text/javascript">
              var sp11 = $('#body1 #11').attr('data-name1');
              var sp12 = $('#body1 #12').attr('data-name1');
              var sp13 = $('#body1 #13').attr('data-name1');
              var sp14 = $('#body1 #14').attr('data-name1');
              var sp15 = $('#body1 #15').attr('data-name1');

              var sum11 = $('#body1 #11').attr('data-sum1');
              var sum12 = $('#body1 #12').attr('data-sum1');
              var sum13 = $('#body1 #13').attr('data-sum1');
              var sum14 = $('#body1 #14').attr('data-sum1');
              var sum15 = $('#body1 #15').attr('data-sum1');

              // Set new default font family and font color to mimic Bootstrap's default styling



      Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#292b2c';

      // Bar Chart Example
      var ctx = document.getElementById("myBarChart1");
      var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [sp11,sp12,sp13,sp14,sp15],
          datasets: [{
            label: "Số lượng: ",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: [sum11, sum12, sum13, sum14, sum15],
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
                max: 150,
                maxTicksLimit: 6
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
            </script>

  </body>

</html>