<?php
include('session.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Change Password</title>
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

        <li class="active"><a href="change_pwd.php">change password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
     
    </div>
    
    <div class="rightside">
     
      <h4 class='text-center'> Change Password</h4><br>
    
            </div>

      <div class="col-sm-6 col-sm-offset-2">
      
    
      <form action="" method='post'>
      <table class="table table-striped table-bordered">
    
      <tr>
        <td>Old password</td>
        <td><input type="password" class="form-control"   name="old_pwd"  pattern="[A-Za-z]*[0-9]*" required></td>

      </tr>
      <tr>
        <td>New Password:</td>
        <td><input type="password" class="form-control"  class="form-control"   name="new_pwd"  pattern="[A-Za-z]*[0-9]*" minlength="6" maxlength='16'required></td>
      </tr>  
       <tr>
        <td>Confirm new Password</td>
        <td><input type="password" class="form-control"   name="con_pwd"  pattern="[A-Za-z]*[0-9]*" minlength="6" maxlength='16' required></td>
      </tr>
      <tr>
    
    <td colspan='2'> <input name="submit" class='form-control bg-success text-success' type="submit" value="Chaange Password"></td>
  <tr>
        </table>
</form>
<?php
if(isset($_POST['submit']))
{
  $new_pwd=$_POST['new_pwd'];
  $old_pwd=$_POST['old_pwd'];
  $con_pwd=$_POST['con_pwd'];
  include_once('connection.php');
  $pwd=$_SESSION['login_user'];
   $sql = "SELECT * FROM admin WHERE cnic='$pwd'";
$result = mysqli_query($conn, $sql);

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $pass=$row['Password'];
      if($pass==$old_pwd){
        if($new_pwd==$con_pwd){
        $sql="UPDATE admin SET Password='$new_pwd'";
        if(mysqli_query($conn, $sql)){
          echo "Password is successfully Change";
        }
      }
      else
      {
        echo "<font color='red'> password does not match</font>";
      }

      }
      else
      {
        echo "<font color='red'>Old password is incorrect</font>";
      }

      }
    
    
}
?>
      
       
        </div>
      </div>
    </div>
    
  </div>
</div>



</body>
</html>

