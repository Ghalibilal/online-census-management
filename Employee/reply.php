<?php
include('session.php');
include_once('connection.php');
  $cnic=$_SESSION['login_user'];

         $sql="SELECT email,name FROM employee WHERE cnic='$cnic'";
         $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
          $email=$row['email'];
           $name=$row['name'];
        }
      }
  if(isset($_POST['submit']))
  {
    $to=$_POST['too'];
  
    $message=$_POST['message'];
    $sql="INSERT INTO message(sender_email,reciever_email,subject,message,reading,sender) VALUES('$email','$to','$name','$message','off','employer')";
    if(mysqli_query($conn,$sql)){
    echo "<script>alert('Message successfully send')";
    //header('location:inbox.php');
    
    }

    else
    {
      echo "ERROR:".mysqli_error($conn);
    }
  }

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
        <li><a href="people_view.php">View Family</a></li>
        <li><a href="individual/individual_form.php" >Add Individual</a></li>
        <li><a href="individual/individual_view.php">View Individual</a></li>
        <li ><a href="death_view.php">Death information</a></li>
        <li><a href="birth_view.php">Birth information</a></li>
        <li class='active'><a href="inbox.php"><?php 
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
echo "<span class='badge'>$no</span>";

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
<div class="container_fluid ">
  
       
       <div class='col-sm-1'></div>
       <div class='col-sm-10'>
         <ul class="nav nav-pills" style='margin-left:100px;'>
  <li><a href="inbox.php"> <span class="glyphicon glyphicon-inbox"></span>  Inbox</a></li>
  <li class="active"><a href="message.php" style='border:1px solid black;border-radius:50%;padding:10px;'> <span class="glyphicon glyphicon-plus"></span>Compose</a></li>
  
</ul>
       
        
      
         <form action="" method='post'>
      <table>
    
      <?php $reciever=@$_GET['view'];?>
      <tr>
        
        <td><input  type="hidden" name='too' value='<?php echo $reciever;?>' class="form-control" placeholder="Enter the gmail of reciever"  required ></td>

      </tr>
     
       <tr>
        <td>Message: </td>
        <td><textarea name='message' cols='60' rows='12'></textarea></td>
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
  