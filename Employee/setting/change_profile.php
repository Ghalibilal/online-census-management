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

      
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit Profile </a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="change_pswd.php">Change Password</a></li>
      
    </ul>
  </a></li>
        <li><a href="../logout.php">logout</a></li>

 
    </div>
  </div>
</nav>
 <div class="rightside">
    
      <h4 class='text-center'> Update Employee  Table</h4><br>
      <div class="col-sm-6 col-sm-offset-2">
      
    <?php
      include_once('../connection.php');
      $edit_id=$_GET['view'];
      $sql = "SELECT * FROM employee WHERE id='$edit_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
     // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
      ?>
        <form action="update.php?edit_id=<?php echo $edit_id?>" method='post'>
      <table class="table table-striped table-bordered">
    
      <tr>
        <td>Name:</td>
        <td><input type="name" minlength='3' class="form-control"  value="<?php echo $row['name']?>" name="name"  pattern="[A-Za-z\s]+" required></td>

      </tr>
      <tr>
        <td>Father name:</td>
        <td><input type="text" minlength='3' class="form-control"  value="<?php echo $row['Father_name']?>" name="father_name" pattern="[A-Za-z\s]*" required></td>
      </tr>  
       <tr>
        <td>CNIC</td>
        <td><input type="text" class="form-control"  value="<?php echo $row['cnic']?>"  maxlength='15' name="cnic" required pattern="[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}"></td>
      </tr>
       <tr>
        <td>area</td>
        <td><input type="text" class="form-control"  value="<?php echo $row['area']?>" name="area" required pattern="[a-zA-Z\s]*"></td>
      </tr>
      <tr>
        <td>Tehsil</td>
        <td> <select name="tehsil" class='form-control'>
    <option value="<?php echo $row['tehsil']?>" selected><?php echo $row['tehsil']?></option>

    <?php include_once('tehsil.php');?>
      </tr>  
    <tr>
      <td>District</td>
      <td>   <select name="district" class='form-control'>
        <option value="<?php echo $row['district']?>" selected><?php echo $row['district']?></option>
    <?php include_once('district.php');?>
    </tr>  
   <tr>
    <td>Province</td>
    <td><select name="province" class='form-control'>
    <option value="<?php echo $row['province']?>" selected><?php echo $row['province']?></option>
    <option value="KPK">KPK</option>
    <option value="Sindh">Sindh</option>
    <option value="Punjab">Punjab</option>
    <option value="Balochistan">Balochistan</option>
    <option value="Gilgit Baltistan">Gilgit Baltistan</option>
    <option value='none'>None</option></select>

   </tr>
   
   <tr>
    <td>Email</td>
    <td><input type="email" value="<?php echo $row['email']?>" required name="email" class='form-control'></td>
   </tr>
   <tr>
    <td>Phone:</td>
    <td><input type="text" value="<?php echo $row['phone']?>" name="phone" required pattern='[0]{1}[3]{1}[0-4]{1}[0-9]{8}' maxlength='11' class='form-control'></td>
   </tr>
   <tr>
    
    <td colspan='2'> <input name="submit" class='form-control btn-success text-success' type="submit" value="Update"></td>
  <tr><?php }}?>

      
    
  </table>
</form>
     
        
      
       
        </div>
      </div>
    </div>
    
  </div>
</div>



</body>
</html>

