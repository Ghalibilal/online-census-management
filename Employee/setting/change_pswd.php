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
        <li><a href="../people_view.php">View Family</a></li>
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
        <li class="dropdown active">
            <a href="" class="dropdown-toggle"  id="menu1" data-toggle="dropdown">Setting
    <span class=" glyphicon glyphicon-cog"></span></a>
    <ul class="dropdown-menu" role="menu" >
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
      <li role="presentation"><a role="menuitem" tabindex="-1" href="change_profile.php?view=<?php echo $edit;?>">Edit Profile</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Change Password</a></li>
      
    </ul>
  </a></li>
        <li><a href="../logout.php">logout</a></li>

 
    </div>
  </div>
</nav>
<div class='container'>
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
  include_once('../connection.php');
  $pwd=$_SESSION['login_user'];
   $sql = "SELECT * FROM employee WHERE cnic='$pwd'";
$result = mysqli_query($conn, $sql);

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $pass=$row['password'];
      if($pass==$old_pwd){
        if($new_pwd==$con_pwd){
           $cnic=$_SESSION['login_user'];
        $sql="UPDATE employee SET password='$new_pwd' where cnic='$cnic' ";
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

  </div>
  </body>
  </html>