<?php
include('../session.php');
?>
<html lang="en">
<head>
  <title>Online census</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
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
    </style>
</head>
<body>
   <div class="container text-center">
      <span><img src="../../image/census.jpg" height="50px" ></span>   <h4>Online Census</h4>      
     

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
        <li><a href="../employee.php">Add Family</a></li>
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
  <h5 style='color:green;text-align:center;'>Enter the house type of the head family</h5>
<?php
include_once('../session.php');
include_once('../connection.php');
$change_id=@$_GET['change_id'];
$sql="SELECT * from people where serial_no='$change_id' ";
if($ress=mysqli_query($conn,$sql))
{
	while($row=mysqli_fetch_assoc($ress)){
	$emp_id=$row['emp_id'];
	$cnic=$row['cnic'];
  $martial_status=$row['martial_status'];
  if($martial_status=='unmarried')
  {
    echo "<script>alert('Head must be not Unmarried,')</script>"; 
      header("refresh:0;url='../people_view.php'"); 
      exit();
  }
	if(!empty($cnic))
	{
       echo "<f<div class='row'>
  <div class='col-md-4 col-sm-4 col-xs-12 col-md-offset-4 form-container'>
        <form  method='post' action=''>
      <div class='form-group'>
      <label>House type</label>
         <select name='house_type' class='form-control'>
    <option value='joint house'>Joint House</option>
    <option value='common house'>Common House</option>
    <option value='Homeless'>Homeless</option>
    </select>
    </div>
    <div class='form-group'>

    <input type='submit' class='btn btn-block btn-primary' name='submit' value='submit'>
  </div>";
  if(isset($_POST['submit']))
  {
   $house=$_POST['house_type'];
   $query="INSERT INTO head_family(head_id,emp_id,houseType,head_f) VALUES('$change_id','$emp_id','$house','head')";
   if($res=mysqli_query($conn,$query))
   {
         $sql="DELETE FROM family WHERE family_id='$change_id'";
         if(mysqli_query($conn,$sql))
         {
           echo "<script>alert('Person has made the Head of Family')</script>"; 
     header("refresh:0;url='../people_view.php'"); 
         }
   }
   else
   {
    echo mysqli_error($res);
   }
  }
	}
	else{
		
		echo "<script>alert('please fill cnic of person then try')</script>"; 
      header("refresh:0;url='../people_view.php'"); 
	}
	
	}
}
else
{
	echo mysqli_error($ress);
}
?>