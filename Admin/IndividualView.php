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
        <li ><a href="peopleView.php">View People</a></li>
        
                <li class="active"><a href='#view people'>View Individual People</a></li>
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
       <h3 style='color:green;text-align:center;'>Individual People</h3>
      <div class='col-sm-10'>
        
      <table class="table table-striped  table-bordered text-capitalize bg-success">
       <form class="navbar-form navbar-left" method='post' action="search/search_individual.php">
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
       
        <th>Religion</th>
        <th>Education</th>
        <th>Qualification</th>
        <th>Job</th>
        <th>Tongue</th>
        <th>District</th>
        
      </tr>
    </thead>
    <?php
      include_once('connection.php');
     
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
INNER JOIN individual ON people.serial_no=individual.individual_id  order by people.emp_id LIMIT ".$page1.",5";
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
INNER JOIN individual ON people.serial_no=individual.individual_id  ";
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
</body>
</html>