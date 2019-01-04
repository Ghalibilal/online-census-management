
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
        <li><a href="people_view.php">View Family</a></li>
        <li><a href="individual/individual_form.php" >Add Individual</a></li>
        <li><a href="individual/individual_view.php">View Individual</a></li>
        <li ><a href="death_view.php">Death information</a></li>
        <li><a href="birth_view.php">Birth information</a></li>
         <li class="active"><a href="inbox.php"><?php 
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
<div class="container_fluid ">
  
       
       <div class='col-sm-1'></div>
       <div class='col-sm-10'>
         <ul class="nav nav-pills" style='margin-left:100px;'>
  <li class="active"><a href="#"> <span class="glyphicon glyphicon-inbox"></span>  Inbox</a></li>
  <li ><a href="message.php" style='border:1px solid black;border-radius:50%;padding:10px;'> <span class="glyphicon glyphicon-plus"></span>Compose</a></li>
  
</ul>
<h3>Unread Messages</h3>
 <table style='height:auto;' class="table table-striped table-bordered  text-capitalize bg-info text-primary">
       
    

      
      <tr>
        <th>No</th>
        <th>Sender</th>
        <th>sender Email</th>
        <th>Read it</th>
         <?php
         $sqll = "SELECT * FROM message where reading='off' AND reciever_email='$email'";
$result = mysqli_query($conn, $sqll);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $id=$row['id'];
      static $i=0;
      $i++;
          
       ?>
    <tbody>
      <tr>
      
        <td><?php echo $i;?></td>
         <td><?php echo $row['subject'];?></td>
        <td><?php echo $row['sender_email'];?></td>
      
        <td ><a class='btn btn-danger' href="reading.php?view=<?php echo $row['id'];?>">Read it</a></td>
      

    <?php }} ?>
       

      </tr>
    </table>
    <h3>Read messages</h3>
    <table class='table table-bordered table-striped'>
      <tr>
        <td>Email</td>
        <td>Sender</td>
        <td colspan='2'>Message</td>
        <td>Reply</td>
        <td>Delete</td>
      </tr>  
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
      
      $sql = "SELECT * from message where reading='on' and reciever_email='$email' order by id DESC LIMIT ".$page1.",5";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $id=$row['id'];
      ?>
    <tbody>
      <tr>
      
       


        <td><?php echo $row['sender_email'];?></td>
        <td><?php echo $row['sender'];?></td>
         <td colspan='2'><?php echo $row['message'];?></td>
        <td><a class='btn btn-success' href="reply.php?view=<?php echo $row['sender_email'];?>">Reply</a></td>
         <td><a class='btn btn-danger' href="deletesms.php?delete=<?php echo $row['id'];?>">Delete</a></td>
        

      
      
      </tr>
      <?php     }
} else {
    echo "0 results";
}
?>
 </tbody>
  </table>

  <?php
 $sql = "SELECT * FROM message where reading='on' and reciever_email='$email' ";
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
  </body>
  </html>
 










  