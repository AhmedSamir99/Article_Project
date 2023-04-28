<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<?php
include("../dbcon.php");

// Retrieve data from database using prepared statement
$sql = "SELECT g.name AS group_name, COUNT(u.id) AS user_count FROM groups g LEFT JOIN users u ON g.id = u.group_id GROUP BY g.name;";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $group_name, $user_count);

// Fetch results into arrays
$x_values = array();
$y_values = array();
while (mysqli_stmt_fetch($stmt)) {
  array_push($x_values, $group_name);
  array_push($y_values, $user_count);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>

<html>
  <head>
    <title>Group Name and Its Users Chart</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area "></i>Charts</h1>
      </div>
      <div id="chart"></div>
    </div>

    <script>
      Highcharts.chart('chart', {
        chart: {
          type: 'line'
        },
        title: {
          text: 'Group Name and Its Users Chart'
        },
        xAxis: {
          categories: <?php echo json_encode($x_values); ?>,
          title: {
            text: 'Group Name'
          }
        },
        yAxis: {
          title: {
            text: 'User Count'
          }
        },
        series: [{
          name: 'User Count',
          data: <?php echo json_encode($y_values); ?>
        }],
        colors: ['#00FFFF']
      });
    </script>
    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>
  </body>
</html>