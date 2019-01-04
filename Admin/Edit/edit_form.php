<?php
include('../session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Employees</title>
  <?php include_once('../ad_material/main_style.php');?>
  <?php include_once('../valid/valid_emp.php');?>
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
        <li ><a href="../emp_view.php">View Employee</a></li>
        <li><a href="../peopleView.php">View People</a></li>
        <li><a href="../individualView.php">View Individual people</a></li>
      
        <li><a href="../deathView.php">Death Information</a></li>
         <li><a href="../birthView.php">Birth Information</a></li>
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
    <div class="rightside">
    
      <h4 class='text-center'> Update Employee  Table</h4><br>


      <div class="col-sm-6 col-sm-offset-2">
      
    <?php
      include_once('../connection.php');
      $edit_id=@$_GET['view'];
      $sql = "SELECT * FROM employee WHERE id='$edit_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
     // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
      ?>
        <form id='form1' action="update.php?edit_id=<?php echo $edit_id?>" method='post'>
      <table class="table table-striped table-bordered">
    
      
      <tr>
        <td>Name:</td>
        <td><input type="name" minlength='3' class="form-control" id='name'  value="<?php echo $row['name']?>" name="name" pattern="[A-Za-z\s]*" required><span class='form_error' id='error_name'></td>

      </tr>
      <tr>
        <td>Father name:</td>
        <td><input type="text"  minlength='3' class="form-control"  value="<?php echo $row['Father_name']?>" id='fname' name="father_name" pattern="[A-Za-z\s]*" required><span class='form_error' id='error_fname'></td>
      </tr>  
       <tr>
        <td>CNIC</td>
        <td><input type="text" class="form-control"  value="<?php echo $row['cnic']?>"  maxlength='15' id='cnic' name="cnic" required pattern="[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}"><span class='form_error' id='error_cnic'></td>
      </tr>
       <tr>
        <td>area</td>
        <td><input type="text" class="form-control"  value="<?php echo $row['area']?>" name="area" id='area' required pattern="[a-zA-Z\s]*"><span class='form_error' id='error_area'></td>
      </tr>
      <tr>
        <td>Tehsil</td>
        <td> <select name="tehsil" class="form-control" >
    <option value="<?php echo $row['tehsil']?>" selected><?php echo $row['tehsil']?></option>
    <?php include_once('tehsil.php');?>
    </td>
      </tr>  
    <tr>
      <td>District</td>
      <td>   <select name="district" class="form-control" >
        <option value="<?php echo $row['district']?>" selected><?php echo $row['district']?></option>
    <?php include_once('districts.php');?>
    </tr>  
   <tr>
    <td>Province</td>
    <td><select name="province" class="form-control" >
    <option value="<?php echo $row['province']?>" selected><?php echo $row['province']?></option>
    <option value="KPK">KPK</option>
    <option value="Sindh">Sindh</option>
    <option value="Punjab">Punjab</option>
    <option value="Balochistan">Balochistan</option>
    <option value="Gilgit Baltistan">Gilgit Baltistan</option>
    <option value='none'>None</option></select>

   </tr>
   <tr><td>Region</td>
    <td><select name="region" class="form-control" >
    <option value="<?php echo $row['region']?>" selected><?php echo $row['region']?></option>
    <option value="urban">Urban</option>
    <option value="rural">Rural</option>
  </td>
  </tr>
   <tr>
    <td>Email</td>
    <td><input type="email" value="<?php echo $row['email']?>" required name="email" id='email' required class="form-control" ><span class='form_error' id='error_email'></td>
   </tr>
   <tr>
    <td>Phone:</td>
    <td><input type="text"  class="form-control"  value="<?php echo $row['phone']?>" id='phone' name="phone" required pattern='[0]{1}[3]{1}[0-4]{1}[0-9]{8}' maxlength='11'><span class='form_error' id='error_cnic'></td>
   </tr>
   <tr>
    
    <td colspan='2'> <input name="submit" class='form-control bg-success text-success' type="submit" value="Update"></td>
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

