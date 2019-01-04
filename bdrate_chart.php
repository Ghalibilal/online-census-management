<?php $district=strtolower($_GET['district']);?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'population'],
          ['Birth Rate',   <?php 
              
            include_once('Admin/connection.php'); 
          $sql="SELECT birth.* FROM birth INNER JOIN employee ON birth.emp_id=employee.id AND employee.district='$district'";
          $result = mysqli_query($conn, $sql);

$row=mysqli_num_rows($result);





          echo $row;?>],
          ['Death Rate',   <?php $sql1="SELECT death.* FROM death INNER JOIN employee ON death.emp_id=employee.id AND employee.district='$district'";
          $result1 = mysqli_query($conn, $sql1);

 echo mysqli_num_rows($result1); ?>]
        
          
          
        ]);

        var options = {
          title: '<?php echo strtoupper($district);?> Birth & Death Rate Pie Chart',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div class='row'>
      <div class='col-sm-offset-1 col-sm-3'>
        <h3 style='color:green;'><?php echo strtoupper($district);?>
        <table class='table table-striped'>
         
         <?php  $sql2="SELECT people.* FROM people INNER JOIN employee ON people.emp_id=employee.id AND employee.district='$district'";
          $result2 = mysqli_query($conn, $sql2);

 $total=mysqli_num_rows($result2);?>

<tr>
            <td><h3>Birth Rate :</h3>  </td><td></td><td></td><td></td>
            <td><?php  $sql3="SELECT birth.* FROM birth INNER JOIN employee ON birth.emp_id=employee.id AND employee.district='$district'";
          $result3 = mysqli_query($conn, $sql3);

$birth=mysqli_num_rows($result3);
if($total>=1){
 $r=$birth/$total;
 echo "<h3>".($r*1000)."</h3>";}?></td>
</tr>
<?php  $sql2="SELECT people.* FROM people INNER JOIN employee ON people.emp_id=employee.id AND employee.district='$district'";
          $result2 = mysqli_query($conn, $sql2);

 $total=mysqli_num_rows($result2);?>
</tr>
<tr>
            <td><h3>Death Rate :</h3>  </td><td></td><td></td><td></td>
            <td><?php  $sql3="SELECT death.* FROM death INNER JOIN employee ON death.emp_id=employee.id AND employee.district='$district'";
          $result3 = mysqli_query($conn, $sql3);

$death=mysqli_num_rows($result3);
if($total>=1){
 $r=$death/$total;
 echo "<h3>".($r*1000)."</h3>";}?></td>
</tr>

        </table>
      </div>
      <div class='col-sm-8' id="piechart_3d" style="width: 900px; height: 400px;">
    
  </div>
  </div>
  </body>
</html>