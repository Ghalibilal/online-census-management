<?php
include('session.php');


      
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online census</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-left: 10px;
  margin-right: 6px;
      border: 2px solid gray;
  border-top-left-radius: 50px;
  border-bottom-right-radius: 50px;
  padding: 6px;
  color: white;
  
    }
    .tabl{
     background-color:rgb(240, 240, 240);
      color:green;

    }
    
    /* Remove the jumbotron's default bottom margin */ 
     
   
    /* Add a gray background color and some padding to the footer */
    
  </style>
</head>
<body>


  <div class="container text-center">
      <span><img src="../image/census.jpg" height="50px" ></span>   <h4>Online Census</h4>      
     

</div>
<div>
  
<nav class="navbar navbar-inverse " style="margin-left: 20px; margin-right: 20px;">
  <div class="container-fluid row">
    <div class="navbar-header col-sm-12 col-sm-offset-2">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="employee.php">Add Family</a></li>
        <li class="active"><a href="people_view.php">View Family</a></li>
        <li><a href="individual/individual_form.php" >Add Individual</a></li>
        <li><a href="individual/individual_view.php">View Individual</a></li>
        <li><a href="death_view.php">Death information</a></li>
        <li><a href="birth_view.php">Birth information</a></li>
         <li><a href="inbox.php"><?php 
         include_once('connection.php');
         $cnic=$_SESSION['login_user'];

         $sql="SELECT email FROM employee WHERE cnic='$cnic'";
         $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
          $email=$row['email'];
        }
      }
       $sqll = "SELECT * FROM message where reading='off' AND reciever_email='$email'";
$result = mysqli_query($conn, $sqll);

if($no=mysqli_num_rows($result)>0){
echo "<span class='badge'>".mysqli_num_rows($result)."</span>";


} else{

}

      ?>Message <span class="glyphicon glyphicon-envelope"></span></a></li>
        <li class="dropdown">
            <a href="" class="dropdown-toggle"  id="menu1" data-toggle="dropdown">Setting
    <span class=" glyphicon glyphicon-cog"></span></a>
    <?php
    include('connection.php');
  $cnic=$_SESSION['login_user'];

         $sql="SELECT id FROM employee WHERE cnic='$cnic'";
         $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
          $edit=$row['id'];
        }
      }
      ?>
    <ul class="dropdown-menu" role="menu" >
      
      <li role="presentation"><a role="menuitem" tabindex="-1" href="setting/change_profile.php?view=<?php echo $edit;?>">Edit Profile </a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="setting/change_pswd.php">Change Password</a></li>
      
    </ul>
  </a></li>
        <li><a href="logout.php">logout</a></li>

 
    </div>
  </div>
</nav>
<div class='col-sm-2'>
  <h4></h4>
       <?php  $h_id=$_GET['h_id'];?>
    <ul class="nav nav-pills nav-stacked bg-info">
      <li class="active"> <a href="#" >Family</a></li>
      <li> <a href="familyDetail/add_member.php?h_id=<?php echo $h_id;?>">Add Member</a></li>
      <li> <a href="familyDetail/add_birth.php?h_id=<?php echo $h_id;?>">Add new birth</a></li>
      <li> <a href="familyDetail/view_birth.php?h_id=<?php echo $h_id;?>">view birth</a></li>
      <li> <a href="familyDetail/death_view.php?h_id=<?php echo $h_id;?>">death information</a></li>

      
    </ul>
    
  
</div>
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
        
        <th>Qualification</th>
        <th>Job</th>
        <th>Mother_Tongue</th>
        <th>Manage</th>
       
        
        <th>Edit</th>

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
 
//Get the timestamp of the person's date of birth.
              $age=$row['age'];

$dob = strtotime($age);
 
//Calculate the difference between the two timestamps.
$difference = $now - $dob;
 
//There are 31556926 seconds in a year.
$age = floor($difference / 31556926);
static $i=1;
$i++;
 $idd=$rows['serial_no'];
 
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
        
        <td><?php echo $rows['qualification']?></td>
        <td><?php echo $rows['job'];?></td>
        <td><?php echo $rows['tongue'];?></td>
        <td><div class="dropdown">
          <?php  $id=$row['serial_no'];?>
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu" >
      <li><a style='color:white; background:black;' class='btn btn-success' href="management/change_death.php?id=<?php echo $idd;?>"><b>Change to death</b></a></li>
      <li><a style='color:white; ' class='btn btn-danger' href="management/Delete_head.php?delete=<?php echo $idd;?>"  onclick='return confirm("Are you sure to delete");'>Delete</a></li>
      
    </ul>
  </div>
</div>
</td>
      
        <td><a class="btn btn-primary" href="edit/edit_head.php?edit_h=<?php echo $idd;?>">Edit</a></td>
      </tr>
      <?php     
} 
     


    
  
      include_once('connection.php');
     $cnic=$_SESSION['login_user'];
       $sqla="SELECT * FROM employee WHERE cnic='$cnic'";
      $result1 = mysqli_query($conn, $sqla);
      while($row1 = mysqli_fetch_assoc($result1)) {
        $emp_id=$row1['id'];
      }
       $h_id=$_GET['h_id'];
       $sql = "SELECT people.*,family.relation_head
FROM people
INNER JOIN family ON family.head_id='$h_id' AND people.emp_id='$emp_id' AND family.family_id=people.serial_no ";
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
      
        <td><?php echo $row['qualification']?></td>
        <td><?php echo $row['job'];?></td>
        <td><?php echo $row['tongue'];?></td>
        <td><div class="dropdown">
          <?php  $id=$row['serial_no'];?>
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a class='btn btn-info' href="management/change_death_family.php?id=<?php echo $id;?>"><b>Change to death</b></a></li>
      <li><a class='btn btn-danger' href="management/Delete_family.php?delete=<?php echo $id;?>"  onclick='return confirm("Are you sure to delete");'>Delete</a></li>
       <li><a class='btn btn-danger' href="management/make_headfamily.php?change_id=<?php echo $id;?>">Make Head</a></li>
        <li><a class='btn btn-danger' href="management/change_headfamily.php?change_id=<?php echo $id;?>">change Family</a></li>
      
    </ul>
  </div>
</div>
</td>
       
        <td><a class="btn btn-primary" href="edit/edit_family.php?edit_h=<?php echo $row['serial_no'];?>">Edit</a></td>
       
      
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
    </body>
    </html>