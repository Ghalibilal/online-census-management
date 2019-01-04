<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SEARCH</title>
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
        <li class="active"><a href="emp_view.php">View Employee</a></li>

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
    <div class="rightside">
     
      <h4 class='text-center'> View Employees Table</h4><br>
      <!-- <form action="search_emp" method="POST">
        <div class="col-sm-4 col-sm-offset-4">
          <input type="text" name="search" class="form-control">
          <input type="submit" name="search" value="search" -->
  
        <!-- 
      </form> -->
      
      </div>
      <div class="col-sm-7 ">
        
      <table class="table  bg-info" style='color:green;'>
    </form>
      <table class="table table-striped table-bordered bg-info">
     <table class="table table-bordered  bg-info" style='color:green;'>
       <form class="navbar-form navbar-left" method='post' action="">
      <div class="form-group">
        <td colspan='4'><input type="text" name='name' placeholder='search by name district tehsil etc' class="form-control" placeholder="Search"></td>
      
   <td colspan='2'> <input type='submit' class='btn btn-primary btn-block' name='submit' value='search'></td>
      
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Fathername</th>
        <th>Cnic</th>
        <th>Village</th>
        <th>Tehsil</th>
        <th>District</th>
        <th>Province</th>
        <th>Region</th>
        <th>Phone</th>
        
        <th>Edit</th>
        <th>Delete</th>

      </tr>
    </thead>
    <?php
    if(isset($_POST['submit'])){


      include_once('connection.php');
      $search=strtolower($_POST['name']);

      $sql = "SELECT * FROM employee where (district LIKE '%$search%' OR cnic LIKE '$search' OR name LIKE '%$search%' OR tehsil LIKE '%$search%' OR area LIKE '%$search%' OR email LIKE '%$search%' )";
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
        <td ><?php echo $row['cnic'];?></td>
        <td class='text-capitalize'><?php echo $row['area'];?></td>
        <td class='text-capitalize'><?php echo $row['tehsil'];?></td>
        <td class='text-capitalize'><?php echo $row['district'];?></td>
        <td class='text-capitalize'><?php echo $row['province'];?></td>
        <td class='text-capitalize'><?php echo $row['region'];?></td>
        <td><?php echo $row['phone'];?></td>
        
        <td><a class='btn btn-primary' href="Edit/edit_form.php?view=<?php echo $row['id'];?>">Edit</a></td>
        <td><button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Delete</button><div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Are You really want to delete employee?</h4>
      </div>
      <div class="modal-body">
        <a  class='btn btn-sm btn-danger' href='Delete.php?delete=<?php echo $row['id'];?>'>Yes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
      </div>
      <div class="modal-footer">

      </div>
    </div>

  </div>
</div></td>  
      
      </tr>
      <?php     }
} else {
    echo "0 results";
}
}
mysqli_close($conn);
?>
      
      
    </tbody>
  </table>
     
        
      
       
        </div>
      </div>
    </div>
    
  </div>
</div>



</body>
</html>

