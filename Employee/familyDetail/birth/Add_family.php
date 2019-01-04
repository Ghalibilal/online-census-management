<?php
$id=$_GET['id'];
include_once('../../connection.php');
$query="SELECT * FROM birth where id='$id'";
if($res=mysqli_query($conn,$query))
{
	if(mysqli_num_rows($res)>0)
	{
        while($row=mysqli_fetch_assoc($res))
        {   
        	$name=$row['name'];
        	$father_name=$row['father_name'];
        	$gender=$row['gender'];
        	$birthday=$row['birthday'];
        	$emp_id=$row['emp_id'];
        	$head_id=$row['head_id'];


        }
	}
}
else
{
	echo "Error: ".mysqli_error($conn);
}
?>
<?php
include_once('../../session.php');
include_once('add_familyphp.php');


      
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
        <li ><a href="../../employee.php">Add Family</a></li>
        <li><a href="../../people_view.php">View Family</a></li>
        <li><a href="../../individual/individual_form.php" >Add Individual</a></li>
        <li><a href="../../individual/individual_view.php">View Individual</a></li>
        <li><a href="../../death_view.php">Death information</a></li>
        <li><a href="../../birth_view.php">Birth information</a></li>
        <li class="dropdown">
            <a href="" class="dropdown-toggle"  id="menu1" data-toggle="dropdown">Setting
    <span class=" glyphicon glyphicon-cog"></span></a>
    
    <ul class="dropdown-menu" role="menu" >
      
      <li role="presentation"><a role="menuitem" tabindex="-1" href="../../setting/change_profile.php?view=<?php echo $edit;?>">Edit Profile </a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="../../setting/change_pswd.php">Change Password</a></li>
      
    </ul>
  </a></li>
        <li><a href="../../logout.php">logout</a></li>

 
    </div>
  </div>
</nav>

<div class='col-sm-2'>
  <h1></h1>

    
    
  
</div>
<div class="container_fluid col-sm-offset-1 col-sm-7 ">
 
       <h5 style='color:green;text-align:center;'> ADD NEW MEMBER</h5>
   
  <form method='post'>
      <table class="table table-striped ">
      
        <form  action='' method='post'>
        	
    
      <tr>
        <td> <label for="name">Name:</label></td>
        <td><input  type="name" class="form-control" value='<?php echo $name;?>'  placeholder="Enter Name" name="name"  pattern="[A-Za-z\s]+" required readonly></td>
        <td> <label for="father_name">Father Name:</label></td>
        <td>  <input type="text" class="form-control"  placeholder="Enter father_name" value='<?php echo $father_name;?>' name="father_name" pattern="[A-Za-z\s]*" required readonly></td>
      </tr>
    <tr><td><br></td></tr>
      <tr>
        

        <td> <label for="Gender">Gender:</label></td>

        <td><div class="radio">
  <label><input type="radio" name="gender" value='<?php echo $gender;?>' checked><?php echo $gender;?></label>
</div>

</td>
 <td><label for="Birthday">Birthday:</label></td>
        <td><input type='date' name='birthday' value='<?php echo $birthday;?>' readonly></td>
      </tr>
      
     
      <tr><td><br></td></tr>
      <tr>
        <td><label for="religion">RELIGION</label></td>
        <td><select name="religion" class='form-control'>
    <option value="muslim">Muslim</option>
    <option value="hindu">Hindu</option>
    <option value="christan">Christan</option>
    <option value="qadyani">Qadyani</option>
    <option value="other">Other</option>
    
  </select></td>
  <td><label for="tongue">Mother Tongue:</label></td>
        <td><select name="tongue" class='form-control'>
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
  </select></td>
     

      
      
  
    
  <td  class='text-center'><label for="relation">Relation to head</label></td>
   <td><select name="relation" class='form-control'>
    <option value="son">Son</option>
    <option value="daughter">Daughter</option>
    <option value="sister">Sister</option>
    <option value="brother">Brother</option>
     <option value="mother">mother</option>
      <option value="father">father</option>
    <option value="wife">Wife</option>
    <option value="husband">Husband</option>
    <option value="daughter-in-law">Daughter-in-Law</option>
    <option value="son-in-law">Son-in-Law</option>
    <option value="grandson">Grand Son</option>
    <option value="granddaughter">Grand Daughter</option>
    <option value="other">Other</option>

  </select></td>
</tr>

 </tr>
    <tr><input type='hidden' name='emp_id' value='<?php echo $emp_id;?>'>
    	<input type='hidden' name='head_id' value='<?php echo $head_id;?>'>
    </tr>
  

    <tr>
      <td colspan='4' align="center"><input name="submit" class='form-control btn btn-success' type="submit" value="ADD MEMBER"></td>

  
     </form> 
    </table>
  </body>
  </html>
