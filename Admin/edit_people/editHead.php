<?php
include('../session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>EMPLOYEE VIEW</title>
  
  <?php include('../ad_material/main_style.php');?>
  
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
        <li><a href="../admin.php">Insert Employee</a></li>
        <li><a href="#">View Employee</a></li>

         <li><a href="../peopleView.php">View People</a></li>
         <li><a href="../individualView.php">View Individual people</a></li>
           <li><a href="../inbox.php"><?php 
         include_once('../connection.php');
         $sqll = "SELECT * FROM message where reading='off' AND reciever_email='admin@census.com'";
$result = mysqli_query($conn, $sqll);

if($no=mysqli_num_rows($result)>0){
echo "<span class='badge'>".mysqli_num_rows($result)."</span>";

} else{
  
}
?>Message <span class="glyphicon glyphicon-envelope"></span></a></li>
         
        <li><a href="../change_pwd.php">change password</a></li>
        <li><a href="../logout.php">Logout</a></li>
      </ul><br>
     
    </div>
    <div class="rightside col-sm-9">
      
      <h4 id='hi' align="center"> UPDATE RECORD of PEOPLE</h4><br>
      
    <table class="table table-bordered table-striped">

 <?php
      include_once('../connection.php');
      $edit_h=$_GET['edit_h'];
      $sql = "SELECT * FROM people WHERE serial_no='$edit_h'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
     // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
      ?>
       <form  action='update.php?edit_he=<?php echo $edit_h?>' method='post'>
    
      <tr>
        <td> <label for="name">Name:</label></td>
        <td><input type="name" minlength='3' class="form-control" id='name'  placeholder="Enter Name" name="name"  pattern="[A-Za-z\s]+" value'<?php echo $row['name'];?>' required><span class='form-error' id='error_name'></span></td>
        <td> <label for="father_name">Father Name:</label></td>
        <td>  <input type="text" minlength='3' class="form-control"  placeholder="Enter father_name" name="father_name" pattern="[A-Za-z\s]*" value='<?php echo $row['fatherName'];?>' required ></td>
      </tr>
    <tr><td><br></td></tr>
      <tr>
        <td> <label for="Cnic">Cnic:</label></td>
        <td> <input type="text" class="form-control"  placeholder="Enter Cnic with e.g 15302-6769504-1" maxlength='15' name="cnic" value='<?php echo $row['cnic'];?>' pattern="[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}"></td>

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
        <td><input type='date' name='birthday' value=<?php echo $row['age'];?>></td>

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
  <td><label for="tongue">Tongue:</label></td>
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
      <option value="<?php echo $row['job'];?>"><?php echo $row['job'];}}?></option>
         
    <option value="teacher">Teacher</option>
    <option value="doctor">Doctor</option>
    <option value="engineer">Engineer</option>
    <option value="businessman">Businessman</option>
    <option value="student">Student</option>
    <option value="less than five">Less than Five years</option>
    <option value="no job">No Job</option>
    <option value='other'>Other</option>
  </select></td>
  
  <tr>

    <tr>
      <td colspan='4' align="center"><input name="submit" class='form-control bg-success text-success ' type="submit" value="UPDATE RECORD"></td>
    </tr>
  
     </form> 
    </table>
 
        </div>
      </div>
    
      
      </div>
    </body>
    </html>