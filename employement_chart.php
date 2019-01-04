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
          ['Employement',     <?php 
              
            include_once('Admin/connection.php'); 
          $sql="SELECT people.* FROM people INNER JOIN employee ON people.emp_id=employee.id AND employee.district='$district' AND people.job  NOT IN ('no job', 'student', 'less than five')";
          $result = mysqli_query($conn, $sql);

$row=mysqli_num_rows($result);





          echo $row;?>],
          ['Unemployement',   <?php $sql1="SELECT people.* FROM people INNER JOIN employee ON people.emp_id=employee.id AND employee.district='$district' AND people.job='no job'";
          $result1 = mysqli_query($conn, $sql1);

 echo mysqli_num_rows($result1); ?>],
        
          
          
        ]);

        var options = {
          title: '<?php echo strtoupper($district);?> Employement Pie Chart',
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
          <tr><td><h4>Name</h4></td><td></td><td></td><td></td><td><h4>Population</h4></td>
          
<tr>
            <td><h4>Employement:</h4>  </td><td></td><td></td><td></td>
            <td><?php  $sql3="SELECT people.* FROM people INNER JOIN employee ON people.emp_id=employee.id AND employee.district='$district' AND people.job  NOT IN ('no job', 'student', 'less than five')";
          $result3 = mysqli_query($conn, $sql3);

 echo "<h3>".mysqli_num_rows($result3)."</h3>";?></td>
</tr>
<tr>
            <td><h4>Unemployement :</h4>  </td><td></td><td></td><td></td>
            <td><?php  $sql4="SELECT people.* FROM people INNER JOIN employee ON people.emp_id=employee.id AND employee.district='$district' AND people.job='no job'";
          $result4 = mysqli_query($conn, $sql4);

 echo "<h3>".mysqli_num_rows($result4)."</h3>";?></td>
</tr>
        </table>
      </div>
      <div class='col-sm-8' id="piechart_3d" style="width: 900px; height: 400px;">
    
  </div>
  </div>
  </body>
</html>