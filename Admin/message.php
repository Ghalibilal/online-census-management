
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
        <li><a href="individualView.php">View Individual people</a></li>
        <li><a href="deathView.php">Death Information</a></li>
        <li><a href="">Birth Information</a></li>
        <li  class="active"><a href=""><?php 
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
     
       
       <div class='col-sm-8'>
         <ul class="nav nav-pills" style='margin-left:100px;'>
  <li><a href="inbox.php"> <span class="glyphicon glyphicon-inbox"></span>  Inbox</a></li>
  <li class="active"><a href="#" style='border:1px solid black;border-radius:50%;padding:10px;'> <span class="glyphicon glyphicon-plus"></span>Compose</a></li>
  
</ul>
       
        
      
         <form action="" method='post'>
      <table>
    
      
      <tr>
        <td>To:</td>
        <td><input type="email" name='to' class="form-control" placeholder="Enter the gmail of reciever"  required></td>

      </tr>
       
       <tr>
        <td>Message: </td>
        <td><textarea name='message' cols='60' rows='12'>Message:</textarea></td>
      </tr>
      <tr>

        <td></td>
        <td><input name="submit" class='btn btn-block btn-success' type="submit" value="Send"></td>
      </tr>
      </table>
       
</div>
      
      









    </div>
  </body>
  </html>
  <?php
  include_once('connection.php');
  if(isset($_POST['submit']))
  {
    $to=strtolower($_POST['to']);
  
    $message=$_POST['message'];
    $sql="INSERT INTO message(sender_email,reciever_email,subject,message,reading,sender) VALUES('admin@census.com','$to','admin','$message','off','admin')";
    if(mysqli_query($conn,$sql)){
      echo "<script>alert('Message is successfully send');</script>";
    }
    else
    {
      echo "ERROR:".mysqli_error($conn);
    }
  }










  ?>