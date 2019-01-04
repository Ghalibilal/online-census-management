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
    .bod{
        background: #f2f2f2;
        height: 750px;
        font-size: 20px;
    }
    #body{
        height: 750px;
        border: 1px solid #2E2E2E;
        border-radius: 5px;

    }
    .pagination{
      margin-top:30px;
    }
    .pagination li a:active{font-weight: bold;background: green;}

    /* Remove the jumbotron's default bottom margin */ 
     
   
    /* Add a gray background color and some padding to the footer */
    
  </style>
</head>
<body>


  <div class="container text-center">
      <span><img src="../image/census.jpg" height="50px" ></span>   <h4>Online Census</h4>      
     

</div>
<div>
	
<nav class="navbar navbar-inverse" style="margin-left: 20px; margin-right: 20px;">
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
        <li><a href="employee.php">Add Family</a></li>
        <li class='active'><a href="#">View Family</a></li>
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
</div>
<div class="container_fluid" style="margin-left:120px;">
  <h5 style='color:green;text-align:center;'>Click View Family To View Family of head</h5>
       <h5 style='color:green;text-align:center;'>HEAD OF FAMILY</h5>

       <form class="navbar-form navbar-left" method='post' action="search/search_people.php">
      <div class="form-group">
        <input type="text" name='name' class="form-control" placeholder="Search">
      
    <input type='submit' class='btn btn-primary' name='submit' value='search'>
  
    </form>
  </div>
       <div class='col-sm-1'></div>
       <div class='col-sm-10'>
      <table class="table table-striped table-bordered table-condensed text-capitalize bg-info text-primary">
    <thead>

      
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Fathername</th>
        <th>Cnic</th>
        <th>Gender</th>
        <th>age</th>
        <th>Martial_Status</th>
        <th>Religion</th>
        
        <th>Qualification</th>
        <th>Job</th>
        <th>Mother_Tongue</th>
        <th>Family view</th>
        <th>Manage</th>
        <th>Edit</th>

      </tr>
    </thead>
    <?php
      include_once('connection.php');
     $cnic=$_SESSION['login_user'];
      $sqla="SELECT * FROM employee WHERE cnic='$cnic'";
      $result1 = mysqli_query($conn, $sqla);
      while($row1 = mysqli_fetch_assoc($result1)) {
        $emp_id=$row1['id'];
      }
      if(isset($_GET['page']))
      {
        $page=$_GET['page'];
      }
      else
      {
        $page=1;
      }
      if($page==''|| $page==1){
        $page1=0;
      }
      else
      {
        $page1=($page*5)-5;
      }
      
      $sql = "SELECT people.*
FROM people
INNER JOIN head_family ON people.serial_no=head_family.head_id AND people.emp_id='$emp_id' order by people.serial_no LIMIT ".$page1.",5";
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
        
        <td><?php echo $row['qualification']?></td>
        <td><?php echo $row['job'];?></td>
        <td><?php echo $row['tongue'];?></td>
        <td><a class="btn btn-success" href="family_view.php?h_id=<?php echo $row['serial_no'];?> ">View Family</a></td>
        <td><div class="dropdown">
          <?php  $id=$row['serial_no'];?>
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a class='btn btn-info' href="management/change_death.php?id=<?php echo $id;?>"><b>Change to death</b></a></li>
      <li><a class='btn btn-danger' href="management/Delete_head.php?delete=<?php echo $id;?>" onclick='return confirm("Are you sure to delete");'>Delete</a></li>
      
    </ul>
  </div>
</div>
</td>
      
        <td><a class="btn btn-primary" href="edit/edit_head.php?edit_h=<?php echo $row['serial_no'];?>">Edit</a></td>
       
      
      </tr>
      <?php     }
} else {
    echo "0 results";
}
?>
 </tbody>
  </table>

  <?php
 $sql = "SELECT people.*
FROM people
INNER JOIN head_family ON people.serial_no=head_family.head_id AND people.emp_id='$emp_id' ";
$data=mysqli_query($conn,$sql);
$record=mysqli_num_rows($data);
$record_pages=ceil($record/5);
$prev=$page-1;
$next=$page+1;
echo "<ul class='pagination'>";
if($prev>=1)
{
   echo '<li><a href="?page='.$prev.'">prev</a></li>';
}

if($record_pages>=2){
  for ($i=1; $i <=$record_pages ; $i++) { 
   
    echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
    # code...
  }
}
if($next<=$record_pages&&$next>=2)
{
   echo '<li><a href="?page='.$next.'">next</a></li>';
}
echo "</ul>";
mysqli_close($conn);

?>
</div>
      
      
   
     
      
      
       
        </div>
      </div>
    </div>
    
  </div>
</div>