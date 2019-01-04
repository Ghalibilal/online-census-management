<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Main page</title>
  <?php include_once('ad_material/main_style.php');?>
  
  </script>
  <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script><?php include_once('valid/valid_emp.php');?>


</head>
<body>
  <header class="container-fluid text-center ">
  <p>Admin Dashboard</p>
</header>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <br>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a  href="#">Insert Employee</a></li>
        <li><a href="emp_view.php">View Employee</a></li>
         <li><a href="peopleView.php">View People</a></li>
         <li><a href="individualView.php">View Individual people</a></li>
         <li><a href="deathView.php">Death Information</a></li>
         <li><a href="birthView.php">Birth Information</a></li>
         <li><a href="inbox.php"><?php 
         include_once('connection.php');
         $sqll = "SELECT * FROM message where reading='off' AND reciever_email='admin@census.com'";
$result = mysqli_query($conn, $sqll);

if($no=mysqli_num_rows($result)>0){
echo "<span class='badge'>".mysqli_num_rows($result)."</span>";


} else{
  
}
?>Message <span class="glyphicon glyphicon-envelope"></span></a></li>

        <li><a href="change_pwd.php">change password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
     
    </div>
    


    <?php include_once('ad_material/insert.php'); ?>
  </div>
</div>

<footer class="container-fluid text-center ">
  <h2>Footer</h2>
</footer>


</body>
</html>

