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
        <li class="active"><a href="../peopleView.php">View People</a></li>
        <li><a href="../individualView.php">View Individual people</a></li>
        <li><a href="../deathView.php">Death Information</a></li>
         <li><a href="../birthView.php">Birth Information</a></li>
           <li><a href="../inbox.php"><?php 
         include_once('../connection.php');
         $sqll = "SELECT * FROM message where reading='off' AND reciever_email='admin@census.com'";
$result = mysqli_query($conn, $sqll);

if($no=mysqli_num_rows($result)>0){
echo "<span class='badge'>".mysqli_num_rows($result)."</span>";


} else{
  
}
?>Message <span class="glyphicon glyphicon-envelope"></span></a></li>


        <li><a href="../change_pwd.php">change password</a></li>
        <li><a href="../logout.php">Logout</a></li>
      </ul><br>
     
    </div>
    <div class="rightside">
      <h5 style='color:green;text-align:center;'>Click View Family To View Family of head</h5>
       <h5 style='color:green;text-align:center;'>HEAD OF FAMILY</h5>
       <div class='col-sm-1'></div>
       <div class='col-sm-10'>
        
      <table class="table table-striped table-bordered  text-capitalize bg-info text-primary">
       <form class="navbar-form navbar-left" method='post' action="">
      <div class="form-group">
        <td colspan='4'><input type="text" name='name' class="form-control" placeholder="Search"></td>
      
   <td colspan='2'> <input type='submit' class='btn btn-primary btn-block' name='submit' value='search'></td>


    </tr>


      
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Fathername</th>
        <th>Cnic</th>
        <th>Gender</th>
        <th>age</th>
        <th>Martial Status</th>
        <th>Religion</th>
        <th>Education</th>
        <th>Qualification</th>
        <th>Job</th>
        <th>Tongue</th>
        <th>District</th>
        <th>Family view</th>
        

      </tr>
    </thead>
    <?php
    if(isset($_POST['submit']))
    {
      include_once('../connection.php');
    $search=strtolower($_POST['name']);
      
     
      $sql = "SELECT people.*
FROM people
INNER JOIN head_family ON people.serial_no=head_family.head_id AND (people.name LIKE '%$search%' OR people.fatherName LIKE '%$search%' OR people.cnic like '$search' ) order by people.emp_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
          $emp_id=$row['emp_id'];
      ?>
    <tbody>
      <tr>
       <?php
              $now = time();
 
//Get the timestamp of the person's date of birth.
              $age=$row['age'];

$dob = strtotime($age);
 
//Calculate the difference between the two timestamps.
$difference = $now - $dob;
 
//There are 31556926 seconds in a year.
$age = floor($difference / 31556926);
 
//Print it out.

       ?>

        <td><?php echo $row['serial_no'];?></td>
         <td><?php echo $row['name'];?></td>
        <td><?php echo $row['fatherName'];?></td>
        <td ><?php echo $row['cnic'];?></td>
        <td ><?php echo $row['gender'];?></td>
        <td ><?php echo $age;
?></td>
        <td ><?php echo $row['martial_status'];?></td>
        <td ><?php echo $row['religion'];?></td>
        <td ><?php echo $row['education_status'];?></td>
        <td><?php echo $row['qualification']?></td>
        <td><?php echo $row['job'];?></td>
        <td><?php echo $row['tongue'];?></td>
        <td><?php $querry="SELECT district FROM employee WHERE id='$emp_id'";
$res=mysqli_query($conn,$querry);
while($rows=mysqli_fetch_assoc($res)){
  echo $district=$rows['district'];
}
?></td>
        <td><a class="btn btn-success" href="../familyView.php?h_id=<?php echo $row['serial_no'];?> ">View Family</a></td>
       
       
      
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