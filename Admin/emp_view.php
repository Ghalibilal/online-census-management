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
        <li class="active"><a href="#">View Employee</a></li>

          <li><a href="peopleView.php">View People</a></li>
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
      <h4 class='text-center'> View Employees Table</h4><br>
    
    </div>      
    
      
      
      <div class="col-sm-9">

     
    </form>
      <table class="table table-bordered" style='color:green;'>
       <form class="navbar-form navbar-left" method='post' action="search_emp.php">
      <div class="form-group">
        <td colspan='4'><input type="text" name='name' class="form-control" placeholder="Search by name district tehsil cnic etc"></td>
      
   <td colspan='2'> <input type='submit' class='btn btn-primary btn-block' name='submit' value='search'></td>


    </tr>

      
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>FatherName</th>
        <th>CNIC</th>
        <th>area</th>
        <th>Tehsil</th>
        <th>District</th>
        <th>Province</th>
        
        
        <th>Phone</th>
        <th>Email</th>
        
        
        <th>Edit</th>
        <th>Delete</th>

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
      if($page==''|| $page==1||$page<1){
        $page1=0;
      }
      else
      {
        $page1=($page*5)-5;
      }
      
      $sql = "SELECT * FROM employee order by id LIMIT ".$page1.",5";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    
      ?>
    <tbody>
      <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['Father_name'];?></td>
        <td><?php echo $row['cnic'];?></td>
        <td class='text-capitalize'><?php echo $row['area'];?></td>
        <td class='text-capitalize'><?php echo $row['tehsil'];?></td>
        <td class='text-capitalize'><?php echo $row['district'];?></td>
        <td class='text-capitalize'><?php echo $row['province'];?></td>
      
        
        <td><?php echo $row['phone'];?></td>
        <td><?php echo $row['email'];?></td>
        
        
        <td><a class='btn btn-primary' href="Edit/edit_form.php?view=<?php echo $row['id'];?>">Edit</a></td>
        <td>
        <a  class='btn btn-danger' href='Delete.php?delete=<?php echo $row['id'];?>' onclick='return confirm("Are you sure to delete");'>Delete</a></td>     
      </tr>

      <?php     }
} else {
    echo "0 results";
}?>
   
    </tbody>
  </table>
     <?php
$sql = "SELECT * FROM employee ";
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

