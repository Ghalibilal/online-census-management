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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
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
  <?php include_once('../valid/valid_head.php');?>
</head>
<body>


  <div class="container text-center">
      <span><img src="../image/census.jpg" height="50px" ></span>   <h4>Online Census</h4>      
     

</div>
  
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
      
      <li role="presentation"><a role="menuitem" tabindex="-1" href="../setting/change_profile.php?view=<?php echo $edit;?>">Edit Profile </a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="../setting/change_pswd.php">Change Password</a></li>
      
    </ul>
  </a></li>
        <li><a href="../logout.php">logout</a></li>

 
    </div>
  </div>
</nav>
<div class='container'>
<div class="col-sm-12 tabl">
  <h4 align="center"> UPDATE RECORD of HEAD OF FAMILY</h4><br>
      
    <table class="table table-bordered table-striped">

 <?php
      include_once('../connection.php');
      $edit_h=$_GET['edit_h'];
      $sql = "SELECT people.*,head_family.houseType
FROM people
INNER JOIN head_family ON people.serial_no='$edit_h' AND head_family.head_id='$edit_h'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
     // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
      ?>
       <form id='form1'  action='update_head.php?edit_he=<?php echo $edit_h?>' method='post'>
    
      <tr>
        <td> <label for="name">Name:</label></td>
        <td><input type="name" id='name' minlength='3' class="form-control"  placeholder="Enter Name" name="name"  pattern="[A-Za-z\s]+" value='<?php echo $row['name'];?>' required><span class='form_error' id='error_name'></span></td>
        <td> <label for="father_name">Father Name:</label></td>
        <td>  <input type="text" id='fname' minlength='3' class="form-control"  placeholder="Enter father_name" name="father_name" pattern="[A-Za-z\s]*" value='<?php echo $row['fatherName'];?>' required ><span class='form_error' id='error_fname'></span></td>
      </tr>
    <tr><td><br></td></tr>
      <tr>
        <td> <label for="Cnic">Cnic:</label></td>
        <td> <input type="text" id='cnic' class="form-control" required placeholder="Enter Cnic with e.g 15302-6769504-1" maxlength='15' name="cnic" value='<?php echo $row['cnic'];?>' pattern="[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}"><span class='form_error' id='error_cnic'></span></td>

        <td> <label for="Gender">Gender:</label></td>
        <td><div class="radio">
  <label><input type="radio" name="gender" checked value=<?php echo $row['gender'];?>   checked><?php echo $row['gender'];?></label>
</div>

        <div class="radio">
  <label><input type="radio" name="gender" value='male'>Male</label>
</div>
<div class="radio">
  <label><input type="radio" name="gender" value='female'>Female</label>
</div>
<div class="radio">
  <label><input type="radio" name="gender" value='other'>Other</label>
</div>
</td>
      </tr>
      <tr><td><br></td></tr>
      <tr>
        <td><label for="Birthday">Birthday:</label></td>
        <td><input type='date' id='date' name='birthday' value="<?php echo $row['age'];?>"><span class='form_error' id='error_date'></span></td>
        <input type='hidden' id='da' value="<?php echo date('Y-d-m');?>">

        <td><label for="district">Martial status:</label></td>


        <td><select name="martial_status" class='form-control'>
          <option value="<?php echo $row['martial_status'];?>"><?php echo $row['martial_status'];?></option>
    <option value="married">Married</option>
    
    <option value="divorce">Divorce</option>
    <option value="widow">Widow</option>
  </select></td>

      </tr>
      <tr><td><br></td></tr>
      <tr>
        <td><label for="religion">RELIGION</label></td>
        <td><select name="religion" class='form-control'>
          <option value="<?php echo $row['religion'];?>"><?php echo $row['religion'];?></option>
    <option value="muslim">Muslim</option>
    <option value="hindu">Hindu</option>
    <option value="christan">Christan</option>
    <option value="qadyani">Qadyani</option>
    <option value="other">Other</option>
    
  </select></td>
  <td><label for="tongue">Mother Tongue:</label></td>
        <td><select name="tongue" class='form-control'>
           <option value="<?php echo $row['tongue'];?>"><?php echo $row['tongue'];?></option>
    
    <option value="urdu">Urdu</option>
    <option value="pashto">Pashto</option>
    <option value="punjabi">Punjabi</option>
    <option value="sindhi">Sindhi</option>
    <option value="Balochi">Balochi</option>
    <option value="Kashmire">Kashmire</option>
    <option value="Sarayeke">Sarayeke</option>
    <option value="Hindko">Hindko</option>
    <option value="Barahve">Barahve</option>
    <option value='other'>other</option>
  </select></td>
      </tr>
      <tr><td><br>
      </td></tr>
      <tr>
        <td><label for="qualification">Qualification</label></td>
        <td><select name="qualification" class='form-control'>
           <option value="<?php echo $row['qualification'];?>"><?php echo $row['qualification'];?></option>
          <option value="Noeducation">No Education</option>
          <option value="Under Primary">Under Primary</option>
          <option value="Primary">Primary</option>
          <option value="middle">middle</option>
    <option value="matric">Matric</option>
    <option value="intermediate">Intermediate</option>
    <option value="bachelor">bachelor</option>
    <option value="master">Master</option>
    <option value="mphil">MPHIL</option>
    <option value='phd'>PHD</option>
    <option value="diploma">Diploma</option>
    <option value="less than five">Less than Five years</option>
  </select></td>
     <td><label for="education">EDUCATION:</label></td>
        <td ><select name="education" class='form-control'>
           <option value="<?php echo $row['education_status'];?>"><?php echo $row['education_status'];?></option>
    
    <option value="educated">educated</option>
    <option value="uneducated">Uneducated</option>
    <option value="less than five">less than 5 years</option></td>
     

      </tr>
      <tr><td><br></td></tr>
       <tr>
        <td  class='text-center'><label for="job">Job</label></td>
        <td><select name="job" class='form-control'>
      <option value="<?php echo $row['job'];?>"><?php echo $row['job'];?></option>
         
    <option value="teacher">Teacher</option>
    <option value="doctor">Doctor</option>
    <option value="engineer">Engineer</option>
    <option value="businessman">Businessman</option>
    <option value="student">Student</option>
    <option value="less than five">Less than Five years</option>
    <option value="no job">No Job</option>
    <option value='other'>Other</option>
  </select></td>
  <td  class='text-center'><label for="job">House type</label></td>
        <td><select name="houseType" class='form-control'>
          <option value="<?php echo $row['houseType'];?>"><?php echo $row['houseType'];}}?></option>
    <option value="joint house">Joint House</option>
    <option value="common house">Common House</option>
    
    <option value="homeless">Homeless</option>
    
  </select></td>
  
  <tr>

    <tr>
      <td colspan='4' align="center"><input name="submit"  class='btn btn-block btn-success' class='form-control bg-success text-success ' type="submit" value="UPDATE HEAD"></td>
    </tr>
  
     </form> 
    </table>
 
        </div>
      </div>
    </div>
  </div>
</body>
</html>