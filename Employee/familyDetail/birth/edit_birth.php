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
include_once('update_birth.php');


      
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
   <?php include_once('../valid.php');?>
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
      
        <form  action='' method='post' id='form'>
        	
    
      <tr>
        <td> <label for="name">Name:</label></td>
        <td><input  type="name" minlength='3' class="form-control" id='name' value='<?php echo $name;?>'  placeholder="Enter Name" name="name"  pattern="[A-Za-z\s]+" required ><span class='form-error' id='error_name'></td>
        <td> <label for="father_name">Father Name:</label></td>
        <td>  <input type="text" minlength='3' class="form-control" id='fname'  placeholder="Enter father_name" value='<?php echo $father_name;?>' name="father_name" pattern="[A-Za-z\s]*" required ><span class='form-error' id='error_fname'></td>
      </tr>
    <tr><td><br></td></tr>
      <tr>
        

        <td> <label for="Gender">Gender:</label></td>

        <td><div class="radio">
  <label><input type="radio" name="gender" value='<?php echo $gender;?>' checked><?php echo $gender;?></label>
</div>
<div class="radio">
   <label><input type="radio" name="gender" value='male' >Male</label>
</div>
<div class="radio">
  <label><input type="radio" name="gender" value='female'>Female</label>
</div>
<div class="radio">
  <label><input type="radio" name="gender" value='other'>Other</label>
</div>

</td>
 <td><label for="Birthday">Birthday:</label></td>
        <td><input type='date' name='birthday' id='date' value='<?php echo $birthday;?>' ><span class='form-error' id='error_date'></td>
        <input type='hidden' id='da' value='<?php echo date('Y-m-d');?>'>
      </tr>
      
     
      <tr><td><br></td></tr>
     
    
    	<input type='hidden' name='head_id' value='<?php echo $head_id;?>'>
    </tr>
  

    <tr>
      <td colspan='4' align="center"><input name="submit" class='form-control btn btn-success' type="submit" value="ADD MEMBER"></td>

  
     </form> 
    </table>
  </body>
  </html>
