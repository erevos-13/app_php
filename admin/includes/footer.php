  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  <!-- Text editor -->
  <script src="js/scripts.js"></script>

  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

          var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['View Page',     <?php echo $session->count; ?>],
              ['Users',      <?php echo Users::count_all(); ?>],
              ['Photos',  <?php echo Photos::count_all(); ?>],
              ['Comments', <?php echo Comment::count_all(); ?>]

          ]);

          var options = {
              pieSliceText:'label',
              title: 'My Daily Activities',
              backgroundColor:'transparent'
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
      }
  </script>

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=rypheg9c3csva3alfd39lgs9s78haxko86w78685b84av3ao"></script>




  </body>

</html>
