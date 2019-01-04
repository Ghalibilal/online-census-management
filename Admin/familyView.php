<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>EMPLOYEE VIEW</title>
  
  <?php include_once('ad_material/main_style.php');?>
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
        <li><a href="admin.php">Insert Employee</a></li>
        <li ><a href="emp_view.php">View Employee</a></li>
        <li class="active"><a href="peopleView.php">View People</a></li>
        <li ><a href="IndividualView.php">View Individual People</a></li>
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
    <div class="rightside">
      <div class="container_fluid col-sm-offset-2 ">
 
       <h3 style='color:green;text-align:center;'> FAMILY INFORMATION</h3>
      <table class="table table-striped table-bordered table-condensed text-capitalize bg-danger text-primary text-center" style='color:blue;'>
    <thead>

      
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Fathername</th>
        <th>Relation</th>

      
        <th>Gender</th>
        <th>age</th>
        <th>Martial Status</th>
        <th>Religion</th>
        <th>Education</th>
        <th>Qualification</th>
        <th>Job</th>
        <th>Tongue</th>
         
      </tr>
    </thead>
    <?php
     include_once('connection.php');
     $h_id=$_GET['h_id'];
     $query="SELECT * FROM people WHERE serial_no='$h_id'";
     $res=mysqli_query($conn,$query);
     while($rows=mysqli_fetch_assoc($res)){
      $cnic1=$rows['cnic'];
     $now = time();
   $age=$rows['age'];
$dob = strtotime($age);
 
//Calculate the difference between the two timestamps.
$difference = $now - $dob;
 
//There are 31556926 seconds in a year.
$age = floor($difference / 31556926);
static $i=1;
$i++;

 
//Print it out.

       ?>
       <tr>

        <td>1</td>
         <td><?php echo $rows['name'];?></td>
        <td><?php echo $rows['fatherName'];?></td>
        <td>Head</td>
       
         <td><?php echo $rows['gender'];?></td>
        <td><?php echo $age;
?></td>
        <td ><?php echo $rows['martial_status'];?></td>
        <td ><?php echo $rows['religion'];?></td>
        <td ><?php echo $rows['education_status'];?></td>
        <td><?php echo $rows['qualification']?></td>
        <td><?php echo $rows['job'];?></td>
        <td><?php echo $rows['tongue'];?></td>
      
       
      
      </tr>
      <?php     
} 
     


    
  
      include_once('connection.php');
     
       $h_id=$_GET['h_id'];
       $sql = "SELECT people.*,family.relation_head
FROM people
INNER JOIN family ON family.head_id='$h_id' AND family.family_id=people.serial_no ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
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
static $i=0;
$i++;

 
//Print it out.

       ?>

        <td><?php echo $i;?></td>
         <td><?php echo $row['name'];?></td>
        <td><?php echo $row['fatherName'];?></td>
        <td><?php echo $row['relation_head'];?></td>
       
        <td ><?php echo $row['gender'];?></td>
        <td ><?php echo $age;
?></td>
        <td ><?php echo $row['martial_status'];?></td>
        <td ><?php echo $row['religion'];?></td>
        <td ><?php echo $row['education_status'];?></td>
        <td><?php echo $row['qualification']?></td>
        <td><?php echo $row['job'];?></td>
        <td><?php echo $row['tongue'];?></td>
        
      </tr>
      <?php     }
} else {
    echo "0 results";
}
?><tr style='background:black; color:white;'>

  <td colspan='2'></td>
<td colspan='3'>CNIC of Head:</td>
<td colspan='3'><?php echo $cnic1;?></td>
<td colspan='2'>Total number of People:</td>
<td><?php echo $i;?></td>
<td colspan='3'></td>

</tr>
 </tbody>

  </table>









    </div>
  </body>
  </html>