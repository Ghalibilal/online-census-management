<?php
include('../session.php');



      
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
      <span><img src="../../image/census.jpg" height="50px" ></span>   <h4>Online Census</h4>      
     

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
        <li ><a href="../employee.php">Add Family</a></li>
        <li class="active"><a href="../people_view.php">View Family</a></li>
        <li><a href="../individual/individual_form.php" >Add Individual</a></li>
        <li><a href="../individual/individual_view.php">View Individual</a></li>
        <li><a href="../death_view.php">Death information</a></li>
        <li><a href="../birth_view.php">Birth information</a></li>
         <li><a href="../inbox.php"><?php 
         include_once('../connection.php');
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
    include('../connection.php');
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
      
      <li role="presentation"><a role="menuitem" tabindex="-1" href="../setting/change_profile.php?view=<?php echo $edit;?>">Edit Profile </a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="../setting/change_pswd.php">Change Password</a></li>
      
    </ul>
  </a></li>
        <li><a href="../logout.php">logout</a></li>

 
    </div>
  </div>
</nav>

<div class='col-sm-2'>
  <h1></h1>
<?php $h_id=$_GET['h_id']; ?>
    <ul class="nav nav-pills nav-stacked bg-info">
      <li> <a href="../family_view.php?h_id=<?php echo $h_id;?>" >Family</a></li>
      <li > <a href="add_member.php?h_id=<?php echo $h_id;?>">Add Member</a></li>
      <li > <a href="add_birth.php?h_id=<?php echo $h_id;?>">Add new birth</a></li>
      <li> <a href="view_birth.php?h_id=<?php echo $h_id;?>">view birth</a></li>
      <li class="active"> <a href="#">death information</a></li>
      
    </ul>
    
  
</div>
<div class="container_fluid col-sm-offset-1 col-sm-7 ">
 
       <h3 style='color:green;text-align:center;'> DEATH INFORMATION</h3>
   <div class='col-sm-offset-2'>
    <table class="table table-striped table-bordered table-condensed text-capitalize bg-info text-primary">
      <thead>

      
      <tr>
        <th>Serial_No</th>
        <th>Name</th>
        <th>Father_Name</th>
        
        <th>Gender</th>
        <th>age</th>
         <th>Delete</th>
        
        
        
      

      </tr>
    </thead>
  <?php $h_id=$_GET['h_id'];
   $sql = "SELECT *
FROM death WHERE head_id='$h_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
      ?>
    <tbody>
      <tr>
       <?php
              
 
//Get the timestamp of the person's date of birth.
              $age=$row['age_of_death'];
             $age=strtotime($age);

$dob = $row['birthday'];
$dob=strtotime($dob);
$agee=$age-$dob;
$agee= floor($agee / 31556926);

 
//Calculate the difference between the two timestamps.
 
//There are 31556926 seconds in a year.
 
//Print it out.

       ?>

        <td><?php echo $id=$row['id'];?></td>
         <td><?php echo $row['name'];?></td>
        <td><?php echo $row['father_name'];?></td>
        
        <td ><?php echo $row['gender'];?></td>
        <td ><?php echo $agee;
?></td>
        <td><a class='btn btn-danger' href="birth_delete.php?id=<?php echo $id;?>"  onclick='return confirm("Are you sure to delete");'>Delete</a></td>
      
      </tr>
      <?php     }
} else {
    echo "0 results";
}
?>
 </tbody>
  </table>
    
  </div>
  <div class=" col-sm-1 ">
 </div>
</div>
</div>

 </body>
 </html>  

 
 