
<html lang="en">
<head>
  <title>Online census</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
    <script>
$(document).ready(function(){
  $('#cnic').mask('99999-9999999-9');
    });
</script>
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
          include_once('../session.php');
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
  <h5 style='color:green;text-align:center;'>Enter CNIC of the head family and relation to the head</h5>
<?php
include_once('../session.php');
include_once('../connection.php');
$change_id=@$_GET['change_id'];
echo " <div class='row'>
  <div class='col-md-4 col-sm-4 col-xs-12 col-md-offset-4 form-container'>
        <form  method='post' action=''>
  
      <div class='form-group'>
      <label>CNIC of Head</label>
        <input type='text' name='cnic' id='cnic' required pattern='[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}'maxlength='15' class='form-control' >
        </div>
        <div class='form-group'>
        <label>Relation to head</label>
        <select name='relation' class='form-control'>
    <option value='son'>Son</option>
    <option value='daughter'>Daughter</option>
    <option value='sister'>Sister</option>
    <option value='brother'>Brother</option>
    <option value='wife'>Wife</option>
    <option value='husband'>Husband</option>
    <option value='daughter-in-law'>Daughter-in-Law</option>
    <option value='son-in-law'>Son-in-Law</option>
    <option value='grandson'>Grand Son</option>
    <option value='granddaughter'>Grand Daughter</option>
    <option value='other'>Other</option>

  </select>
  </div>
        
      
    <input type='submit' class='btn btn-block btn-primary' name='submit' value='submit'>
  </div>";
  if(isset($_POST['submit']))
  {
  	$cnic=$_POST['cnic'];
  	
  	 $cnic1=$_SESSION['login_user'];
      $sqla="SELECT * FROM employee WHERE cnic='$cnic1'";
      $result1 = mysqli_query($conn, $sqla);
      while($row1 = mysqli_fetch_assoc($result1)) {
        $emp_id=$row1['id'];
      }
    $sql="SELECT * FROM people where cnic='$cnic' AND emp_id='$emp_id'";
   
  $res=mysqli_query($conn, $sql);
  if(mysqli_num_rows($res)>0)
  {
  	while($row=mysqli_fetch_assoc($res))
  	{
  		 $id=$row['serial_no'];
  	}
  	$query="SELECT * FROM head_family where head_id='$id'";
  	$result=mysqli_query($conn,$query);
  	if(mysqli_num_rows($result)>0){
  		
  	  $que="SELECT * FROM family where head_id='$id' AND family_id='$change_id'";
  	  $ress=mysqli_query($conn,$que);
  	  if(mysqli_num_rows($ress)==0)
  	  {
  	  	$updat="UPDATE family SET head_id='$id',relation_head='relation' Where family_id='$change_id' ";
  	  	if($rs=mysqli_query($conn,$updat))
  	  	{
  	  		    echo "<script>alert('person head Successfully  change')</script>"; 
      //header("'refresh:1','url=../family_view.php?h_id=$id'"); 
              echo "<script>
setTimeout(function() {
  window.location.href = '../people_view.php';
}, 3000);
</script>";
  	  	}
  	  	else
  	  	{
  	  		echo mysqli_error($rs);
  	  	}
  	  }
  	  else
  	  {
  	  	echo "this person is already in this family";
  	  }
  	}
  	else{
  		echo 'this cnic not belong to Head';
  	}

  }
  else
  {
  	echo "this cnic is not exist in record";
  }

   
  }
?>