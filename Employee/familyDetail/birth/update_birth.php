<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$father_name=$_POST['father_name'];

	$gender=strtolower($_POST['gender']);
	$birthday=$_POST['birthday'];
	
	 $head_id=$_POST['head_id'];
	 
	 
	$date=date("Y-m-d");
	  
	  if(empty($name) || !preg_match("/^[a-zA-Z\s]+$/",$name)){
		echo '<font color="red">Please fill  the field  Name.Name must contain alphabet </font>';
	
		exit();
	}
	if(empty($father_name) || !preg_match("/^[a-zA-Z\s]+$/",$father_name)){
		echo '<font color="red">Please fill  the field  Father Name. Father Name must contain alphabet</font> ';
		
		exit();
	}
	
	if($birthday>$date){
	 echo '<font color="red">Please enter correct birthday </font>';
		
		exit();	
	}

	 
	if (!empty($name)||empty($father_name)||empty($birthday))
	 {
		if($birthday<=$date)
		{ 
			$id=$_GET['id'];

			$sql="UPDATE birth SET name='$name',father_name='$father_name',gender='$gender',birthday='$birthday' WHERE id='$id'";
			if(mysqli_query($conn,$sql))
			{
               echo "<script>alert('birth record has updated')</script>";
                 header("refresh:0;url='../view_birth.php?h_id=$head_id'");
			}
			else
			{
		      echo "Error: "."<br>" . mysqli_error($conn);
	        }
}
}
}
    ?>            