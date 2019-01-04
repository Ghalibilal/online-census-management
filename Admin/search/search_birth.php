<?php
include('../session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>EMPLOYEE VIEW</title>
  
  <?php include_once('../ad_material/main_style.php');?>
</head>
<body>
  <footer class="container-fluid text-center ">
  <p>Admin Dashboard</p>
</footer>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <br>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="../admin.php">Insert Employee</a></li>
        <li ><a href="../emp_view.php">View Employee</a></li>
        <li ><a href="../peopleView.php">View People</a></li>
        <li><a href="../individualView.php">View Individual people</a></li>
        <li><a href="../deathView.php">Death Information</a></li>
        <li class="active"><a href="../birthView.php">Birth Information</a></li>
           <li><a href="../inbox.php">Message <span class="glyphicon glyphicon-envelope"></span></a></li>
        


        <li><a href="../change_pwd.php">change password</a></li>
        <li><a href="../logout.php">Logout</a></li>
      </ul><br>
     
    </div>
    <div class="rightside">
      
       <h5 style='color:green;text-align:center;'>Birth Information</h5>
       <div class='col-sm-1'></div>
       <div class='col-sm-10'>
        
      <table class="table table-striped table-bordered  text-capitalize bg-info text-primary">
         <tr><form class="navbar-form navbar-left" method='post' action="">
      <div class="form-group">
       <td colspan='2'> <input type="text" name='name' class="form-control" placeholder="Search"></td>
      
    <td><input type='submit' class='btn btn-primary btn-block' name='submit' value='search'></td>
  </tr>
   

      
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Fathername</th>
    
        <th>Gender</th>
        <th>Age</th>
        <th>District</th>

      </tr>
    
    <?php
    if(isset($_POST['submit'])){
      include_once('../connection.php');
      $search=$_POST['name'];
    
      
     
      
      $sql = "SELECT * FROM birth WHERE (name LIKE '%$search%' OR father_name like '%$search%')order by id desc ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
           $emp_id=$row['emp_id'];
       ?>
    <tbody>
      <tr>
      
        <td><?php echo $row['id'];?></td>
         <td><?php echo $row['name'];?></td>
        <td><?php echo $row['father_name'];?></td>
      
        <td ><?php echo $row['gender'];?></td>
        <td ><?php echo $row['birthday'];
?></td>

<td ><?php $querry="SELECT district FROM employee WHERE id='$emp_id'";
$res=mysqli_query($conn,$querry);
while($rows=mysqli_fetch_assoc($res)){
  echo $district=$rows['district'];
}
?></td>

       
       
      
      </tr>
      <?php     }
} else {
    echo "0 results";
}
}
?>
 </tbody>
  </table>

  
</div>
      
      









    </div>
  </body>
  </html>