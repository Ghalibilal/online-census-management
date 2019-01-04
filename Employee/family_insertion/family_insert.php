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
   <script>
   $(document).ready(function(){
    $('#cnic').mask("99999-9999999-9");
   });

   </script>
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
    
    /* Remove the jumbotron's default bottom margin */ 
     
   
    /* Add a gray background color and some padding to the footer */
    
  </style>
</head>
<body>


  <div class="container text-center">
      <span><img src="../image/census.jpg" height="50px" ></span>   <h4>Online Census</h4>      
     

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
        <li class="dropdown">
            <a href="" class="dropdown-toggle"  id="menu1" data-toggle="dropdown">Setting
    <span class=" glyphi0con glyphicon-cog"></span></a>
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

       <form  action='' method='post' class='form-inline'>
    
      <label for="name">Total number of family member:</label>
<input type="name" class='form-control'  placeholder="Enter family member number" name="number"  pattern="[0-9]+" required>
<input type='submit' class='btn btn-primary' name='submit' value='Inserted'>
   
</form>
</div>

<?php 
if(isset($_POST['submit'])){
	$number=@$_POST['number'];
	if(!empty($number)){
    
		?>
    <h3 class="text-center"> Family insertion</h3>
		<table class="table table-bordered" style="width:1005; margin-left:5px;">
			<tr>
        <td>No</td>
				<td>name</td>
				<td>fathername</td>
				<td>cnic/Form B</td>
				<td>Relation to Head</td>
				<td>gender</td>
				<td>birthday</td>
				<td>martial_status</td>
				
				<td>Qualification</td>
				<td>Education</td>
				<td colspan='2'>Job</td>
			</tr>
			
          <form method='post'>
           <?php
              for($a=1;$a<=$number;$a++){
              
           ?>
           <input type='hidden' name='number' value='<?php echo $number; ?>'>
        

           <tr>
        <td><?php echo $a;?></td>
        <td>
        <input type="name" class="form-control"  placeholder="Enter Name" name="name[]"  pattern="[A-Za-z\s]+" required>
    </td>
    <td>  <input type="text" class="form-control"  placeholder="Enter father_name" name="father_name[]" pattern="[A-Za-z\s]*" required></td>
    <td> <input type="text" id='cnic' class="form-control"  placeholder="Enter Cnic with e.g 15302-6769504-1" maxlength='15' name="cnic[]"  pattern="[1-6]{1}\d{4}[\-]\d{7}[\-]\d{1}"></td>

        <td><select name="relation[]" class='form-control'>
    <option value="son">Son</option>
    <option value="daughter">Daughter</option>
    <option value="sister">Sister</option>
    <option value="brother">Brother</option>
    <option value="wife">Wife</option>
    <option value="husband">Husband</option>
    <option value="daughter-in-law">Daughter-in-Law</option>
    <option value="son-in-law">Son-in-Law</option>
     <option value="mother">mother</option>
      <option value="father">father</option>
    <option value="grandson">Grand Son</option>
    <option value="granddaughter">Grand Daughter</option>
    <option value="other">Other</option>

  </select></td>

        <td><select name="gender[]" class='form-control' required>
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="other">other</option>
   
  </select></td>
<td><input type='date' name='birthday[]' required></td>

        <td><select name="martial_status[]" class='form-control'>
    <option value="married">Married</option>
    <option value="unmarried">unmarried</option>
    <option value="divorce">Divorce</option>
    <option value="widow">Widow</option>
  </select></td>

    
  <td><select name="qualification[]" class='form-control'>
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
  <td ><select name="education[]" class='form-control'>
    <option value="educated">educated</option>
    <option value="uneducated">Uneducated</option>
    <option value="less than five">less than 5 years</option></td>
     <td colspan='2' ><select name="job[]" class='form-control'>
    <option value="teacher">Teacher</option>
    <option value="doctor">Doctor</option>
    <option value="engineer">Engineer</option>
    <option value="businessman">Businessman</option>
     <option value="student">Student</option>
    <option value="less than five">Less than Five years</option>
    <option value="no job">No Job</option>

    <option value='other'>Other</option>
  </select></td>



			</tr>
      <?php } ?>
       <tr >
        <td colspan='3'></td>
      <td colspan='4' align="center"><input class='btn btn-block btn-success' name="submited" class='form-control bg-danger text-success' type="submit" value="Insert Family"></td>
      <td colspan='4'></td>

    </tr>
    </form>

		</table>
		<?php }}?>

</body>
</html>
<?php include_once('family_insert_code.php'); ?>